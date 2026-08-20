<?php
$page_title = 'GitHub - Dante Lespoir';
$page_desc  = 'Open source projects, contributions, and commit history by Dante Lespoir.';
$page_hero  = 'hero-bg-github';
$hero_title = 'GitHub';
$hero_subtitle = 'Open source projects, school work, and community contributions.';
$is_project = true;
include __DIR__ . '/includes/header.php';
?>

        <!-- github profile -->
        <section class="content-section" aria-labelledby="gh-title">
            <div class="container">
                <h2 id="gh-title">GitHub Profile</h2>
                <p class="section-subtitle">
                    <a href="https://github.com/DanteSIT" target="_blank" rel="noopener">github.com/DanteSIT</a>
                    &middot; Public repositories and contributions
                </p>

                <!-- contribution calendar -->
                <div class="gh-calendar-wrap">
                    <div class="gh-calendar-header">
                        <div class="gh-calendar-stats">
                            <span class="gh-stat-count" id="total-commits">--</span>
                            <span class="gh-stat-label">contributions in the last year</span>
                        </div>
                        <div class="gh-calendar-controls">
                            <button class="gh-cal-btn active" data-view="year">Year</button>
                            <button class="gh-cal-btn" data-view="quarter">Quarter</button>
                            <button class="gh-cal-btn" data-view="month">Month</button>
                        </div>
                    </div>
                    <div class="gh-calendar" id="gh-calendar">
                        <div class="gh-cal-loading">Loading contributions...</div>
                    </div>
                    <div class="gh-calendar-legend">
                        <span>Less</span>
                        <span class="gh-legend-box" style="background:#161b22"></span>
                        <span class="gh-legend-box" style="background:#0e4429"></span>
                        <span class="gh-legend-box" style="background:#006d32"></span>
                        <span class="gh-legend-box" style="background:#26a641"></span>
                        <span class="gh-legend-box" style="background:#39d353"></span>
                        <span>More</span>
                    </div>
                    <p class="gh-calendar-note">Calendar shows contributions across all public repositories. Data fetched live from the GitHub API.</p>
                </div>

                <!-- pinned repos -->
                <h3 style="margin-top:var(--xl); border:none;">Pinned Repositories</h3>
                <div class="gh-repos">
                    <div class="gh-repo">
                        <div class="gh-repo-head">
                            <svg viewBox="0 0 16 16" width="16" height="16" fill="currentColor"><path d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9z"/></svg>
                            <a href="https://github.com/DanteSIT/Profolio" target="_blank" rel="noopener">Profolio</a>
                        </div>
                        <p class="gh-repo-desc">Personal portfolio website — PHP, CSS, JavaScript</p>
                        <div class="gh-repo-meta">
                            <span class="gh-lang"><span class="gh-dot" style="background:#e34c26"></span>HTML</span>
                            <span>Updated Jul 2026</span>
                        </div>
                    </div>

                    <div class="gh-repo">
                        <div class="gh-repo-head">
                            <svg viewBox="0 0 16 16" width="16" height="16" fill="currentColor"><path d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9z"/></svg>
                            <a href="https://github.com/DanteSIT/Dan-sYoutubeDownloadz" target="_blank" rel="noopener">Dan-sYoutubeDownloadz</a>
                        </div>
                        <p class="gh-repo-desc">YouTube video downloader built with Python</p>
                        <div class="gh-repo-meta">
                            <span class="gh-lang"><span class="gh-dot" style="background:#3572A5"></span>Python</span>
                            <span>Updated Jun 2026</span>
                        </div>
                    </div>

                    <div class="gh-repo">
                        <div class="gh-repo-head">
                            <svg viewBox="0 0 16 16" width="16" height="16" fill="currentColor"><path d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9z"/></svg>
                            <a href="https://github.com/DanteSIT/Graduationceremony2026SIT.github.io" target="_blank" rel="noopener">Graduationceremony2026SIT</a>
                        </div>
                        <p class="gh-repo-desc">SIT Graduation Ceremony 2026 website</p>
                        <div class="gh-repo-meta">
                            <span class="gh-lang"><span class="gh-dot" style="background:#e34c26"></span>HTML</span>
                            <span>Updated Apr 2026</span>
                        </div>
                    </div>

                    <div class="gh-repo">
                        <div class="gh-repo-head">
                            <svg viewBox="0 0 16 16" width="16" height="16" fill="currentColor"><path d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9z"/></svg>
                            <a href="https://github.com/DanteSIT/World_Skill_Day" target="_blank" rel="noopener">World_Skill_Day</a>
                        </div>
                        <p class="gh-repo-desc">World Skill Day 2025 — school event project</p>
                        <div class="gh-repo-meta">
                            <span class="gh-lang"><span class="gh-dot" style="background:#f1e05a"></span>JavaScript</span>
                            <span>Updated Jul 2025</span>
                        </div>
                    </div>

                    <div class="gh-repo">
                        <div class="gh-repo-head">
                            <svg viewBox="0 0 16 16" width="16" height="16" fill="currentColor"><path d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9z"/></svg>
                            <a href="https://github.com/DanteSIT/Hackathon" target="_blank" rel="noopener">Hackathon</a>
                        </div>
                        <p class="gh-repo-desc">Hackathon 2026 challenge — web and database project</p>
                        <div class="gh-repo-meta">
                            <span class="gh-lang"><span class="gh-dot" style="background:#e34c26"></span>HTML</span>
                            <span>Updated May 2025</span>
                        </div>
                    </div>

                    <div class="gh-repo">
                        <div class="gh-repo-head">
                            <svg viewBox="0 0 16 16" width="16" height="16" fill="currentColor"><path d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9z"/></svg>
                            <a href="https://github.com/DanteSIT/tally.guithub.io" target="_blank" rel="noopener">tally.guithub.io</a>
                        </div>
                        <p class="gh-repo-desc">School project — Graduation ceremony 2026</p>
                        <div class="gh-repo-meta">
                            <span class="gh-lang"><span class="gh-dot" style="background:#e34c26"></span>HTML</span>
                            <span>Updated Apr 2026</span>
                        </div>
                    </div>
                </div>

                <!-- contribution activity -->
                <h3 style="margin-top:var(--xl); border:none;">Recent Activity</h3>
                <div class="gh-activity" id="gh-activity">
                    <div class="gh-event">
                        <span class="gh-event-icon">&#128221;</span>
                        <div>
                            <strong>Pushed 3 commits</strong> to <a href="https://github.com/DanteSIT/Profolio" target="_blank">Profolio</a>
                            <span class="gh-event-date">Jul 11, 2026</span>
                        </div>
                    </div>
                    <div class="gh-event">
                        <span class="gh-event-icon">&#128221;</span>
                        <div>
                            <strong>Pushed 3 commits</strong> to <a href="https://github.com/DanteSIT/Dan-sYoutubeDownloadz" target="_blank">Dan-sYoutubeDownloadz</a>
                            <span class="gh-event-date">Jun 23, 2026</span>
                        </div>
                    </div>
                    <div class="gh-event">
                        <span class="gh-event-icon">&#128221;</span>
                        <div>
                            <strong>Pushed 5 commits</strong> to <a href="https://github.com/DanteSIT/Graduationceremony2026SIT.github.io" target="_blank">Graduationceremony2026SIT</a>
                            <span class="gh-event-date">Apr 8, 2026</span>
                        </div>
                    </div>
                    <div class="gh-event">
                        <span class="gh-event-icon">&#128221;</span>
                        <div>
                            <strong>Created repository</strong> <a href="https://github.com/DanteSIT/Hackathon" target="_blank">Hackathon</a> &mdash; Hackathon 2026 challenge
                            <span class="gh-event-date">May 2026</span>
                        </div>
                    </div>
                    <div class="gh-event">
                        <span class="gh-event-icon">&#128221;</span>
                        <div>
                            <strong>Created repository</strong> <a href="https://github.com/DanteSIT/Autumn-Assignment-webpage" target="_blank">Autumn-Assignment-webpage</a>
                            <span class="gh-event-date">Nov 12, 2025</span>
                        </div>
                    </div>
                    <div class="gh-event">
                        <span class="gh-event-icon">&#128221;</span>
                        <div>
                            <strong>Pushed 5 commits</strong> to <a href="https://github.com/DanteSIT/Hackathon" target="_blank">Hackathon</a> &mdash; 2025 hackathon webapp
                            <span class="gh-event-date">May 22, 2025</span>
                        </div>
                    </div>
                    <div class="gh-event">
                        <span class="gh-event-icon">&#128221;</span>
                        <div>
                            <strong>Pushed 2 commits</strong> to <a href="https://github.com/DanteSIT/World_Skill_Day" target="_blank">World_Skill_Day</a>
                            <span class="gh-event-date">Jul 11, 2025</span>
                        </div>
                    </div>
                    <div class="gh-event">
                        <span class="gh-event-icon">&#128221;</span>
                        <div>
                            <strong>Pushed commits</strong> to <a href="https://github.com/DANTELESPOIR" target="_blank">DANTELESPOIR repos</a> &mdash; personal projects and learning
                            <span class="gh-event-date">2024 &ndash; 2025</span>
                        </div>
                    </div>
                </div>

                <a href="https://github.com/DanteSIT" target="_blank" rel="noopener" class="project-link" style="margin-top:var(--lg); display:inline-flex;">View full profile on GitHub &rarr;</a>
            </div>
        </section>

    <script>
    (function() {
        const accounts = ['DanteSIT', 'DANTELESPOIR'];
        const cal = document.getElementById('gh-calendar');
        const totalEl = document.getElementById('total-commits');
        const actEl = document.getElementById('gh-activity');
        const tooltip = document.createElement('div');
        tooltip.className = 'gh-tooltip';
        document.body.appendChild(tooltip);

        let allCommits = [];
        let currentView = 'year';

        // fetch all pages from a paginated GitHub API endpoint
        async function fetchAllPages(url) {
            let results = [];
            let next = url + (url.includes('?') ? '&' : '?') + 'per_page=100';
            while (next) {
                try {
                    const res = await fetch(next);
                    if (!res.ok) break;
                    const data = await res.json();
                    if (!Array.isArray(data) || data.length === 0) break;
                    results = results.concat(data);
                    const link = res.headers.get('Link') || '';
                    const match = link.match(/<([^>]+)>;\s*rel="next"/);
                    next = match ? match[1] : null;
                } catch(e) { break; }
            }
            return results;
        }

        // fetch repos then ALL commits from each
        async function fetchAllCommits() {
            const all = [];
            for (const acct of accounts) {
                const repos = await fetchAllPages('https://api.github.com/users/' + acct + '/repos?sort=pushed');
                for (const repo of repos) {
                    const commits = await fetchAllPages('https://api.github.com/repos/' + acct + '/' + repo.name + '/commits');
                    commits.forEach(c => {
                        if (c.commit && c.commit.author && c.commit.author.date) {
                            all.push({
                                date: c.commit.author.date.split('T')[0],
                                repo: acct + '/' + repo.name,
                                repoShort: repo.name,
                                msg: c.commit.message.split('\n')[0],
                                sha: c.sha ? c.sha.substring(0, 7) : ''
                            });
                        }
                    });
                }
            }
            return all;
        }

        function groupByDate(commits) {
            const map = {};
            commits.forEach(c => {
                if (!map[c.date]) map[c.date] = { count: 0, repos: {} };
                map[c.date].count++;
                if (!map[c.date].repos[c.repo]) map[c.date].repos[c.repo] = [];
                map[c.date].repos[c.repo].push(c.msg);
            });
            return map;
        }

        function getLevel(count) {
            if (count === 0) return 0;
            if (count <= 2) return 1;
            if (count <= 5) return 2;
            if (count <= 10) return 3;
            return 4;
        }

        const colors = ['#161b22', '#0e4429', '#006d32', '#26a641', '#39d353'];

        function renderCalendar(view) {
            currentView = view;
            const now = new Date();
            let startDate, endDate;

            if (view === 'year') {
                endDate = new Date(now);
                startDate = new Date(now);
                startDate.setFullYear(startDate.getFullYear() - 1);
                startDate.setDate(startDate.getDate() + 1);
            } else if (view === 'quarter') {
                endDate = new Date(now);
                startDate = new Date(now);
                startDate.setMonth(startDate.getMonth() - 3);
                startDate.setDate(startDate.getDate() + 1);
            } else {
                endDate = new Date(now);
                startDate = new Date(now);
                startDate.setDate(1);
            }

            const dateMap = groupByDate(allCommits);
            let total = 0;

            const weeks = [];
            let current = new Date(startDate);
            current.setDate(current.getDate() - current.getDay());

            while (current <= endDate) {
                const week = [];
                for (let d = 0; d < 7; d++) {
                    const dateStr = current.toISOString().split('T')[0];
                    if (current >= startDate && current <= endDate) {
                        const dayData = dateMap[dateStr];
                        const count = dayData ? dayData.count : 0;
                        total += count;
                        week.push({ date: dateStr, count, data: dayData });
                    } else {
                        week.push({ date: null, count: 0, data: null });
                    }
                    current.setDate(current.getDate() + 1);
                }
                weeks.push(week);
            }

            totalEl.textContent = total;

            const dayLabels = ['', 'Mon', '', 'Wed', '', 'Fri', ''];
            let html = '<div class="gh-cal-grid">';
            html += '<div class="gh-cal-labels">';
            dayLabels.forEach(l => { html += '<span class="gh-cal-label">' + l + '</span>'; });
            html += '</div>';

            html += '<div class="gh-cal-weeks">';
            weeks.forEach(week => {
                html += '<div class="gh-cal-week">';
                week.forEach(day => {
                    if (day.date === null) {
                        html += '<span class="gh-cal-day gh-cal-empty"></span>';
                    } else {
                        const level = getLevel(day.count);
                        const dayName = new Date(day.date + 'T12:00:00').toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric' });
                        let tipText = '';
                        if (day.count > 0 && day.data) {
                            tipText = day.count + ' contribution' + (day.count !== 1 ? 's' : '') + ' on ' + dayName + '\n';
                            Object.entries(day.data.repos).forEach(([repo, msgs]) => {
                                tipText += '  ' + repo.split('/')[1] + ': ' + msgs.length + ' commit' + (msgs.length !== 1 ? 's' : '') + '\n';
                                msgs.slice(0, 3).forEach(m => {
                                    tipText += '    - ' + m.substring(0, 50) + '\n';
                                });
                            });
                        } else {
                            tipText = 'No contributions on ' + dayName;
                        }
                        html += '<span class="gh-cal-day" data-level="' + level + '" data-tip="' + tipText.replace(/"/g, '&quot;').replace(/\n/g, '&#10;') + '" style="background:' + colors[level] + '"></span>';
                    }
                });
                html += '</div>';
            });
            html += '</div></div>';

            html += '<div class="gh-cal-months">';
            let lastMonth = -1;
            weeks.forEach((week, i) => {
                const firstDay = week.find(d => d.date !== null);
                if (firstDay) {
                    const month = new Date(firstDay.date + 'T12:00:00').getMonth();
                    if (month !== lastMonth) {
                        const monthName = new Date(firstDay.date + 'T12:00:00').toLocaleDateString('en-US', { month: 'short' });
                        html += '<span class="gh-cal-month" style="grid-column:' + (i + 1) + '">' + monthName + '</span>';
                        lastMonth = month;
                    }
                }
            });
            html += '</div>';

            cal.innerHTML = html;

            cal.querySelectorAll('.gh-cal-day[data-tip]').forEach(day => {
                day.addEventListener('mouseenter', function() {
                    const tip = this.getAttribute('data-tip').replace(/&#10;/g, '\n');
                    tooltip.innerHTML = tip.replace(/\n/g, '<br>');
                    tooltip.style.display = 'block';
                    const rect = this.getBoundingClientRect();
                    tooltip.style.left = (rect.left + rect.width / 2 - tooltip.offsetWidth / 2) + 'px';
                    tooltip.style.top = (rect.top - tooltip.offsetHeight - 8 + window.scrollY) + 'px';
                });
                day.addEventListener('mouseleave', function() {
                    tooltip.style.display = 'none';
                });
            });
        }

        function renderActivity() {
            // sort by date descending
            const sorted = allCommits.slice().sort((a, b) => b.date.localeCompare(a.date));
            // take last 15
            const recent = sorted.slice(0, 15);
            if (recent.length === 0) return;

            let html = '';
            recent.forEach(c => {
                const dateStr = new Date(c.date + 'T12:00:00').toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
                html += '<div class="gh-event">';
                html += '<span class="gh-event-icon">&#128221;</span>';
                html += '<div>';
                html += '<strong>' + escapeHtml(c.msg.substring(0, 80)) + '</strong>';
                html += ' to <a href="https://github.com/' + c.repo + '" target="_blank">' + escapeHtml(c.repoShort) + '</a>';
                html += '<span class="gh-event-date">' + dateStr + '</span>';
                html += '</div>';
                html += '</div>';
            });
            actEl.innerHTML = html;
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        // button controls
        document.querySelectorAll('.gh-cal-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.gh-cal-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                renderCalendar(this.dataset.view);
            });
        });

        // init
        fetchAllCommits().then(commits => {
            allCommits = commits;
            renderCalendar('year');
            renderActivity();
        });
    })();
    </script>

    <style>
    /* contribution calendar */
    .gh-calendar-wrap {
        background: var(--white);
        border: 1px solid var(--border);
        padding: var(--lg);
        margin-top: var(--lg);
        overflow-x: auto;
    }

    .gh-calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: var(--md);
        flex-wrap: wrap;
        gap: var(--sm);
    }

    .gh-calendar-stats {
        display: flex;
        align-items: baseline;
        gap: var(--sm);
    }

    .gh-stat-count {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--blue);
    }

    .gh-stat-label {
        font-size: 0.85rem;
        color: var(--muted);
    }

    .gh-calendar-controls {
        display: flex;
        gap: 2px;
        background: var(--light-gray);
        padding: 2px;
    }

    .gh-cal-btn {
        background: none;
        border: none;
        padding: 4px 14px;
        font-size: 0.8rem;
        cursor: pointer;
        color: var(--muted);
        font-weight: 500;
        transition: var(--transition);
    }

    .gh-cal-btn.active {
        background: var(--white);
        color: var(--black);
        box-shadow: 0 1px 3px var(--shadow);
    }

    .gh-cal-btn:hover:not(.active) {
        color: var(--black);
    }

    .gh-calendar {
        margin-top: var(--sm);
    }

    .gh-cal-loading {
        text-align: center;
        padding: var(--lg);
        color: var(--muted);
        font-size: 0.9rem;
    }

    .gh-cal-grid {
        display: flex;
        gap: 4px;
    }

    .gh-cal-labels {
        display: flex;
        flex-direction: column;
        gap: 3px;
        padding-top: 18px;
    }

    .gh-cal-label {
        height: 13px;
        font-size: 0.7rem;
        color: var(--muted);
        display: flex;
        align-items: center;
    }

    .gh-cal-weeks {
        display: flex;
        gap: 3px;
    }

    .gh-cal-week {
        display: flex;
        flex-direction: column;
        gap: 3px;
    }

    .gh-cal-day {
        width: 13px;
        height: 13px;
        border-radius: 2px;
        cursor: pointer;
        transition: outline 0.1s;
    }

    .gh-cal-day:hover {
        outline: 2px solid rgba(0, 0, 0, 0.3);
        outline-offset: -1px;
    }

    .gh-cal-empty {
        background: transparent !important;
        cursor: default;
    }

    .gh-cal-months {
        display: grid;
        margin-top: 4px;
        margin-left: 22px;
    }

    .gh-cal-month {
        font-size: 0.7rem;
        color: var(--muted);
    }

    /* tooltip */
    .gh-tooltip {
        display: none;
        position: absolute;
        z-index: 1000;
        background: #1a1d21;
        color: #e6edf3;
        padding: 8px 12px;
        font-size: 0.75rem;
        line-height: 1.5;
        pointer-events: none;
        max-width: 300px;
        white-space: pre;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        border: 1px solid #3a3f47;
    }

    .gh-calendar-legend {
        display: flex;
        align-items: center;
        gap: 4px;
        justify-content: flex-end;
        margin-top: var(--sm);
        font-size: 0.7rem;
        color: var(--muted);
    }

    .gh-calendar-note {
        font-size: 0.8rem;
        color: var(--muted);
        margin-top: var(--sm);
        font-style: italic;
    }

    .gh-legend-box {
        width: 13px;
        height: 13px;
        display: inline-block;
        border-radius: 2px;
    }

    /* repos */
    .gh-repos {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: var(--lg);
        margin-top: var(--lg);
    }

    .gh-repo {
        background: var(--white);
        padding: var(--lg);
        border: 1px solid var(--border);
        transition: var(--transition);
    }

    .gh-repo:hover {
        border-color: var(--blue);
        box-shadow: 0 4px 16px var(--shadow-md);
    }

    .gh-repo-head {
        display: flex;
        align-items: center;
        gap: var(--xs);
        margin-bottom: var(--sm);
        color: var(--blue);
    }

    .gh-repo-head a {
        color: var(--blue);
        font-weight: 600;
        text-decoration: none;
    }

    .gh-repo-head a:hover {
        text-decoration: underline;
    }

    .gh-repo-desc {
        color: var(--muted);
        font-size: 0.9rem;
        margin-bottom: var(--sm);
    }

    .gh-repo-meta {
        display: flex;
        gap: var(--md);
        font-size: 0.8rem;
        color: var(--muted);
    }

    .gh-lang {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .gh-dot {
        width: 10px;
        height: 10px;
        display: inline-block;
    }

    .gh-activity {
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .gh-event {
        display: flex;
        align-items: flex-start;
        gap: var(--sm);
        padding: var(--sm) 0;
        border-bottom: 1px solid var(--light-gray);
        font-size: 0.9rem;
    }

    .gh-event:last-child {
        border-bottom: none;
    }

    .gh-event-icon {
        flex-shrink: 0;
        font-size: 1rem;
    }

    .gh-event a {
        color: var(--blue);
    }

    .gh-event-date {
        display: block;
        font-size: 0.8rem;
        color: var(--muted);
        margin-top: 2px;
    }

    @media (max-width: 600px) {
        .gh-repos {
            grid-template-columns: 1fr;
        }

        .gh-calendar-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
    </style>

<?php include __DIR__ . '/includes/footer.php'; ?>
