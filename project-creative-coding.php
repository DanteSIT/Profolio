<?php
$page_title = "Creative Coding - Dante's Portfolio";
$page_desc  = 'Creative Coding and Scripting - Automation and innovative solutions.';
$page_hero  = 'hero-bg-code';
$hero_title = 'Creative Coding & Scripting';
$hero_subtitle = 'Exploring creative coding projects, automation scripts, and innovative solutions.';
$is_project = true;
include __DIR__ . '/includes/header.php';
?>

        <section class="content-section" aria-labelledby="overview">
            <div class="container">
                <h2 id="overview">Project Overview</h2>
                <div class="project-detail">
                    <p>
                        This workspace serves as a deployment environment for algorithmic prototyping and creative programming. Utilizing Godot's powerful object-oriented scene architectures, these experiments focus on writing optimized object interactions, rendering mechanics, and procedural state updates.
                    </p>

                    <div class="project-info-grid">
                        <div class="info-box">
                            <h3>Engine Ecosystem</h3>
                            <ul>
                                <li>Godot Engine (v4.x)</li>
                                <li>GDScript Programming</li>
                                <li>Component-Based Architecture</li>
                                <li>Vector Coordinate Math</li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <h3>Mechanic Focus</h3>
                            <ul>
                                <li>Finite State Machines (FSM)</li>
                                <li>Rigid/Kinematic Bodies</li>
                                <li>Dynamic Custom Signals</li>
                                <li>UI Inventory Layouts</li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <h3>Performance Vectors</h3>
                            <ul>
                                <li>Efficient Node Instancing</li>
                                <li>Optimized Collision Layers</li>
                                <li>Asset Sprite Sheet Management</li>
                                <li>Clean Audio Mix Buses</li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <h3>Game Logic Areas</h3>
                            <ul>
                                <li>Procedural Level Handling</li>
                                <li>Pathfinding Vectors</li>
                                <li>Score & Save State Handlers</li>
                                <li>Local Control Mappings</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-section" aria-labelledby="features">
            <div class="container">
                <h2 id="features">Architecture Implementation</h2>
                <div class="features-list">
                    <div class="feature-item">
                        <h3>🤖 Modular Object State Architecture</h3>
                        <p>
                            Constructed behavioral systems around strict finite state logic. Character objects use decoders to process input transitions cleanly between idling, running, or physics calculations, eliminating erratic script states.
                        </p>
                    </div>
                    <div class="feature-item">
                        <h3>📡 Decoupled Signal Management</h3>
                        <p>
                            Employed global signal singletons to allow cross-scene event notifications without hard-coding parent-child node dependancies, ensuring high code reusability.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-section" aria-labelledby="learnings">
            <div class="container">
                <h2 id="learnings">Key Technical Insights</h2>
                <div class="learnings-grid">
                    <div class="learning-card">
                        <h3>Mathematical Systems</h3>
                        <p>Solidified understanding of 2D/3D physics matrices, translation transformations, and linear interpolations used to implement smooth game feel metrics.</p>
                    </div>
                    <div class="learning-card">
                        <h3>Resource Management</h3>
                        <p>Practiced optimization behaviors by auditing rendering pass costs, profiling scene load states, and managing system memory foot-prints.</p>
                    </div>
                </div>
            </div>
        </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
