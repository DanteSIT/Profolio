<?php
/*
 * Shared header for all pages
 * Include this at the top of every page
 *
 * Set these before including:
 *   $page_title    - page title tag
 *   $page_desc     - meta description
 *   $page_hero     - hero CSS class (leave empty for index)
 *   $hero_title    - hero heading
 *   $hero_subtitle - hero subtitle
 *   $is_project    - true for project pages, false for index
 */

$page_title    = isset($page_title)    ? $page_title    : 'Dante - Full-Stack Developer & System Administrator';
$page_desc     = isset($page_desc)     ? $page_desc     : 'Dante Dominic Lespoir - Web Developer, Linux Administrator, Game Developer based in Seychelles';
$page_hero     = isset($page_hero)     ? $page_hero     : '';
$hero_title    = isset($hero_title)    ? $hero_title    : 'Welcome to My Portfolio';
$hero_subtitle = isset($hero_subtitle) ? $hero_subtitle : 'Based in Seychelles, specializing in web development, server administration, and creative coding.';
$is_project    = isset($is_project)    ? $is_project    : false;

// project pages link back to index sections, index uses anchors
$nav_prefix = $is_project ? 'index.php' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($page_desc); ?>">
    <meta name="theme-color" content="#3498db">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <link rel="stylesheet" href="styles.css?v=15">
</head>

<body>
<?php if ($is_project): ?>
    <a href="index.php#main-content" class="skip-to-main">Skip to main content</a>
<?php endif; ?>

    <!-- top bar -->
    <header role="banner">
        <div class="header-container">
            <div class="logo-section">
                <h1>
                    <?php if ($is_project): ?>
                        <a href="index.php" style="color: inherit; text-decoration: none;">Dante Dominic Lespoir</a>
                    <?php else: ?>
                        Dante Dominic Lespoir
                    <?php endif; ?>
                </h1>
                <p class="tagline">Full-Stack Developer | Linux Administrator | Game Developer</p>
            </div>

            <div class="theme-switcher" role="group" aria-label="Theme switcher">
                <button class="theme-btn" data-theme="default" aria-label="Default theme">☀️</button>
                <button class="theme-btn" data-theme="dark" aria-label="Dark theme">🌙</button>
            </div>

            <nav role="navigation" aria-label="Main navigation">
                <button class="menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <ul class="nav-menu">
                    <li><a href="<?php echo $nav_prefix; ?>#about">About</a></li>
                    <li><a href="<?php echo $nav_prefix; ?>#skills">Skills</a></li>
                    <li><a href="<?php echo $nav_prefix; ?>#projects">Projects</a></li>
                    <li><a href="<?php echo $nav_prefix; ?>#experience">Experience</a></li>
                    <li><a href="<?php echo $nav_prefix; ?>#certifications">Certifications</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="youtube.php">YouTube</a></li>
                    <li><a href="<?php echo $nav_prefix; ?>#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main-content" role="main">
<?php if ($hero_title): ?>
        <!-- hero banner -->
        <section class="hero <?php echo htmlspecialchars($page_hero); ?>" aria-labelledby="hero-title">
            <div class="hero-content">
                <?php if (!$is_project): ?>
                    <img src="media/mypicture_46th_sportday.webp" alt="Dante Lespoir" class="hero-avatar">
                <?php endif; ?>
                <h2 id="hero-title"><?php echo htmlspecialchars($hero_title); ?></h2>
                <?php if ($hero_subtitle): ?>
                    <p><?php echo htmlspecialchars($hero_subtitle); ?></p>
                <?php endif; ?>
                <?php if (!$is_project): ?>
                    <a href="#contact" class="cta-button">Get In Touch</a>
                <?php endif; ?>
            </div>
        </section>
<?php endif; ?>
