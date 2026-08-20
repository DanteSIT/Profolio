<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/functions.php';

auth_require();
$user = auth_user();
$sites = get_sites();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - Portfolio CMS</title>
<link rel="stylesheet" href="css/cms.css">
</head>
<body>
<header class="cms-header">
    <a href="dashboard.php" class="brand">Portfolio <span>CMS</span></a>
    <div class="cms-header-right">
        <span class="cms-header-user">Signed in as <strong><?php echo htmlspecialchars($user['username']); ?></strong></span>
        <a href="logout.php" class="cms-logout">Logout</a>
    </div>
</header>

<div class="cms-container">
    <?php flash_display(); ?>

    <div class="cms-page-header">
        <h2>Your Sites</h2>
        <p>Select a site to manage, or create a new one.</p>
    </div>

    <div class="cms-grid">
        <?php foreach ($sites as $site): ?>
            <a href="manage.php?site=<?php echo htmlspecialchars($site['slug']); ?>" class="cms-site-card">
                <div class="cms-site-card-name"><?php echo htmlspecialchars($site['name']); ?></div>
                <div class="cms-site-card-desc"><?php echo htmlspecialchars($site['description']); ?></div>
                <div class="cms-site-card-meta">Updated: <?php echo htmlspecialchars($site['updated_at']); ?></div>
            </a>
        <?php endforeach; ?>
        <a href="manage.php?site=new" class="cms-site-card-add">
            <div class="cms-site-card-add-icon">+</div>
            <div class="cms-site-card-add-text">Add New Site</div>
        </a>
    </div>
</div>
</body>
</html>