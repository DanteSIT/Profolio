<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../functions.php';

auth_start();
if (!auth_check()) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$allowed_tables = [
    'about_sections',
    'credentials',
    'experiences',
    'experience_roles',
    'skills',
    'projects',
    'certifications',
    'news',
    'social_links',
    'youtube_config',
    'youtube_videos',
    'site_settings',
    'sites',
];

$site_id_tables = [
    'about_sections',
    'credentials',
    'experiences',
    'skills',
    'projects',
    'certifications',
    'news',
    'social_links',
    'youtube_config',
    'youtube_videos',
    'site_settings',
];

try {
    $raw = file_get_contents('php://input');
    $input = json_decode($raw, true);

    if (!$input || !isset($input['action'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid request: missing action']);
        exit;
    }

    $action = $input['action'];
    $table = $input['table'] ?? null;
    $data = $input['data'] ?? null;
    $id = $input['id'] ?? null;

    if ($action !== 'upload' && $action !== 'youtube_sync') {
        if (!$table || !in_array($table, $allowed_tables, true)) {
            echo json_encode(['success' => false, 'message' => 'Invalid or missing table: ' . ($table ?? 'null')]);
            exit;
        }
    }

    if (in_array($table, $site_id_tables, true) && $action !== 'upload' && $action !== 'youtube_sync') {
        if (!isset($data['site_id']) && !isset($input['site_id'])) {
            $input_site_id = get_site_id();
            if ($input_site_id) {
                $data['site_id'] = $input_site_id;
            }
        }
    }

    $result = handle_action($action, $table, $data, $id, $input);
    echo json_encode($result);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

function get_site_id()
{
    if (isset($_SESSION['site_id'])) {
        return (int)$_SESSION['site_id'];
    }
    if (isset($_GET['site_id'])) {
        return (int)$_GET['site_id'];
    }
    return null;
}

function handle_action($action, $table, $data, $id, $input)
{
    switch ($action) {
        case 'list':
            return action_list($table, $input);
        case 'get':
            return action_get($table, $id);
        case 'create':
            return action_create($table, $data);
        case 'update':
            return action_update($table, $id, $data);
        case 'delete':
            return action_delete($table, $id);
        case 'reorder':
            return action_reorder($table, $data);
        case 'upload':
            return action_upload($input);
        case 'youtube_sync':
            return action_youtube_sync($data);
        default:
            throw new Exception('Unknown action: ' . $action);
    }
}

function action_list($table, $input)
{
    $db = db();

    $filters = $input['filters'] ?? [];
    $site_id = $input['site_id'] ?? get_site_id();
    $order_by = $input['order_by'] ?? 'id ASC';
    $limit = $input['limit'] ?? null;

    $sql = "SELECT * FROM `{$table}`";
    $conditions = [];
    $params = [];

    if ($site_id && in_array($table, ['about_sections', 'credentials', 'experiences', 'skills', 'projects', 'certifications', 'news', 'social_links', 'youtube_config', 'youtube_videos', 'site_settings'], true)) {
        $conditions[] = "site_id = ?";
        $params[] = $site_id;
    }

    foreach ($filters as $column => $value) {
        $conditions[] = "`{$column}` = ?";
        $params[] = $value;
    }

    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $sql .= " ORDER BY {$order_by}";

    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }

    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return ['success' => true, 'data' => $rows];
}

function action_get($table, $id)
{
    $db = db();

    if (!$id) {
        throw new Exception('Missing id');
    }

    $stmt = $db->prepare("SELECT * FROM `{$table}` WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return ['success' => false, 'message' => 'Record not found'];
    }

    return ['success' => true, 'data' => $row];
}

function action_create($table, $data)
{
    $db = db();

    if (!$data || !is_array($data)) {
        throw new Exception('Missing data for create');
    }

    $columns = array_keys($data);
    $values = array_values($data);
    $placeholders = implode(', ', array_fill(0, count($columns), '?'));
    $column_list = '`' . implode('`, `', $columns) . '`';

    $sql = "INSERT INTO `{$table}` ({$column_list}) VALUES ({$placeholders})";
    $stmt = $db->prepare($sql);
    $stmt->execute($values);

    $insert_id = $db->lastInsertId();

    return ['success' => true, 'data' => ['id' => $insert_id], 'message' => 'Record created'];
}

function action_update($table, $id, $data)
{
    $db = db();

    if (!$id) {
        throw new Exception('Missing id for update');
    }

    if (!$data || !is_array($data)) {
        throw new Exception('Missing data for update');
    }

    $sets = [];
    $params = [];

    foreach ($data as $column => $value) {
        $sets[] = "`{$column}` = ?";
        $params[] = $value;
    }

    $params[] = $id;

    $sql = "UPDATE `{$table}` SET " . implode(', ', $sets) . " WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute($params);

    $stmt = $db->prepare("SELECT * FROM `{$table}` WHERE id = ?");
    $stmt->execute([$id]);
    $updated = $stmt->fetch(PDO::FETCH_ASSOC);

    return ['success' => true, 'data' => $updated, 'message' => 'Record updated'];
}

function action_delete($table, $id)
{
    $db = db();

    if (!$id) {
        throw new Exception('Missing id for delete');
    }

    $stmt = $db->prepare("DELETE FROM `{$table}` WHERE id = ?");
    $stmt->execute([$id]);

    return ['success' => true, 'data' => true, 'message' => 'Record deleted'];
}

function action_reorder($table, $data)
{
    $db = db();

    if (!$data || !is_array($data)) {
        throw new Exception('Missing data for reorder');
    }

    $sql = "UPDATE `{$table}` SET `sort_order` = CASE id ";
    $ids = [];
    $params = [];

    foreach ($data as $item) {
        if (!isset($item['id']) || !isset($item['sort_order'])) {
            throw new Exception('Each reorder item must have id and sort_order');
        }
        $sql .= "WHEN ? THEN ? ";
        $params[] = $item['id'];
        $params[] = $item['sort_order'];
        $ids[] = $item['id'];
    }

    $sql .= "END WHERE id IN (" . implode(',', array_fill(0, count($ids), '?')) . ")";
    $params = array_merge($params, $ids);

    $stmt = $db->prepare($sql);
    $stmt->execute($params);

    return ['success' => true, 'data' => true, 'message' => 'Records reordered'];
}

function action_upload($input)
{
    if (!isset($_FILES['file'])) {
        throw new Exception('No file uploaded');
    }

    $file = $_FILES['file'];
    $table = $input['table'] ?? 'uploads';
    $field = $input['field'] ?? 'image_path';

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors = [
            UPLOAD_ERR_INI_SIZE => 'File exceeds server size limit',
            UPLOAD_ERR_FORM_SIZE => 'File exceeds form size limit',
            UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing temp folder',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
            UPLOAD_ERR_EXTENSION => 'Upload blocked by extension',
        ];
        $msg = $errors[$file['error']] ?? 'Unknown upload error';
        throw new Exception('Upload error: ' . $msg);
    }

    $max_size = 10 * 1024 * 1024;
    if ($file['size'] > $max_size) {
        throw new Exception('File exceeds 10MB size limit');
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'mp4', 'pdf', 'webm', 'avif'];

    if (!in_array($ext, $allowed_extensions, true)) {
        throw new Exception('File extension not allowed: ' . $ext);
    }

    $upload_dir = __DIR__ . '/../../uploads';

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $filename = bin2hex(random_bytes(16)) . '.' . $ext;
    $destination = $upload_dir . '/' . $filename;

    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        throw new Exception('Failed to move uploaded file');
    }

    $relative_path = 'uploads/' . $filename;

    return ['success' => true, 'data' => ['path' => $relative_path, 'filename' => $filename, 'original_name' => $file['name']], 'message' => 'File uploaded'];
}

function action_youtube_sync($data)
{
    $db = db();

    if (!$data || !isset($data['channel_id']) || !isset($data['site_id'])) {
        throw new Exception('Missing channel_id or site_id');
    }

    $channel_id = $data['channel_id'];
    $site_id = (int)$data['site_id'];

    $feed_url = 'https://www.youtube.com/feeds/videos.xml?channel_id=' . urlencode($channel_id);
    $xml = @simplexml_load_file($feed_url, 'SimpleXMLElement', LIBXML_NOERROR | LIBXML_NOWARNING);

    if ($xml === false) {
        throw new Exception('Failed to fetch YouTube feed for channel: ' . $channel_id);
    }

    $xml->registerXPathNamespace('media', 'http://search.yahoo.com/mrss/');
    $count = 0;

    $entries = $xml->entry;

    if (!$entries || count($entries) === 0) {
        return ['success' => true, 'data' => 0, 'message' => 'No videos found in feed'];
    }

    $existing_stmt = $db->prepare("SELECT id, video_id FROM youtube_videos WHERE site_id = ? AND video_id = ?");
    $insert_stmt = $db->prepare("INSERT INTO youtube_videos (site_id, video_id, title, thumbnail_url, published_at, views, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $update_stmt = $db->prepare("UPDATE youtube_videos SET title = ?, thumbnail_url = ?, published_at = ?, views = ? WHERE site_id = ? AND video_id = ?");

    $sort_order = 0;

    foreach ($entries as $entry) {
        try {
            $video_id = null;

            $media_group = $entry->children('media', true)->group;
            if ($media_group) {
                $content = $media_group->content;
                if ($content) {
                    $url = (string)$content->attributes()->url;
                    if (preg_match('/video_id=([^&]+)/', $url, $matches)) {
                        $video_id = $matches[1];
                    }
                }
            }

            if (!$video_id) {
                $vid_attr = $entry->children('media', true)->group->content->attributes()->url ?? '';
                if (preg_match('/video_id=([^&]+)/', $vid_attr, $matches)) {
                    $video_id = $matches[1];
                }
            }

            if (!$video_id) {
                continue;
            }

            $title = (string)$entry->children('media', true)->group->title ?? (string)$entry->title ?? '';
            $thumbnail = '';
            $thumb_node = $entry->children('media', true)->group->thumbnail;
            if ($thumb_node) {
                $thumbnail = (string)$thumb_node->attributes()->url ?? '';
            }
            $published = (string)$entry->published ?? (string)$entry->updated ?? '';
            $views = 0;

            $existing_stmt->execute([$site_id, $video_id]);
            $existing = $existing_stmt->fetch(PDO::FETCH_ASSOC);

            if ($existing) {
                $update_stmt->execute([$title, $thumbnail, $published, $views, $site_id, $video_id]);
            } else {
                $insert_stmt->execute([$site_id, $video_id, $title, $thumbnail, $published, $views, $sort_order]);
            }

            $sort_order++;
            $count++;
        } catch (Exception $e) {
            continue;
        }
    }

    return ['success' => true, 'data' => $count, 'message' => "Synced {$count} videos"];
}
