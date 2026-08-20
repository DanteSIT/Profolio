<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/functions.php';

auth_start();
if (auth_check()) { redirect('dashboard.php'); }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify($_POST['csrf_token'] ?? '');
    if (auth_login($_POST['username'] ?? '', $_POST['password'] ?? '')) {
        redirect('dashboard.php');
    }
    $error = 'Invalid username or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Portfolio CMS</title>
<link rel="stylesheet" href="css/cms.css">
</head>
<body>
<div class="cms-login-wrap">
    <div class="cms-login-card">
        <h2>Portfolio <span>CMS</span></h2>
        <p class="subtitle">Sign in to manage your sites</p>
        <?php if ($error): ?>
            <div class="flash-msg error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="POST">
            <?php csrf_field(); ?>
            <div class="cms-form-group">
                <label>Username</label>
                <input type="text" name="username" required autofocus>
            </div>
            <div class="cms-form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="cms-btn cms-btn-primary" style="width:100%;padding:0.75rem;">Sign In</button>
        </form>
    </div>
</div>
</body>
</html>