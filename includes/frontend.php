<?php
require_once __DIR__ . '/cms_db.php';

/*
 * Frontend helper functions
 * These render HTML from database content
 */

function render_about_content($site_id) {
    $sections = cms_query('about_sections', $site_id);
    foreach ($sections as $s) {
        echo $s['content'];
    }
}

function render_credentials($site_id) {
    $creds = cms_query('credentials', $site_id);
    if (empty($creds)) return;
    echo '<ul class="credential-list">';
    foreach ($creds as $c) {
        echo '<li>';
        echo '<span class="credential-title">' . htmlspecialchars($c['title']) . '</span>';
        if ($c['status_text']) echo '<span class="credential-status">' . htmlspecialchars($c['status_text']) . '</span>';
        if ($c['provider']) echo '<span class="credential-provider">' . htmlspecialchars($c['provider']) . '</span>';
        if ($c['image_paths']) {
            $images = json_decode($c['image_paths'], true) ?: [];
            if (!empty($images)) {
                echo '<div class="credential-images">';
                foreach ($images as $img) {
                    echo '<a href="' . htmlspecialchars($img) . '" target="_blank">';
                    echo '<img src="' . htmlspecialchars($img) . '" alt="" class="credential-logo">';
                    echo '</a>';
                }
                echo '</div>';
            }
        }
        echo '</li>';
    }
    echo '</ul>';
}

function render_experiences($site_id) {
    $exps = cms_experience_with_roles($site_id);
    if (empty($exps)) return;
    echo '<div class="exp-grid">';
    foreach ($exps as $exp) {
        $card_class = 'exp-card';
        if ($exp['is_current']) $card_class .= ' exp-card--current';
        if ($exp['is_completed']) $card_class .= ' exp-card--done';
        echo '<div class="' . $card_class . '">';
        echo '<div class="exp-card-head">';
        if ($exp['badge']) {
            $badge_class = $exp['is_current'] ? 'exp-badge--now' : ($exp['is_completed'] ? 'exp-badge--done' : '');
            echo '<span class="exp-badge ' . $badge_class . '">' . htmlspecialchars($exp['badge']) . '</span>';
        }
        echo '<span class="exp-company">' . htmlspecialchars($exp['company']) . '</span>';
        if (count($exp['roles']) > 1) {
            echo '<span class="exp-count">' . count($exp['roles']) . ' roles</span>';
        }
        echo '</div>';
        echo '<div class="exp-roles">';
        foreach ($exp['roles'] as $role) {
            echo '<div class="exp-role">';
            echo '<span class="exp-title">' . htmlspecialchars($role['title']) . '</span>';
            if ($role['dates']) echo '<span class="exp-dates">' . htmlspecialchars($role['dates']) . '</span>';
            echo '</div>';
        }
        echo '</div>';
        if ($exp['description']) {
            echo '<p class="exp-desc">' . $exp['description'] . '</p>';
        }
        echo '</div>';
    }
    echo '</div>';
}

function render_skills($site_id) {
    $skills = cms_query('skills', $site_id);
    if (empty($skills)) return;
    echo '<div class="skills-grid">';
    foreach ($skills as $skill) {
        $items = json_decode($skill['items'], true) ?: [];
        echo '<div class="skill-category">';
        echo '<h3>' . htmlspecialchars($skill['category']) . '</h3>';
        echo '<ul class="skill-list">';
        foreach ($items as $item) {
            echo '<li>' . htmlspecialchars($item) . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
    echo '</div>';
}

function render_projects($site_id) {
    $projects = cms_query('projects', $site_id);
    if (empty($projects)) return;
    echo '<div class="project-grid">';
    foreach ($projects as $p) {
        $tags = json_decode($p['tags'], true) ?: [];
        echo '<article class="project-card">';
        if ($p['bg_class'] || $p['icon']) {
            echo '<div class="project-image ' . htmlspecialchars($p['bg_class'] ?? '') . '">';
            echo '<span class="project-icon">' . ($p['icon'] ?? '') . '</span>';
            echo '</div>';
        }
        echo '<div class="project-content">';
        echo '<h3>' . htmlspecialchars($p['title']) . '</h3>';
        if ($p['description']) echo '<p class="project-description">' . $p['description'] . '</p>';
        if (!empty($tags)) {
            echo '<div class="project-tags">';
            foreach ($tags as $tag) {
                echo '<span class="tag">' . htmlspecialchars($tag) . '</span>';
            }
            echo '</div>';
        }
        if ($p['link']) echo '<a href="' . htmlspecialchars($p['link']) . '" class="project-link">View Project &rarr;</a>';
        echo '</div>';
        echo '</article>';
    }
    echo '</div>';
}

function render_cert_tabs($site_id) {
    $all = cms_query('certifications', $site_id);
    if (empty($all)) return;
    $categories = [];
    foreach ($all as $c) {
        $cat = $c['category'] ?: 'certs';
        $categories[$cat][] = $c;
    }
    $cat_labels = ['hackathon' => 'Hackathons', 'certs' => 'Certifications', 'workshop' => 'Workshop'];
    echo '<div class="cert-tabs">';
    $first = true;
    foreach ($categories as $cat => $items) {
        echo '<button class="cert-tab' . ($first ? ' cert-tab--active' : '') . '" data-cert="' . htmlspecialchars($cat) . '">';
        echo htmlspecialchars($cat_labels[$cat] ?? ucfirst($cat));
        echo '</button>';
        $first = false;
    }
    echo '</div>';
    echo '<div class="cert-panels">';
    $first = true;
    foreach ($categories as $cat => $items) {
        echo '<div class="cert-panel' . ($first ? ' cert-panel--active' : '') . '" id="cert-' . htmlspecialchars($cat) . '">';
        echo '<h3>' . htmlspecialchars($cat_labels[$cat] ?? ucfirst($cat)) . '</h3>';
        echo '<div class="credential-images-grid">';
        foreach ($items as $cert) {
            if ($cert['category'] === 'certs') {
                echo '<div class="cert-card">';
                if ($cert['link']) echo '<a href="' . htmlspecialchars($cert['link']) . '" target="_blank">';
                if ($cert['image_path']) echo '<img data-src="' . htmlspecialchars($cert['image_path']) . '" alt="' . htmlspecialchars($cert['title'] ?? '') . '" class="credential-logo lazy-img">';
                if ($cert['link']) echo '</a>';
                if ($cert['label']) echo '<span class="cert-card-label">' . htmlspecialchars($cert['label']) . '</span>';
                echo '</div>';
            } else {
                if ($cert['link']) echo '<a href="' . htmlspecialchars($cert['link']) . '" target="_blank">';
                if ($cert['image_path']) echo '<img data-src="' . htmlspecialchars($cert['image_path']) . '" alt="' . htmlspecialchars($cert['title'] ?? '') . '" class="credential-logo lazy-img">';
                if ($cert['link']) echo '</a>';
            }
        }
        echo '</div>';
        if ($cat === 'hackathon' && !empty($items) && $items[0]['description']) {
            echo '<p class="credential-description">' . $items[0]['description'] . '</p>';
        }
        echo '</div>';
        $first = false;
    }
    echo '</div>';
}

function render_social_links($site_id) {
    $links = cms_query('social_links', $site_id);
    if (empty($links)) return;
    echo '<div class="footer-socials">';
    foreach ($links as $link) {
        echo '<a href="' . htmlspecialchars($link['url']) . '" target="_blank" rel="noopener" aria-label="' . htmlspecialchars($link['platform']) . '">';
        if ($link['svg_icon']) {
            echo $link['svg_icon'];
        }
        echo '</a>';
    }
    echo '</div>';
}

function render_news_cards($site_id, $category = null) {
    $items = cms_news_by_category($site_id, $category);
    if (empty($items)) {
        echo '<p>No news items found.</p>';
        return;
    }
    foreach ($items as $n) {
        echo '<article class="news-card">';
        echo '<div class="news-meta">';
        if ($n['date_label']) echo '<span class="news-date">' . htmlspecialchars($n['date_label']) . '</span>';
        if ($n['tag']) echo '<span class="news-tag news-tag--' . strtolower(htmlspecialchars($n['tag'])) . '">' . htmlspecialchars($n['tag']) . '</span>';
        echo '</div>';
        echo '<h3>' . htmlspecialchars($n['title']) . '</h3>';
        if ($n['content']) echo '<p>' . $n['content'] . '</p>';
        if ($n['link']) {
            echo '<div class="news-links">';
            echo '<a href="' . htmlspecialchars($n['link']) . '" target="_blank" rel="noopener">' . htmlspecialchars($n['link_text'] ?? 'Read more') . ' &rarr;</a>';
            echo '</div>';
        }
        echo '</article>';
    }
}

function render_youtube_videos($site_id) {
    $videos = cms_youtube_videos($site_id);
    if (empty($videos)) {
        echo '<p>No videos found. Sync from the admin panel.</p>';
        return;
    }
    echo '<div class="yt-grid">';
    foreach ($videos as $v) {
        echo '<article class="yt-card">';
        echo '<div class="yt-thumb" data-video="' . htmlspecialchars($v['video_id']) . '">';
        echo '<img src="' . htmlspecialchars($v['thumbnail_url']) . '" alt="' . htmlspecialchars($v['title']) . '" loading="lazy">';
        echo '<span class="yt-play">&#9654;</span>';
        echo '</div>';
        echo '<div class="yt-info">';
        echo '<h3>' . htmlspecialchars($v['title']) . '</h3>';
        $date = $v['published_at'] ? date('M j, Y', strtotime($v['published_at'])) : '';
        $views = $v['views'] ? $v['views'] . ' views' : '';
        echo '<p>' . $date . ($date && $views ? ' &middot; ' : '') . $views . '</p>';
        echo '</div>';
        echo '</article>';
    }
    echo '</div>';
}
