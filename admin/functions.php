<?php
require_once __DIR__ . '/auth.php';

/* ------------------------------------------------
   Sanitise
   ------------------------------------------------ */
function sanitize($input) {
    if (is_array($input)) {
        return array_map('sanitize', $input);
    }
    return htmlspecialchars((string) $input, ENT_QUOTES, 'UTF-8');
}

/* ------------------------------------------------
   CSRF
   ------------------------------------------------ */
function csrf_token(): string {
    auth_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field(): void {
    echo '<input type="hidden" name="csrf_token" value="' . csrf_token() . '">';
}

function csrf_verify($token): bool {
    auth_start();
    $tok = is_array($token) ? ($token['csrf_token'] ?? '') : (string) $token;
    if (empty($tok) || empty($_SESSION['csrf_token'])) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $tok);
}

/* ------------------------------------------------
   Flash messages
   ------------------------------------------------ */
function flash(string $type, string $message): void {
    auth_start();
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function flash_display(): void {
    auth_start();
    if (empty($_SESSION['flash'])) {
        return;
    }
    $f    = $_SESSION['flash'];
    $type = $f['type'] === 'error' ? 'error' : 'success';
    $cls  = $type === 'error' ? 'alert-danger' : 'alert-success';
    unset($_SESSION['flash']);
    echo '<div class="alert ' . $cls . '">' . sanitize($f['message']) . '</div>';
}

/* ------------------------------------------------
   Redirect
   ------------------------------------------------ */
function redirect(string $url): void {
    header('Location: ' . $url);
    exit;
}

/* ------------------------------------------------
   Site helpers
   ------------------------------------------------ */
function get_sites(): array {
    $stmt = db()->query('SELECT * FROM sites WHERE is_active = 1 ORDER BY name ASC');
    return $stmt->fetchAll();
}

function get_site_by_slug(string $slug): ?array {
    $stmt = db()->prepare('SELECT * FROM sites WHERE slug = :s LIMIT 1');
    $stmt->execute([':s' => $slug]);
    $row = $stmt->fetch();
    return $row ?: null;
}

/* ------------------------------------------------
   Settings
   ------------------------------------------------ */
function get_setting(int $site_id, string $key, string $default = ''): string {
    $stmt = db()->prepare(
        'SELECT setting_value FROM site_settings WHERE site_id = :sid AND setting_key = :k LIMIT 1'
    );
    $stmt->execute([':sid' => $site_id, ':k' => $key]);
    $row = $stmt->fetch();
    return $row ? $row['setting_value'] : $default;
}

function set_setting(int $site_id, string $key, string $value): void {
    $sql = 'INSERT INTO site_settings (site_id, setting_key, setting_value)
            VALUES (:sid, :k, :v)
            ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)';
    $stmt = db()->prepare($sql);
    $stmt->execute([':sid' => $site_id, ':k' => $key, ':v' => $value]);
}

/* ------------------------------------------------
   File upload
   ------------------------------------------------ */
function upload_file(array $file, string $subdir = ''): ?string {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $allowed = ['image/jpeg','image/png','image/gif','image/webp','image/svg+xml','image/avif'];
    if (!in_array($file['type'], $allowed, true)) {
        return null;
    }
    $maxSize = 5 * 1024 * 1024;
    if ($file['size'] > $maxSize) {
        return null;
    }
    $destDir = UPLOAD_DIR;
    if ($subdir !== '') {
        $destDir .= rtrim($subdir, '/') . '/';
    }
    if (!is_dir($destDir)) {
        mkdir($destDir, 0755, true);
    }
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $name = bin2hex(random_bytes(12)) . '.' . $ext;
    $dest = $destDir . $name;
    if (!move_uploaded_file($file['tmp_name'], $dest)) {
        return null;
    }
    $relative = 'uploads/' . ($subdir !== '' ? rtrim($subdir, '/') . '/' : '') . $name;
    return $relative;
}

/* ------------------------------------------------
   YouTube RSS (no API key)
   ------------------------------------------------ */
function get_youtube_videos(string $channel_id, int $max = 10): array {
    $url = 'https://www.youtube.com/feeds/videos.xml?channel_id=' . urlencode($channel_id);
    $ctx = stream_context_create([
        'http' => [
            'timeout'  => 10,
            'user_agent' => 'Mozilla/5.0 (compatible; PortfolioCMS/1.0)',
        ],
    ]);
    $xmlString = @file_get_contents($url, false, $ctx);
    if ($xmlString === false) {
        return [];
    }
    $xml = @simplexml_load_string($xmlString);
    if ($xml === false) {
        return [];
    }
    $videos = [];
    $ns = $xml->getNamespaces(true);
    foreach ($xml->entry as $entry) {
        if (count($videos) >= $max) {
            break;
        }
        $title     = (string) $entry->title;
        $videoId   = (string) $entry->children('media', true)->group->content->attributes()->url ?? '';
        $videoId   = basename(parse_url($videoId, PHP_URL_PATH));
        if ($videoId === '' || $videoId === false) {
            $vidAttr = (string) ($entry->children('yt', true)->videoId ?? '');
            if ($vidAttr !== '') {
                $videoId = $vidAttr;
            }
        }
        $thumbnail = (string) $entry->children('media', true)->group->thumbnail->attributes()->url ?? '';
        $published = (string) $entry->published ?? (string) $entry->updated ?? '';
        $views     = (int) ($entry->children('media', true)->group->community->statistics->attributes()->views ?? 0);

        $videos[] = [
            'video_id'  => $videoId,
            'title'     => $title,
            'thumbnail' => $thumbnail,
            'published' => $published,
            'views'     => $views,
        ];
    }
    return $videos;
}
