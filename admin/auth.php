<?php
require_once __DIR__ . '/config.php';

function auth_start() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function auth_login(string $username, string $password): bool {
    auth_start();
    $stmt = db()->prepare('SELECT id, username, password_hash, full_name FROM users WHERE username = :u LIMIT 1');
    $stmt->execute([':u' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['username']  = $user['username'];
        $_SESSION['full_name'] = $user['full_name'];
        return true;
    }
    return false;
}

function auth_logout(): void {
    auth_start();
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'],
            $params['secure'], $params['httponly']
        );
    }
    session_destroy();
}

function auth_check(): bool {
    auth_start();
    return isset($_SESSION['user_id']);
}

function auth_require(): void {
    if (!auth_check()) {
        header('Location: ' . ADMIN_URL . '/login.php');
        exit;
    }
}

function auth_user(): ?array {
    auth_start();
    if (!auth_check()) {
        return null;
    }
    return [
        'id'        => $_SESSION['user_id'],
        'username'  => $_SESSION['username'],
        'full_name' => $_SESSION['full_name'],
    ];
}
