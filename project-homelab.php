<?php
$page_title = 'Home Lab - Dante Lespoir';
$page_desc  = 'My Proxmox home lab server — self-hosted services, networking, and infrastructure.';
$page_hero  = 'hero-bg-homelab';
$hero_title = 'Home Lab';
$hero_subtitle = 'Proxmox server running self-hosted services, game servers, and monitoring.';
$is_project = true;
include __DIR__ . '/includes/header.php';
?>

        <!-- specs -->
        <section class="content-section" aria-labelledby="specs-title">
            <div class="container">
                <h2 id="specs-title">Server Specs</h2>
                <p class="section-subtitle">Bare-metal Proxmox VE host</p>

                <div class="spec-grid">
                    <div class="spec-card">
                        <h3>CPU</h3>
                        <p>Intel Core i3-10100F</p>
                        <span class="spec-detail">4 cores / 8 threads &middot; 3.6 GHz</span>
                    </div>
                    <div class="spec-card">
                        <h3>RAM</h3>
                        <p>16 GB DDR4</p>
                        <span class="spec-detail">Crucial &middot; 2666 MHz</span>
                    </div>
                    <div class="spec-card">
                        <h3>GPU</h3>
                        <p>NVIDIA GT 730 4GB</p>
                        <span class="spec-detail">Used for Jellyfin hardware transcoding</span>
                    </div>
                    <div class="spec-card">
                        <h3>PSU</h3>
                        <p>Seasonic 500W</p>
                        <span class="spec-detail">80 Plus Bronze</span>
                    </div>
                    <div class="spec-card">
                        <h3>OS</h3>
                        <p>Proxmox VE</p>
                        <span class="spec-detail">Type-1 hypervisor &middot; KVM + LXC</span>
                    </div>
                    <div class="spec-card">
                        <h3>Network</h3>
                        <p>Gigabit Ethernet</p>
                        <span class="spec-detail">Static IPs &middot; VLAN segmentation</span>
                    </div>
                </div>

                <p class="spec-note"><em>More details and photos coming soon.</em></p>
            </div>
        </section>

        <!-- services running -->
        <section class="content-section" aria-labelledby="services-title">
            <div class="container">
                <h2 id="services-title">What's Running</h2>
                <p class="section-subtitle">Self-hosted services on Proxmox LXC and Docker containers</p>

                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-icon">&#127909;</div>
                        <h3>Jellyfin</h3>
                        <p>Media server for movies, TV, and music. Hardware transcoding via GT 730.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">&#128247;</div>
                        <h3>Immich</h3>
                        <p>Photo and video backup from phones. Self-hosted Google Photos alternative.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">&#128451;</div>
                        <h3>Files</h3>
                        <p>File management and browsing across the network.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">&#128200;</div>
                        <h3>OpenSpeedTest</h3>
                        <p>Network speed testing across local devices.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">&#128269;</div>
                        <h3>Smokeping</h3>
                        <p>Network latency and uptime monitoring over time.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">&#128737;</div>
                        <h3>OpenAudit</h3>
                        <p>IT asset inventory — tracks hardware and software across the network.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">&#128196;</div>
                        <h3>MariaDB</h3>
                        <p>SQL database for apps and self-hosted services.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">&#128196;</div>
                        <h3>PostgreSQL</h3>
                        <p>Advanced SQL database for Immich and other services.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">&#128172;</div>
                        <h3>Trilium</h3>
                        <p>Self-hosted note-taking and knowledge base with tree structure.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">&#128203;</div>
                        <h3>Dozzle</h3>
                        <p>Real-time Docker container log viewer. Quick debugging.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">&#128225;</div>
                        <h3>Web-Check</h3>
                        <p>Website monitoring and uptime checking for external services.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">&#128230;</div>
                        <h3>CasaOS App Store</h3>
                        <p>One-click app installation and Docker container management.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- networking -->
        <section class="content-section" aria-labelledby="network-title">
            <div class="container">
                <h2 id="network-title">Networking</h2>
                <p class="section-subtitle">Network topology and architecture</p>

                <figure class="net-figure">
                    <svg viewBox="0 0 800 530" xmlns="http://www.w3.org/2000/svg" font-family="'JetBrains Mono', 'Fira Code', 'Courier New', monospace" class="net-svg">
                        <rect width="800" height="530" fill="var(--light-gray)" rx="0"/>

                        <!-- title -->
                        <text x="400" y="30" fill="var(--black)" font-size="17" font-weight="bold" text-anchor="middle">Home Network Topology</text>

                        <!-- Router -->
                        <rect x="310" y="50" width="180" height="50" rx="8" fill="var(--white)" stroke="#3b82f6" stroke-width="2"/>
                        <text x="400" y="72" fill="#3b82f6" font-size="13" font-weight="bold" text-anchor="middle">Router</text>
                        <text x="400" y="88" fill="var(--muted)" font-size="9" text-anchor="middle">Internet Gateway</text>

                        <!-- line router to switch -->
                        <line x1="400" y1="100" x2="400" y2="130" stroke="#3b82f6" stroke-width="2"/>

                        <!-- Switch -->
                        <rect x="310" y="130" width="180" height="50" rx="8" fill="var(--white)" stroke="#8b5cf6" stroke-width="2"/>
                        <text x="400" y="152" fill="#8b5cf6" font-size="13" font-weight="bold" text-anchor="middle">5-Port Switch</text>
                        <text x="400" y="168" fill="var(--muted)" font-size="9" text-anchor="middle">Gigabit Unmanaged</text>

                        <!-- line switch down -->
                        <line x1="400" y1="180" x2="400" y2="210" stroke="var(--gray)" stroke-width="2"/>

                        <!-- horizontal bar -->
                        <line x1="100" y1="210" x2="700" y2="210" stroke="var(--gray)" stroke-width="2"/>

                        <!-- port drops -->
                        <line x1="150" y1="210" x2="150" y2="240" stroke="var(--gray)" stroke-width="2"/>
                        <line x1="320" y1="210" x2="320" y2="240" stroke="var(--gray)" stroke-width="2"/>
                        <line x1="500" y1="210" x2="500" y2="240" stroke="var(--gray)" stroke-width="2"/>
                        <line x1="670" y1="210" x2="670" y2="240" stroke="var(--gray)" stroke-width="2"/>

                        <!-- port labels -->
                        <text x="150" y="205" fill="var(--muted)" font-size="9" text-anchor="middle">Port 1</text>
                        <text x="320" y="205" fill="var(--muted)" font-size="9" text-anchor="middle">Port 2</text>
                        <text x="500" y="205" fill="var(--muted)" font-size="9" text-anchor="middle">Port 3</text>
                        <text x="670" y="205" fill="var(--muted)" font-size="9" text-anchor="middle">Port 5</text>

                        <!-- Port 1: Main PC -->
                        <rect x="75" y="240" width="150" height="55" rx="8" fill="var(--white)" stroke="#f59e0b" stroke-width="2"/>
                        <text x="150" y="262" fill="#f59e0b" font-size="12" font-weight="bold" text-anchor="middle">Main PC</text>
                        <text x="150" y="278" fill="var(--muted)" font-size="9" text-anchor="middle">Nobara OS &middot; RTX 4060 Ti</text>

                        <!-- Port 2: Server -->
                        <rect x="245" y="240" width="150" height="55" rx="8" fill="var(--white)" stroke="#10b981" stroke-width="2"/>
                        <text x="320" y="262" fill="#10b981" font-size="12" font-weight="bold" text-anchor="middle">Server</text>
                        <text x="320" y="278" fill="var(--muted)" font-size="9" text-anchor="middle">Proxmox VE &middot; i3-10100F</text>

                        <!-- services box under server -->
                        <line x1="320" y1="295" x2="320" y2="340" stroke="#10b981" stroke-width="1"/>
                        <rect x="235" y="340" width="170" height="95" rx="6" fill="var(--white)" stroke="#10b981" stroke-width="1" stroke-dasharray="4,3"/>
                        <text x="320" y="358" fill="#10b981" font-size="9" font-weight="bold" text-anchor="middle">12 Services</text>
                        <text x="252" y="375" fill="var(--muted)" font-size="8">Jellyfin</text>
                        <text x="312" y="375" fill="var(--muted)" font-size="8">Immich</text>
                        <text x="365" y="375" fill="var(--muted)" font-size="8">Files</text>
                        <text x="252" y="390" fill="var(--muted)" font-size="8">MariaDB</text>
                        <text x="312" y="390" fill="var(--muted)" font-size="8">PostgreSQL</text>
                        <text x="365" y="390" fill="var(--muted)" font-size="8">Dozzle</text>
                        <text x="252" y="405" fill="var(--muted)" font-size="8">Smokeping</text>
                        <text x="312" y="405" fill="var(--muted)" font-size="8">OpenSpeed</text>
                        <text x="365" y="405" fill="var(--muted)" font-size="8">Trilium</text>
                        <text x="252" y="420" fill="var(--muted)" font-size="8">Web-Check</text>
                        <text x="312" y="420" fill="var(--muted)" font-size="8">OpenAudit</text>
                        <text x="365" y="420" fill="var(--muted)" font-size="8">CasaOS</text>

                        <!-- Port 3: WiFi AP -->
                        <rect x="425" y="240" width="150" height="55" rx="8" fill="var(--white)" stroke="#06b6d4" stroke-width="2"/>
                        <text x="500" y="262" fill="#06b6d4" font-size="12" font-weight="bold" text-anchor="middle">WiFi AP</text>
                        <text x="500" y="278" fill="var(--muted)" font-size="9" text-anchor="middle">Wireless Access Point</text>

                        <!-- wifi devices -->
                        <line x1="465" y1="295" x2="465" y2="370" stroke="var(--gray)" stroke-width="1" stroke-dasharray="4,3"/>
                        <line x1="535" y1="295" x2="535" y2="370" stroke="var(--gray)" stroke-width="1" stroke-dasharray="4,3"/>
                        <rect x="400" y="370" width="130" height="45" rx="6" fill="var(--white)" stroke="var(--gray)" stroke-width="1"/>
                        <text x="465" y="390" fill="var(--muted)" font-size="10" text-anchor="middle">Mobile Phone</text>
                        <text x="465" y="405" fill="var(--muted)" font-size="8" text-anchor="middle">WiFi 6 &middot; 1200 Mbps</text>
                        <rect x="540" y="370" width="130" height="45" rx="6" fill="var(--white)" stroke="var(--gray)" stroke-width="1"/>
                        <text x="605" y="390" fill="var(--muted)" font-size="10" text-anchor="middle">VR Headset</text>
                        <text x="605" y="405" fill="var(--muted)" font-size="8" text-anchor="middle">Meta Quest 3S</text>

                        <!-- Port 5: Reserved -->
                        <rect x="595" y="240" width="150" height="55" rx="8" fill="var(--white)" stroke="var(--gray)" stroke-width="2" stroke-dasharray="6,4"/>
                        <text x="670" y="262" fill="var(--muted)" font-size="12" font-weight="bold" text-anchor="middle">Reserved</text>
                        <text x="670" y="278" fill="var(--muted)" font-size="9" text-anchor="middle">Future Use</text>

                        <!-- legend -->
                        <rect x="30" y="480" width="740" height="32" rx="4" fill="var(--white)" stroke="var(--border)" stroke-width="1"/>
                        <line x1="55" y1="496" x2="75" y2="496" stroke="var(--gray)" stroke-width="2"/><text x="82" y="500" fill="var(--muted)" font-size="9">Wired</text>
                        <line x1="140" y1="496" x2="160" y2="496" stroke="var(--gray)" stroke-width="1.5" stroke-dasharray="4,3"/><text x="167" y="500" fill="var(--muted)" font-size="9">WiFi 6</text>
                        <line x1="230" y1="496" x2="250" y2="496" stroke="var(--gray)" stroke-width="1.5" stroke-dasharray="6,4"/><text x="257" y="500" fill="var(--muted)" font-size="9">Reserved</text>
                        <circle cx="340" cy="496" r="4" fill="#3b82f6"/><text x="350" y="500" fill="var(--muted)" font-size="9">Router</text>
                        <circle cx="410" cy="496" r="4" fill="#8b5cf6"/><text x="420" y="500" fill="var(--muted)" font-size="9">Switch</text>
                        <circle cx="480" cy="496" r="4" fill="#10b981"/><text x="490" y="500" fill="var(--muted)" font-size="9">Server</text>
                        <circle cx="545" cy="496" r="4" fill="#f59e0b"/><text x="555" y="500" fill="var(--muted)" font-size="9">PC</text>
                        <circle cx="600" cy="496" r="4" fill="#06b6d4"/><text x="610" y="500" fill="var(--muted)" font-size="9">WiFi</text>
                    </svg>
                    <figcaption>Home network topology &mdash; switch is the central LAN hub for all wired and wireless devices</figcaption>
                </figure>

            </div>
        </section>

        <!-- future plans -->
        <section class="content-section" aria-labelledby="plans-title">
            <div class="container">
                <h2 id="plans-title">Future Plans</h2>
                <div class="plans-list">
                    <div class="plan-item">
                        <span class="plan-status plan-next">Next</span>
                        <div>
                            <strong>UPS &amp; Battery Backup</strong>
                            <p>Protect the server from power outages with automatic shutdown scripts.</p>
                        </div>
                    </div>
                    <div class="plan-item">
                        <span class="plan-status plan-soon">Soon</span>
                        <div>
                            <strong>Second Server / NAS Box</strong>
                            <p>Dedicated storage server to separate media from the main Proxmox host.</p>
                        </div>
                    </div>
                    <div class="plan-item">
                        <span class="plan-status plan-soon">Soon</span>
                        <div>
                            <strong>Proxmox Backup Server</strong>
                            <p>Automated backups for all VMs and containers with retention policies.</p>
                        </div>
                    </div>
                    <div class="plan-item">
                        <span class="plan-status plan-later">Later</span>
                        <div>
                            <strong>VLAN Segmentation</strong>
                            <p>Split network into isolated VLANs for IoT, guest, and trusted devices.</p>
                        </div>
                    </div>
                    <div class="plan-item">
                        <span class="plan-status plan-later">Later</span>
                        <div>
                            <strong>Pi-hole / AdGuard Home</strong>
                            <p>Network-wide ad blocking and DNS filtering for all devices.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <style>
    /* specs */
    .spec-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: var(--md);
        margin-top: var(--lg);
    }

    .spec-card {
        background: var(--white);
        padding: var(--lg);
        border: 1px solid var(--border);
        text-align: center;
    }

    .spec-card h3 {
        color: var(--blue);
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: var(--xs);
        border: none;
    }

    .spec-card p {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: var(--xs);
    }

    .spec-detail {
        font-size: 0.8rem;
        color: var(--muted);
    }

    .spec-note {
        margin-top: var(--lg);
        color: var(--muted);
        font-size: 0.9rem;
    }

    /* services */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: var(--md);
        margin-top: var(--lg);
    }

    .service-card {
        background: var(--white);
        padding: var(--lg);
        border-left: 3px solid var(--blue);
        box-shadow: 0 1px 3px var(--shadow);
    }

    .service-icon {
        font-size: 1.5rem;
        margin-bottom: var(--sm);
    }

    .service-card h3 {
        font-size: 0.95rem;
        margin-bottom: var(--xs);
        border: none;
    }

    .service-card p {
        color: var(--muted);
        font-size: 0.85rem;
        margin: 0;
        line-height: 1.5;
    }

    /* network diagram */
    .net-figure {
        margin: var(--lg) 0 0;
    }

    .net-svg {
        width: 100%;
        height: auto;
        border: 1px solid var(--border);
        display: block;
    }

    figcaption {
        font-size: 0.8rem;
        color: var(--muted);
        margin-top: var(--sm);
        text-align: center;
    }

    /* future plans */
    .plans-list {
        display: flex;
        flex-direction: column;
        gap: var(--sm);
        margin-top: var(--lg);
    }

    .plan-item {
        display: flex;
        align-items: flex-start;
        gap: var(--sm);
        padding: var(--md);
        background: var(--white);
        border-left: 3px solid var(--border);
        box-shadow: 0 1px 2px var(--shadow);
    }

    .plan-status {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 3px 10px;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .plan-next { background: var(--green); color: #fff; }
    .plan-soon { background: var(--blue); color: #fff; }
    .plan-later { background: var(--gray); color: var(--black); }

    .plan-item strong {
        display: block;
        margin-bottom: 2px;
    }

    .plan-item p {
        color: var(--muted);
        font-size: 0.85rem;
        margin: 0;
    }
    </style>

<?php include __DIR__ . '/includes/footer.php'; ?>
