<?php
$page_title = 'YouTube - Dante Lespoir';
$page_desc  = 'YouTube videos by Dante Lespoir - hardware benchmarks, tech meetings, and more.';
$page_hero  = 'hero-bg-youtube';
$hero_title = 'YouTube';
$hero_subtitle = 'Hardware benchmarks, tech talks, and more from my channel.';
$is_project = true;
include __DIR__ . '/includes/header.php';
?>

        <!-- youtube channel -->
        <section class="content-section" aria-labelledby="yt-title">
            <div class="container">
                <h2 id="yt-title">My Channel</h2>
                <p class="section-subtitle">
                    <a href="https://www.youtube.com/@dantelespoirsit" target="_blank" rel="noopener">
                        youtube.com/@dantelespoirsit
                    </a>
                    &middot; 3 subscribers
                </p>

                <div class="yt-grid">

                    <!-- video 1 -->
                    <article class="yt-card">
                        <div class="yt-thumb" data-video="64W-p4gRG3k">
                            <img src="https://i3.ytimg.com/vi/64W-p4gRG3k/hqdefault.jpg"
                                 alt="Bench GTX1650 GDDR6 thumbnail"
                                 loading="lazy">
                            <span class="yt-play">&#9654;</span>
                        </div>
                        <div class="yt-info">
                            <h3>Bench GTX1650 GDDR6</h3>
                            <p>Nov 6, 2025 &middot; 17 views</p>
                        </div>
                    </article>

                    <!-- video 2 -->
                    <article class="yt-card">
                        <div class="yt-thumb" data-video="QsRa9GHREsQ">
                            <img src="https://i2.ytimg.com/vi/QsRa9GHREsQ/hqdefault.jpg"
                                 alt="SNYC MEETING 14 09 25 thumbnail"
                                 loading="lazy">
                            <span class="yt-play">&#9654;</span>
                        </div>
                        <div class="yt-info">
                            <h3>SNYC MEETING 14 09 25</h3>
                            <p>Sep 15, 2025 &middot; 10 views</p>
                        </div>
                    </article>

                </div>

                <!-- modal for embedded player -->
                <div class="yt-modal" id="yt-modal" role="dialog" aria-hidden="true">
                    <div class="yt-modal-inner">
                        <button class="yt-close" aria-label="Close video">&times;</button>
                        <div class="yt-embed" id="yt-embed"></div>
                    </div>
                </div>

            </div>
        </section>

    <style>
    /* youtube page styles */
    .yt-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: var(--lg);
        margin-top: var(--lg);
    }

    .yt-card {
        background-color: var(--white);
        box-shadow: 0 1px 3px var(--shadow);
        overflow: hidden;
        transition: var(--transition);
        cursor: pointer;
    }

    .yt-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px var(--shadow);
    }

    .yt-thumb {
        position: relative;
        width: 100%;
        aspect-ratio: 16/9;
        overflow: hidden;
        background: #000;
    }

    .yt-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: opacity 0.2s;
    }

    .yt-card:hover .yt-thumb img {
        opacity: 0.8;
    }

    .yt-play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 56px;
        height: 56px;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
        transition: background 0.2s;
    }

    .yt-card:hover .yt-play {
        background: var(--red);
    }

    .yt-info {
        padding: var(--md) var(--lg);
    }

    .yt-info h3 {
        font-size: 1rem;
        margin-bottom: var(--xs);
        border: none;
    }

    .yt-info p {
        font-size: 0.85rem;
        color: var(--muted);
        margin: 0;
    }

    /* modal */
    .yt-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.85);
        z-index: 200;
        align-items: center;
        justify-content: center;
    }

    .yt-modal.active {
        display: flex;
    }

    .yt-modal-inner {
        position: relative;
        width: 90%;
        max-width: 800px;
    }

    .yt-embed {
        width: 100%;
        aspect-ratio: 16/9;
    }

    .yt-embed iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    .yt-close {
        position: absolute;
        top: -40px;
        right: 0;
        background: none;
        border: none;
        color: #fff;
        font-size: 28px;
        cursor: pointer;
        padding: 0 8px;
    }

    .yt-close:hover {
        color: var(--red);
    }

    @media (max-width: 600px) {
        .yt-grid {
            grid-template-columns: 1fr;
        }
    }
    </style>

    <script>
    (function() {
        var modal = document.getElementById('yt-modal');
        var embed = document.getElementById('yt-embed');
        var close = modal.querySelector('.yt-close');
        var cards = document.querySelectorAll('.yt-thumb');

        cards.forEach(function(thumb) {
            thumb.addEventListener('click', function() {
                var id = this.getAttribute('data-video');
                embed.innerHTML = '<iframe src="https://www.youtube.com/embed/' + id + '?autoplay=1" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                modal.classList.add('active');
                modal.setAttribute('aria-hidden', 'false');
            });
        });

        close.addEventListener('click', function() {
            modal.classList.remove('active');
            modal.setAttribute('aria-hidden', 'true');
            embed.innerHTML = '';
        });

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('active');
                modal.setAttribute('aria-hidden', 'true');
                embed.innerHTML = '';
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                modal.classList.remove('active');
                modal.setAttribute('aria-hidden', 'true');
                embed.innerHTML = '';
            }
        });
    })();
    </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
