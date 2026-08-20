<?php
/*
 * CMS Database Connection for Frontend
 * Include this at the top of pages that need DB content
 */

define('CMS_DB_HOST', 'localhost');
define('CMS_DB_NAME', 'profolio_cms');
define('CMS_DB_USER', 'root');
define('CMS_DB_PASS', '');
define('CMS_DB_CHARSET', 'utf8mb4');

function cms_db() {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = 'mysql:host=' . CMS_DB_HOST . ';dbname=' . CMS_DB_NAME . ';charset=' . CMS_DB_CHARSET;
        $pdo = new PDO($dsn, CMS_DB_USER, CMS_DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    return $pdo;
}

function cms_setting($site_id, $key, $default = '') {
    static $cache = [];
    $cache_key = $site_id . '_' . $key;
    if (!isset($cache[$cache_key])) {
        $stmt = cms_db()->prepare("SELECT setting_value FROM site_settings WHERE site_id = ? AND setting_key = ?");
        $stmt->execute([$site_id, $key]);
        $row = $stmt->fetch();
        $cache[$cache_key] = $row ? $row['setting_value'] : $default;
    }
    return $cache[$cache_key];
}

function cms_get_site($slug = 'profolio') {
    $stmt = cms_db()->prepare("SELECT * FROM sites WHERE slug = ? AND is_active = 1");
    $stmt->execute([$slug]);
    return $stmt->fetch();
}

function cms_query($table, $site_id, $order = 'sort_order ASC') {
    $allowed = ['about_sections','credentials','experiences','experience_roles','skills','projects','certifications','news','social_links','youtube_videos','youtube_config'];
    if (!in_array($table, $allowed)) return [];
    $sql = "SELECT * FROM {$table}";
    $params = [];
    if ($table !== 'experience_roles') {
        $sql .= " WHERE site_id = ?";
        $params[] = $site_id;
    }
    $sql .= " ORDER BY {$order}";
    $stmt = cms_db()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function cms_experience_with_roles($site_id) {
    $exps = cms_query('experiences', $site_id);
    foreach ($exps as &$exp) {
        $stmt = cms_db()->prepare("SELECT * FROM experience_roles WHERE experience_id = ? ORDER BY sort_order ASC");
        $stmt->execute([$exp['id']]);
        $exp['roles'] = $stmt->fetchAll();
    }
    return $exps;
}

function cms_experience_roles($experience_id) {
    $stmt = cms_db()->prepare("SELECT * FROM experience_roles WHERE experience_id = ? ORDER BY sort_order ASC");
    $stmt->execute([$experience_id]);
    return $stmt->fetchAll();
}

function cms_youtube_videos($site_id, $featured_only = false) {
    $sql = "SELECT * FROM youtube_videos WHERE site_id = ?";
    $params = [$site_id];
    if ($featured_only) {
        $sql .= " AND is_featured = 1";
    }
    $sql .= " ORDER BY published_at DESC";
    $stmt = cms_db()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function cms_news_by_category($site_id, $category = null) {
    $sql = "SELECT * FROM news WHERE site_id = ?";
    $params = [$site_id];
    if ($category) {
        $sql .= " AND category = ?";
        $params[] = $category;
    }
    $sql .= " ORDER BY sort_order ASC, created_at DESC";
    $stmt = cms_db()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function cms_certifications_by_category($site_id, $category = null) {
    $sql = "SELECT * FROM certifications WHERE site_id = ?";
    $params = [$site_id];
    if ($category) {
        $sql .= " AND category = ?";
        $params[] = $category;
    }
    $sql .= " ORDER BY sort_order ASC";
    $stmt = cms_db()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}
