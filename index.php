<?php
$page_title = 'Dante - Full-Stack Developer & System Administrator';
$page_desc  = 'Dante Dominic Lespoir - Web Developer, Linux System Administrator, Game Developer based in Seychelles';
$is_project = false;
$hero_title = 'Welcome to My Portfolio';
$hero_subtitle = 'Based in Seychelles, specializing in web development, server administration, and creative coding solutions.';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/frontend.php';
?>

        <!-- about -->
        <section id="about" class="content-section" aria-labelledby="about-title">
            <div class="container">
                <h2 id="about-title">About Me</h2>
                <div class="about-grid">
                    <div class="about-text">
                        <p>
                            I'm a passionate full-stack developer and system administrator based in Seychelles with a
                            strong foundation in web technologies and server infrastructure. Currently, I'm at the
                            Seychelles Institute of Technology (SIT), where I handle web development, Linux server
                            administration, and digital presence management.
                        </p>
                        <p>
                            My technical expertise spans from front-end design with HTML, CSS, and JavaScript to
                            back-end development with Python and PHP/MySQL. I'm actively exploring game development
                            using the Godot engine and GDScript, combining creative problem-solving with technical
                            precision.
                        </p>
                        <p>
                            Beyond professional work, I'm deeply invested in home labbing, virtualization,
                            containerization, and building robust server solutions. I run multiple services including
                            Minecraft servers, media streaming platforms, NAS systems, and containerized
                            applications&mdash;turning infrastructure into a learning playground.
                        </p>
                        <a href="#certifications">Certifications and Participations</a>
                    </div>

                    <div class="credentials">
                        <h3>Notable Education &amp; Certifications</h3>
                        <ul class="credential-list">
                            <li>
                                <span class="credential-title">National Diploma in Information Systems Engineering</span>
                                <span class="credential-status">Final Year (3-Year Course)</span>
                            </li>
                            <li>
                                <span class="credential-title">Advanced Certification in Electrical Electronics</span>
                                <span class="credential-status">(2-Year Course)</span>
                                <div class="credential-images">
                                    <a href="./assets/Advance Certificate Electrical Electronics-1.png" target="_blank">
                                        <img src="./assets/Advance Certificate Electrical Electronics-1.png" alt="Advance Certificate-1" class="credential-logo">
                                    </a>
                                    <a href="./assets/Advance Certificate Electrical Electronics-2.png" target="_blank">
                                        <img src="./assets/Advance Certificate Electrical Electronics-2.png" alt="Advance Certificate-2" class="credential-logo">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <span class="credential-title">JavaScript &amp; Web Development Certification</span>
                                <span class="credential-provider">Codecademy</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- experience -->
        <section id="experience" class="content-section experience-section" aria-labelledby="experience-title">
            <div class="container">
                <h2 id="experience-title">Experience</h2>
                <div class="exp-grid">

                    <!-- current -->
                    <div class="exp-card exp-card--current">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--now">Now</span>
                            <span class="exp-company">Seychelles Institute of Technology</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Student &mdash; National Diploma in IS Engineering</span>
                                <span class="exp-dates">Mar 2024 &ndash; Present</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            TVET institution under the Ministry of Education. National Diploma in
                            Information Systems Engineering covering web development, Linux server
                            administration, networking, databases, and digital presence management.
                            Handling institutional websites and internal systems.
                        </p>
                    </div>

                    <!-- cable & wireless -->
                    <div class="exp-card">
                        <div class="exp-card-head">
                            <span class="exp-company">Cable &amp; Wireless Seychelles</span>
                            <span class="exp-count">3 roles</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Intern &mdash; IT</span>
                                <span class="exp-dates">Feb 2026 &ndash; Apr 2026</span>
                            </div>
                            <div class="exp-role">
                                <span class="exp-title">Intern &mdash; IT Department</span>
                                <span class="exp-dates">May 2025 &ndash; Sep 2025</span>
                            </div>
                            <div class="exp-role">
                                <span class="exp-title">Technician (Contracted via ATS)</span>
                                <span class="exp-dates">May 2021 &ndash; Sep 2021</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Worked with open-source software, tested alternative hypervisors, and
                            created live demos with analytics. Set up Zabbix monitoring from scratch
                            including Linux OS, nginx, and MySQL. Repaired devices, configured
                            printers and laptops, and installed optic fiber, cameras, and networking
                            equipment across public and private sector sites.
                        </p>
                    </div>

                    <!-- sit completed -->
                    <div class="exp-card exp-card--done">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--done">Completed</span>
                            <span class="exp-company">Seychelles Institute of Technology</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Student &mdash; Advanced Cert in Electrical &amp; Electronics</span>
                                <span class="exp-dates">Jan 2021 &ndash; Dec 2022</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Completed top of class with certification. Awarded Best Performer for the
                            course. Gained hands-on experience with fiber optic networks, electronic
                            systems, and electrical infrastructure at SIT's TVET program.
                        </p>
                    </div>

                    <!-- airtel -->
                    <div class="exp-card">
                        <div class="exp-card-head">
                            <span class="exp-company">Airtel Seychelles</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Computer Repair &amp; General Technician</span>
                                <span class="exp-dates">Sep 2023 &ndash; Nov 2023</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Repaired company devices, configured wireless devices and modems/ODU,
                            set up printers, handled optic fiber installation, and installed
                            software per company specifications.
                        </p>
                    </div>

                    <!-- technoguard -->
                    <div class="exp-card">
                        <div class="exp-card-head">
                            <span class="exp-company">TECHNOGUARD Systems</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Fire Control Technician</span>
                                <span class="exp-dates">Apr 2022 &ndash; Jun 2022</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Fire suppression system installation, testing, and servicing. Worked
                            with fire alarm infrastructure and safety systems across commercial
                            and residential sites.
                        </p>
                    </div>

                    <!-- puc -->
                    <div class="exp-card">
                        <div class="exp-card-head">
                            <span class="exp-company">Public Utilities Corporation</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Intern &mdash; Solar, Wind, Generators &amp; SCADA</span>
                                <span class="exp-dates">Sep 2022 &ndash; Dec 2022</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Rotated through four departments: maintained and repaired solar farms,
                            serviced wind turbine mechanical issues, performed general maintenance
                            on generators and cooling motors, and installed SCADA-related devices
                            alongside senior engineers.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <!-- skills -->
        <section id="skills" class="content-section skills-section" aria-labelledby="skills-title">
            <div class="container">
                <h2 id="skills-title">Technical Skills</h2>
                <div class="skills-grid">
                    <div class="skill-category">
                        <h3>Web Development</h3>
                        <ul class="skill-list">
                            <li>HTML5</li>
                            <li>CSS3 / Responsive Design</li>
                            <li>JavaScript (ES6+)</li>
                            <li>React &amp; Frontend Frameworks</li>
                            <li>PHP / MySQL</li>
                            <li>Web Accessibility (WCAG)</li>
                        </ul>
                    </div>
                    <div class="skill-category">
                        <h3>Server Administration</h3>
                        <ul class="skill-list">
                            <li>Linux (Ubuntu, Fedora, Debian, Mint, Zorin OS, Alpine Linux)</li>
                            <li>Windows Server Administration</li>
                            <li>Proxmox &amp; Virtualization</li>
                            <li>Docker &amp; LXC Containers</li>
                            <li>Networking &amp; Configuration</li>
                            <li>NAS Management (OpenMediaVault)</li>
                        </ul>
                    </div>
                    <div class="skill-category">
                        <h3>Development Tools &amp; Services</h3>
                        <ul class="skill-list">
                            <li>Python Programming</li>
                            <li>GDScript &amp; Godot Engine</li>
                            <li>VS Code &amp; Development IDEs</li>
                            <li>Git &amp; Version Control</li>
                            <li>Bash/Shell Scripting</li>
                            <li>API Development &amp; Integration</li>
                        </ul>
                    </div>
                    <div class="skill-category">
                        <h3>Infrastructure &amp; Services</h3>
                        <ul class="skill-list">
                            <li>Minecraft Server Management</li>
                            <li>Jellyfin (Media Streaming)</li>
                            <li>Immich (Photo/Video Backup)</li>
                            <li>NextCloud</li>
                            <li>MariaDB / Database Admin</li>
                            <li>Networking Tools &amp; nmap</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

                <!-- projects -->
        <section id="projects" class="content-section" aria-labelledby="projects-title">
            <div class="container">
                <h2 id="projects-title">Featured Projects</h2>
                <p class="section-subtitle">A selection of my recent work and experiments</p>
                <?php render_projects(1); ?>
            </div>
        </section>

        <!-- certifications -->
        <section id="certifications" class="content-section" aria-labelledby="cert-title">
            <div class="container">
                <h2 id="cert-title">Certifications &amp; Participations</h2>
                <div class="cert-tabs">
                    <button class="cert-tab cert-tab--active" data-cert="hackathon">Hackathons</button>
                    <button class="cert-tab" data-cert="certs">Certifications</button>
                    <button class="cert-tab" data-cert="workshop">Workshop</button>
                </div>
                <div class="cert-panels">
                    <div class="cert-panel cert-panel--active" id="cert-hackathon">
                        <h3>Hackathon Participations</h3>
                        <p class="credential-description">
                            Participated in Hackathon for the past 3 years, placing 6th (solo), 6th (Team), and 5th (Team)
                        </p>
                        <div class="credential-images-grid">
                            <a href="./assets/Hackathon-1.webp" target="_blank">
                                <img data-src="./assets/Hackathon-1.webp" alt="Hackathon 2024" class="credential-logo lazy-img">
                            </a>
                            <a href="./assets/Hackathon-2.webp" target="_blank">
                                <img data-src="./assets/Hackathon-2.webp" alt="Hackathon 2025" class="credential-logo lazy-img">
                            </a>
                            <a href="./assets/Hackathon Cirtificate.webp" target="_blank">
                                <img data-src="./assets/Hackathon Cirtificate.webp" alt="Hackathon 2026" class="credential-logo lazy-img">
                            </a>
                        </div>
                    </div>
                    <div class="cert-panel" id="cert-certs">
                        <h3>Certifications</h3>
                        <div class="credential-images-grid">
                            <div class="cert-card">
                                <a href="./assets/Introduction_to_Web_3.0-Certificate_of_Completion_9061.pdf" target="_blank">
                                    <img data-src="./assets/Introduction_to_Web_3.0-Certificate_of_Completion_9061.webp" alt="Introduction to Web 3.0 Certificate" class="credential-logo lazy-img">
                                </a>
                                <span class="cert-card-label">Web 3.0 Fundamentals</span>
                            </div>
                            <div class="cert-card">
                                <a href="./assets/Introduction_to_AI_for_Youth-Certificate_of_Completion__AI_for_Youth_9070.pdf" target="_blank">
                                    <img data-src="./assets/Introduction_to_AI_for_Youth-Certificate_of_Completion__AI_for_Youth_9070.webp" alt="AI for Youth Certificate" class="credential-logo lazy-img">
                                </a>
                                <span class="cert-card-label">AI for Youth</span>
                            </div>
                            <div class="cert-card">
                                <a href="./assets/Introduction_to_Generative_AI-Certificate_of_Completion_9083.pdf" target="_blank">
                                    <img data-src="./assets/Introduction_to_Generative_AI-Certificate_of_Completion_9083.webp" alt="Introduction to Generative AI Certificate" class="credential-logo lazy-img">
                                </a>
                                <span class="cert-card-label">Generative AI</span>
                            </div>
                            <div class="cert-card">
                                <a href="./assets/Introduction_to_Responsible_AI_Skills-Certificate_of_Completion_9084.pdf" target="_blank">
                                    <img data-src="./assets/Introduction_to_Responsible_AI_Skills-Certificate_of_Completion_9084.webp" alt="Responsible AI Skills Certificate" class="credential-logo lazy-img">
                                </a>
                                <span class="cert-card-label">Responsible AI Skills</span>
                            </div>
                        </div>
                    </div>
                    <div class="cert-panel" id="cert-workshop">
                        <h3>Web Application Workshop</h3>
                        <p class="credential-description">
                            Participated in an online Workshop hosted by Kevin from DICT Seychelles on Web Application Development
                        </p>
                        <div class="credential-images-grid">
                            <a href="./assets/Dante DICT.webp" target="_blank">
                                <img data-src="./assets/Dante DICT.webp" alt="Web Application Workshop Certification" class="credential-logo lazy-img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- community -->
        <section class="content-section" aria-labelledby="community-title">
            <div class="container">
                <h2 id="community-title">Community</h2>
                <p class="section-subtitle">Helping others and sharing knowledge</p>
                <div class="exp-grid">

                    <div class="exp-card exp-card--community">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--community">Reddit</span>
                            <span class="exp-company">u/Wooden-Guidance9759</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">r/NobaraProject &amp; r/linux_gaming</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Helping users troubleshoot game compatibility, VR setups, and Linux
                            desktop issues. Sharing fixes for SteamVR, Proton, and GPU driver
                            problems on Nobara OS.
                        </p>
                    </div>

                    <div class="exp-card exp-card--community">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--community">Reddit</span>
                            <span class="exp-company">u/DanteLespoir</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">VR &amp; Gaming Compatibility</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Assisting users with VR headset compatibility, game performance
                            issues, and hardware troubleshooting across multiple subreddits.
                        </p>
                    </div>

                    <div class="exp-card exp-card--community">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--community">LTT</span>
                            <span class="exp-company">Linus Tech Tips</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Hardware &amp; Linux Help</span>
                                <span class="exp-dates">26 posts</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Helping users with hardware recommendations, Linux vs Windows
                            comparisons, battery life optimization, and server setup. Active
                            since October 2024.
                        </p>
                    </div>

                    <div class="exp-card exp-card--community">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--community">Guide</span>
                            <span class="exp-company">Linux Server Handbook</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">SIT Resource</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Comprehensive handbook for the Seychelles Institute of Technology
                            covering Linux essentials, networking, server administration,
                            and security.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <!-- currently exploring -->
        <section class="content-section" aria-labelledby="exploring-title">
            <div class="container">
                <h2 id="exploring-title">Currently Exploring</h2>
                <div class="exp-grid">

                    <div class="exp-card exp-card--exploring">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--exploring">Now</span>
                            <span class="exp-company">Proxmox &amp; Virtualization</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">VMs, Containers &amp; Self-Hosted Infra</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Building VMs, containers, and self-hosted infrastructure.
                            Experimenting with LXC, Docker Compose, and TurnKey containers.
                        </p>
                    </div>

                    <div class="exp-card exp-card--exploring">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--exploring">Now</span>
                            <span class="exp-company">Godot &amp; GDScript</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Game Development Experiments</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Learning game development with Godot engine and GDScript.
                            Creating small games and interactive demos.
                        </p>
                    </div>

                    <div class="exp-card exp-card--exploring">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--exploring">Now</span>
                            <span class="exp-company">VR on Linux</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">SteamVR, ALVR &amp; Meta Quest</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Getting VR working on Nobara OS. Testing SteamVR, ALVR,
                            and Meta Quest 3S compatibility with Linux.
                        </p>
                    </div>

                    <div class="exp-card exp-card--exploring">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--exploring">Now</span>
                            <span class="exp-company">Open Source</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Community Contributions</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Contributing to Linux communities, sharing tools, and helping
                            others with self-hosted solutions.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <!-- tools & platforms -->
        <section class="content-section" aria-labelledby="tools-title">
            <div class="container">
                <h2 id="tools-title">Tools &amp; Platforms</h2>
                <p class="section-subtitle">Open source software I work with daily</p>
                <div class="exp-grid">

                    <div class="exp-card exp-card--tools">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--tools">Monitoring</span>
                            <span class="exp-company">Zabbix, LibreNMS &amp; OpenAudit</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Server &amp; Network Monitoring</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Zabbix for server health alerts. LibreNMS for network
                            discovery and device tracking. OpenAudit for IT asset
                            inventory across the network.
                        </p>
                    </div>

                    <div class="exp-card exp-card--tools">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--tools">Services</span>
                            <span class="exp-company">Jellyfin, Immich &amp; Nextcloud</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Self-Hosted Applications</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Jellyfin for media streaming. Immich for photo and video
                            backups. Nextcloud for file sync, calendar, and office
                            suite. All fully self-hosted.
                        </p>
                    </div>

                    <div class="exp-card exp-card--tools">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--tools">Storage</span>
                            <span class="exp-company">CasaOS &amp; OpenMediaVault</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">NAS &amp; Storage Management</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            CasaOS as a lightweight dashboard for Docker apps. OpenMediaVault
                            for SMB/NFS file sharing across the network with RAID support.
                        </p>
                    </div>

                    <div class="exp-card exp-card--tools">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--tools">Linux</span>
                            <span class="exp-company">Fedora, NobaraOS &amp; Debian</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Desktop &amp; Server Distros</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            NobaraOS as daily driver. Fedora for bleeding edge. Debian
                            and Ubuntu for servers. Alpine for lightweight containers.
                            Linux Mint for laptop.
                        </p>
                    </div>

                    <div class="exp-card exp-card--tools">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--tools">Virtual</span>
                            <span class="exp-company">Proxmox, Docker &amp; TurnKey</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Virtualization &amp; Containers</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Proxmox VE for KVM and LXC. Docker and Docker Compose
                            for microservices. TurnKey containers for pre-built apps.
                        </p>
                    </div>

                    <div class="exp-card exp-card--tools">
                        <div class="exp-card-head">
                            <span class="exp-badge exp-badge--tools">Dev</span>
                            <span class="exp-company">Python, Bash &amp; nginx</span>
                        </div>
                        <div class="exp-roles">
                            <div class="exp-role">
                                <span class="exp-title">Networking &amp; Development</span>
                            </div>
                        </div>
                        <p class="exp-desc">
                            Python for tools and automation. Bash for server scripts.
                            nginx as reverse proxy. MySQL for databases. nmap for
                            network auditing.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <!-- contact -->
        <section id="contact" class="content-section contact-section" aria-labelledby="contact-title">
            <div class="container">
                <h2 id="contact-title">Get In Touch</h2>
                <p class="section-subtitle">Let's discuss your project or opportunity</p>
                <div class="contact-content">

                    <form class="contact-form" action="#" method="POST" aria-label="Contact form">
                        <div class="form-group">
                            <label for="name">Name <span aria-label="required">*</span></label>
                            <input type="text" id="name" name="name" required placeholder="Your full name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span aria-label="required">*</span></label>
                            <input type="email" id="email" name="email" required placeholder="your.email@example.com">
                        </div>
                        <div class="form-group">
                            <label for="country">Country <span aria-label="required">*</span></label>
                            <select id="country" name="country" required>
                                <option value="" disabled selected>Select your country</option>
                                <optgroup label="Africa">
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mauritius">Mauritius</option>
                                </optgroup>
                                <optgroup label="Asia">
                                    <option value="India">India</option>
                                    <option value="China">China</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="South Korea">South Korea</option>
                                </optgroup>
                                <optgroup label="Europe">
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Estonia">Estonia</option>
                                </optgroup>
                                <optgroup label="North America">
                                    <option value="United States">United States</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Jamaica">Jamaica</option>
                                </optgroup>
                                <optgroup label="South America">
                                    <option value="Brazil">Brazil</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Chile">Chile</option>
                                    <option value="Peru">Peru</option>
                                </optgroup>
                                <optgroup label="Oceania">
                                    <option value="Australia">Australia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                </optgroup>
                                <optgroup label="Other">
                                    <option value="Other">Other / International</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject <span aria-label="required">*</span></label>
                            <input type="text" id="subject" name="subject" required placeholder="What is this about?">
                        </div>
                        <div class="form-group">
                            <label for="message">Message <span aria-label="required">*</span></label>
                            <textarea id="message" name="message" rows="5" required placeholder="Tell me more about your project..."></textarea>
                        </div>
                        <button type="submit" class="submit-button" aria-label="Send message">Send Message</button>
                    </form>

                    <div class="contact-info">
                        <h3>Contact Information</h3>
                        <div class="contact-item">
                            <span class="contact-label">Location</span>
                            <address>Glacis, Mahe, Seychelles</address>
                        </div>
                        <div class="contact-item">
                            <span class="contact-label">Availability</span>
                            <p>Open to opportunities while completing studies. Please contact me for more information.</p>
                            <p>Languages: English, Kreol</p>
                        </div>
                        <div class="contact-item">
                            <span class="contact-label">Interests</span>
                            <p>
                                Web development, server administration, game development, and innovative technical
                                solutions, scripting,
                                <br>
                                <em>Hardware consultation (Raspberry Pi, Arduino, PC components, laptops, devices, etc.)</em>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
