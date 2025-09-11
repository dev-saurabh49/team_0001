<!DOCTYPE html>
<html lang="en" class="scroll-smooth">


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Team_0001 — Premium Dashboard</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&family=Poppins:wght@500;700&display=swap" rel="stylesheet" />

    <style>
        /* Root theme variables - used by CSS and inline style attributes */
        :root {
            --gold: #FFD700;
            --gold-dark: #e0b200;
            --bg-dark: #1F2937;
            /* user requested deep charcoal / near-black */
            --bg-light: #F9FAFB;
            /* light mode background */
            --card-dark: rgba(255, 255, 255, 0.03);
            --card-light: rgba(0, 0, 0, 0.04);
            --muted-dark: #D1D5DB;
            /* off-white-ish text for dark mode */
            --muted-light: #374151;
            /* text color for light mode */
            --glass: rgba(255, 255, 255, 0.04);
            --radius: 12px;
            --shadow: 0 8px 28px rgba(2, 6, 23, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.02);
        }

        /* Light mode (default) */
        :root:not(.dark) {
            --page-bg: var(--bg-light);
            --page-text: #0f172a;
            --card-bg: linear-gradient(180deg, rgba(255, 255, 255, 0.85), rgba(250, 250, 250, 0.85));
            --card-border: rgba(0, 0, 0, 0.06);
            --muted: var(--muted-light);
            --accent-glow: 0 8px 30px rgba(255, 215, 0, 0.08);
        }

        /* Dark mode */
        :root.dark {
            --page-bg: var(--bg-dark);
            --page-text: #F8FAFC;
            --card-bg: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            --card-border: rgba(255, 255, 255, 0.06);
            --muted: var(--muted-dark);
            --accent-glow: 0 10px 40px rgba(255, 215, 0, 0.12);
        }

        /* Basic page styling */
        html,
        body {
            /* height: 100; */
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: var(--page-bg);
            color: var(--page-text);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            line-height: 1.4;
        }

        /* Headings with Poppins for premium design */
        h1,
        h2,
        h3,
        .font-extrabold,
        .font-semibold,
        .font-bold {
            font-family: 'Poppins', sans-serif;
        }

        /* Sticky header with subtle blur */
        .site-header {
            position: sticky;
            top: 0;
            z-index: 60;
            backdrop-filter: blur(6px);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.5));
        }

        :root.dark .site-header {
            background: rgba(15, 23, 42, 0.55);
        }

        /* Sidebar styling */
        .sidebar {
            min-width: 260px;
            max-width: 260px;
            border-right: 1px solid var(--card-border);
            background-color: var(--page-bg);
            overflow-y: auto;
            height: calc(100vh);
            /* Adjust for header height */
            -webkit-overflow-scrolling: touch;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 10px;
            color: var(--muted);
            font-weight: 600;
            transition: all .18s ease;
            cursor: pointer;
        }

        .nav-item a:hover {
            color: var(--page-text);
            transform: translateX(6px);
            box-shadow: var(--accent-glow);
            background: linear-gradient(90deg, rgba(255, 215, 0, 0.06), rgba(255, 255, 255, 0.01));
        }

        .nav-item a.active {
            color: var(--page-text);
            background: linear-gradient(90deg, rgba(255, 215, 0, 0.10), rgba(255, 215, 0, 0.02));
            border-left: 4px solid var(--gold);
            padding-left: 8px;
            box-shadow: var(--accent-glow);
        }

        /* Premium cards */
        .card-premium {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: transform .18s ease, box-shadow .18s ease;
        }

        .card-premium:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(2, 6, 23, 0.5), 0 6px 20px rgba(0, 0, 0, 0.18);
        }

        /* Gold button style */
        .btn-gold {
            background: linear-gradient(180deg, var(--gold), var(--gold-dark));
            color: #0b0b0b;
            border: none;
            font-weight: 700;
            box-shadow: var(--accent-glow);
            cursor: pointer;
            transition: filter .2s ease, transform .2s ease;
        }

        .btn-gold:hover {
            filter: brightness(.95);
            transform: translateY(-2px);
        }

        /* Subtle progress bar style */
        .progress-smart {
            height: 12px;
            border-radius: 999px;
            background: rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .progress-smart>span {
            display: block;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 215, 0, 0.95), rgba(255, 215, 0, 0.6));
            box-shadow: 0 6px 18px rgba(255, 215, 0, 0.12) inset;
        }

        /* activity feed */
        .activity-item {
            border-radius: 10px;
            padding: 10px;
            transition: background .12s ease, transform .12s ease;
        }

        .activity-item:hover {
            background: rgba(255, 255, 255, 0.02);
            transform: translateY(-4px);
            box-shadow: var(--accent-glow);
        }

        /* task pill */
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 13px;
        }

        .pill-due {
            background: linear-gradient(90deg, rgba(255, 120, 80, 0.14), rgba(255, 120, 80, 0.06));
            color: #fff;
        }

        .pill-upcoming {
            background: linear-gradient(90deg, rgba(60, 120, 255, 0.08), rgba(60, 120, 255, 0.03));
            color: var(--page-text);
        }

        /* responsive adjustments to ensure no horizontal scroll */
        .no-scroll-x {
            overflow-x: hidden;
        }

        /* small helper for icons (SVGs) */
        .icon-wrap {
            width: 36px;
            height: 36px;
            display: inline-grid;
            place-items: center;
            border-radius: 10px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
        }

        /* form styling */
        .input-field {
            background: transparent;
            border: 1px solid var(--card-border);
            padding: 10px 12px;
            border-radius: 10px;
        }

        /* transition for theme changes */
        :root,
        :root * {
            transition: background-color .20s ease, color .18s ease, border-color .18s ease, box-shadow .18s ease;
        }

        /* Mobile sidebar transitions */
        #mobileSidebar {
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateX(-100%);
            opacity: 0;
        }

        #mobileSidebar.show {
            transform: translateX(0);
            opacity: 1;
        }

        /* Make mobile sidebar background blur transparent and smooth */
        #mobileSidebar>div {
            backdrop-filter: blur(12px);
        }

        /* Close button pointer */
        #mobileClose {
            cursor: pointer;
            background: transparent;
            border: none;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--muted);
            transition: color 0.2s ease;
        }

        #mobileClose:hover {
            color: var(--gold);
        }
    </style>
</head>

<body class="no-scroll-x">

    <!-- HEADER (sticky) -->
    <header class="site-header shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- left: hamburger + brand -->
                <div class="flex items-center gap-3">
                    <!-- mobile hamburger -->
                    <button id="mobileMenuButton" aria-label="Open sidebar" class="p-2 rounded-md hover:bg-gray-100/5 focus:outline-none focus:ring-2 focus:ring-offset-2" title="Toggle menu">
                        <!-- hamburger SVG -->
                        <svg id="hambIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Brand -->
                    <div class="flex items-end gap-3">
                        <div class="icon-wrap">
                            <!-- small crown icon -->
                            
                        </div>
                        <div>
                            <div class="text-sm font-semibold" style="color:var(--gold)"><span class="uppercase tracking-wider">Team_0001</span></div>
                            <div class="text-xs text-muted" style="color:var(--muted)">Premium dashboard</div>
                        </div>
                    </div>
                </div>

                <!-- right: actions -->
                <div class="flex items-center gap-3">
                    <!-- theme toggle -->
                    <button id="themeToggle" class="p-2 rounded-md hover:scale-105" aria-label="Toggle theme" title="Toggle dark / light">
                        <!-- moon / sun icons -->
                        <svg id="iconMoon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-width="1.6" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" stroke="var(--gold)" />
                        </svg>
                        <svg id="iconSun" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-width="1.6" d="M12 3v2M12 19v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4M12 7a5 5 0 100 10 5 5 0 000-10z" stroke="var(--gold)" />
                        </svg>
                    </button>

                   

                    <!-- CTA -->
                    <button class="btn-gold px-3 py-2 rounded-md text-sm">Logout</button>
                </div>
            </div>
        </div>
    </header>

    <!-- LAYOUT -->
    <div class="max-w-7xl  px-4 sm:px-6  mt-6">
        <div class="flex gap-6">
            <!-- SIDEBAR (collapsible on mobile) -->
            <aside id="sidebar" class="sidebar hidden md:block">
                <nav class="mt-2 space-y-1" aria-label="Sidebar">
                    <div class="nav-item">
                        <a href="#" class="active" aria-current="page" title="Dashboard">
                            <svg class="w-5 h-5 text-gold" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 13h8V3H3v10zM3 21h8v-6H3v6zM13 21h8V11h-8v10zM13 3v6h8V3h-8z" fill="gold" />
                            </svg>
                            <span class="ml-1">Dashboard</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="#" class="" title="Team">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zM8 13c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zM16 13c-.29 0-.62.02-.97.05 1.16.84 1.97 2.06 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-6-3.5z" fill="currentColor" />
                            </svg>
                            <span class="ml-1">Team Members</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M3 6h18v2H3zM3 12h12v2H3zM3 18h18v2H3z" fill="currentColor" />
                            </svg>
                            <span class="ml-1">Projects</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M7 10h10v8H7zM21 6h-2V4a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H3v2h18V6z" fill="currentColor" />
                            </svg>
                            <span class="ml-1">Calendar</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M21 6h-2v9H5V6H3v12h18V6z" fill="currentColor" />
                            </svg>
                            <span class="ml-1">Messages</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M12 12a5 5 0 100-10 5 5 0 000 10zM3 20a9 9 0 0118 0H3z" fill="currentColor" />
                            </svg>
                            <span class="ml-1">Reports</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="#">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M10.59 13.41L9.17 15 13 18.83 14.41 17.41zM12 2a1 1 0 00-1 1v3.09l2 .5V3a1 1 0 00-1-1z" fill="currentColor" />
                            </svg>
                            <span class="ml-1">Settings</span>
                        </a>
                    </div>
                </nav>
            </aside>

            <!-- MAIN AREA -->
            <main class="flex-1 min-w-full">
                <!-- MOBILE SIDEBAR (overlay) -->
                <div id="mobileSidebar" class="fixed inset-0 z-40 md:hidden hidden" role="dialog" aria-modal="true">
                    <div id="mobileBackdrop" class="absolute inset-0 bg-black/40"></div>
                    <div class="absolute left-0 top-0 bottom-0 w-72 bg-white/90 dark:bg-[rgba(15,23,42,0.95)] p-5 overflow-y-auto">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="icon-wrap"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="gold" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 13h8V3H3v10zM3 21h8v-6H3v6zM13 21h8V11h-8v10zM13 3v6h8V3h-8z" />
                                    </svg></div>
                                <div>
                                    <div class="text-sm font-semibold" style="color:var(--gold)">Team_0001</div>
                                    <div class="text-xs" style="color:var(--muted)">Premium dashboard</div>
                                </div>
                            </div>
                            <button id="mobileClose" aria-label="Close menu" title="Close menu">✕</button>
                        </div>

                        <!-- mobile nav items -->
                        <nav class="space-y-2" aria-label="Mobile Sidebar Navigation">
                            <a class="block p-2 rounded-md nav-item" href="#">Dashboard</a>
                            <a class="block p-2 rounded-md nav-item" href="#">Team Members</a>
                            <a class="block p-2 rounded-md nav-item" href="#">Projects</a>
                            <a class="block p-2 rounded-md nav-item" href="#">Calendar</a>
                            <a class="block p-2 rounded-md nav-item" href="#">Messages</a>
                            <a class="block p-2 rounded-md nav-item" href="#">Reports</a>
                            <a class="block p-2 rounded-md nav-item" href="#">Settings</a>
                        </nav>
                    </div>
                </div>

                <!-- Page content: responsive single-column -> multi-column -->
                <div class="overflow-x-hidden">
                    <!-- Welcome + summary -->
                    <section class="card-premium p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <div class="text-sm text-muted" style="color:var(--muted)">Good morning,</div>
                            <div class="text-2xl font-extrabold">Welcome back, <span class="text-gold" style="color:var(--gold)">User</span></div>
                            <div class="text-sm text-muted mt-1">Here's what's happening with your team today.</div>
                        </div>

                        <div class="flex gap-3 items-center flex-wrap">
                            <div class="px-4 py-2 card-premium" style="background:transparent;border:1px solid var(--card-border);">
                                <div class="text-xs text-muted" style="color:var(--muted)">Active Members</div>
                                <div class="text-lg font-bold">78</div>
                            </div>
                            <div class="px-4 py-2 card-premium" style="background:transparent;border:1px solid var(--card-border);">
                                <div class="text-xs text-muted" style="color:var(--muted)">Open Complaints</div>
                                <div class="text-lg font-bold">12</div>
                            </div>
                            <div class="px-4 py-2 card-premium" style="background:transparent;border:1px solid var(--card-border);">
                                <div class="text-xs text-muted" style="color:var(--muted)">Polls Open</div>
                                <div class="text-lg font-bold">4</div>
                            </div>
                        </div>
                    </section>

                    <!-- Grid: Project Overview | Recent Activity | Tasks + Add Task -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Project Overview (spans 2 columns on larger screens) -->
                        <div class="lg:col-span-2 space-y-4">
                           <section class="card-premium p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <div class="text-sm text-muted" style="color:var(--muted)">Good morning,</div>
        <div class="text-2xl font-extrabold">Welcome back, <span class="text-gold" style="color:var(--gold)">User</span></div>
        <div class="text-sm text-muted mt-1">Here is your team's current status overview.</div>
    </div>

    <div class="flex gap-3 items-center flex-wrap">
        <div class="px-4 py-2 card-premium" style="background:transparent; border:1px solid var(--card-border);">
            <div class="text-xs text-muted" style="color:var(--muted)">Team Members Online</div>
            <div class="text-lg font-bold">25</div>
        </div>
        <div class="px-4 py-2 card-premium" style="background:transparent; border:1px solid var(--card-border);">
            <div class="text-xs text-muted" style="color:var(--muted)">Pending Support Tickets</div>
            <div class="text-lg font-bold">5</div>
        </div>
        <div class="px-4 py-2 card-premium" style="background:transparent; border:1px solid var(--card-border);">
            <div class="text-xs text-muted" style="color:var(--muted)">Active Polls</div>
            <div class="text-lg font-bold">2</div>
        </div>
    </div>
</section>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
    <!-- Project & Progress -->
    <div class="lg:col-span-2 card-premium p-6 space-y-6">
        <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="icon-wrap">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="gold" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path d="M3 13h8V3H3v10zM3 21h8v-6H3v6zM13 21h8V11h-8v10zM13 3v6h8V3h-8z" />
                    </svg>
                </div>
                <div>
                    <div class="text-lg font-semibold">Apollo Migration</div>
                    <div class="text-xs text-muted" style="color:var(--muted)">Last updated: 2 hours ago</div>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <!-- Completion -->
            <div class="flex items-center justify-between gap-4">
                <div>
                    <div class="text-xs text-muted" style="color:var(--muted)">Overall Completion</div>
                    <div class="text-sm font-semibold">68%</div>
                </div>
                <div class="flex-1 ml-4">
                    <div class="progress-smart rounded-full">
                        <span style="width:68%"></span>
                    </div>
                </div>
                <div class="w-20 text-right text-sm font-medium">68%</div>
            </div>

            <!-- Design Finished -->
            <div class="flex items-center justify-between gap-4">
                <div>
                    <div class="text-xs text-muted" style="color:var(--muted)">Design Phase</div>
                    <div class="text-sm font-semibold">Completed</div>
                </div>
                <div class="flex-1 ml-4">
                    <div class="progress-smart rounded-full">
                        <span style="width:100%"></span>
                    </div>
                </div>
                <div class="w-20 text-right text-sm font-medium">Done</div>
            </div>

            <!-- Backend Work -->
            <div class="flex items-center justify-between gap-4">
                <div>
                    <div class="text-xs text-muted" style="color:var(--muted)">Backend Development</div>
                    <div class="text-sm font-semibold">In Progress</div>
                </div>
                <div class="flex-1 ml-4">
                    <div class="progress-smart rounded-full">
                        <span style="width:45%"></span>
                    </div>
                </div>
                <div class="w-20 text-right text-sm font-medium">45%</div>
            </div>
        </div>

        <!-- Key stats -->
        <div class="grid grid-cols-3 gap-3 mt-6">
            <div class="p-3 card-premium text-center" style="background:transparent; border:1px solid var(--card-border);">
                <div class="text-xs text-muted" style="color:var(--muted)">Completed Milestones</div>
                <div class="font-bold">6</div>
            </div>
            <div class="p-3 card-premium text-center" style="background:transparent; border:1px solid var(--card-border);">
                <div class="text-xs text-muted" style="color:var(--muted)">Open Pull Requests</div>
                <div class="font-bold">4</div>
            </div>
            <div class="p-3 card-premium text-center" style="background:transparent; border:1px solid var(--card-border);">
                <div class="text-xs text-muted" style="color:var(--muted)">Blockers</div>
                <div class="font-bold">1</div>
            </div>
        </div>
    </div>

    <!-- Tasks summary -->
    <aside class="card-premium p-6 space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-sm text-muted" style="color:var(--muted)">Tasks</div>
                <div class="text-lg font-semibold">Tasks Summary</div>
            </div>
            <div class="text-sm text-muted">Due soon: <span class="font-medium">3</span></div>
        </div>

        <div class="space-y-3">
            <div class="flex items-center justify-between gap-3">
                <div>
                    <div class="text-sm font-semibold">Design landing page</div>
                    <div class="text-xs" style="color:var(--muted)">Assigned to Jane Smith</div>
                </div>
                <div class="pill pill-upcoming">Due in 2d</div>
            </div>

            <div class="flex items-center justify-between gap-3">
                <div>
                    <div class="text-sm font-semibold">API endpoint /reports</div>
                    <div class="text-xs" style="color:var(--muted)">Assigned to John Doe</div>
                </div>
                <div class="pill pill-due">Overdue</div>
            </div>

            <div class="flex items-center justify-between gap-3">
                <div>
                    <div class="text-sm font-semibold">Finalize spec document</div>
                    <div class="text-xs" style="color:var(--muted)">Assigned to Team</div>
                </div>
                <div class="pill pill-upcoming">Due in 3d</div>
            </div>
        </div>
    </aside>
</div>


                            <!-- Recent activity feed -->
                            <div class="card-premium p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-sm text-muted" style="color:var(--muted)">Activity</div>
                                        <div class="text-lg font-semibold">Recent Activity</div>
                                    </div>
                                    <div class="text-sm text-muted">Filter: <span class="ml-2 font-medium">All</span></div>
                                </div>

                                <div class="mt-4 space-y-3">
                                    <div class="activity-item flex items-start gap-3">
                                        <div class="icon-wrap">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2v6l4-4-4-2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm"><strong>Jane Smith</strong> pushed 3 commits to <span class="font-medium">feature/login</span></div>
                                            <div class="text-xs" style="color:var(--muted)">12 minutes ago</div>
                                        </div>
                                    </div>

                                    <div class="activity-item flex items-start gap-3">
                                        <div class="icon-wrap">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 6v6l4 2" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm"><strong>Admin</strong> closed complaint #421</div>
                                            <div class="text-xs" style="color:var(--muted)">1 hour ago</div>
                                        </div>
                                    </div>

                                    <div class="activity-item flex items-start gap-3">
                                        <div class="icon-wrap">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 13l4 5L20 6" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm"><strong>John Doe</strong> marked task <em>"Finalize specs"</em> as done</div>
                                            <div class="text-xs" style="color:var(--muted)">Yesterday</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tasks summary + add task form -->
                        <aside class="space-y-4">
                            <div class="card-premium p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-sm text-muted" style="color:var(--muted)">Tasks</div>
                                        <div class="text-lg font-semibold">Tasks Summary</div>
                                    </div>
                                    <div class="text-sm text-muted">Due: <span class="font-medium">3</span></div>
                                </div>

                                <div class="mt-4 space-y-3">
                                    <div class="flex items-center justify-between gap-3">
                                        <div>
                                            <div class="text-sm font-semibold">Design landing page</div>
                                            <div class="text-xs" style="color:var(--muted)">Assigned to Jane</div>
                                        </div>
                                        <div class="pill pill-upcoming">Due in 2d</div>
                                    </div>

                                    <div class="flex items-center justify-between gap-3">
                                        <div>
                                            <div class="text-sm font-semibold">API endpoint /reports</div>
                                            <div class="text-xs" style="color:var(--muted)">Assigned to John</div>
                                        </div>
                                        <div class="pill pill-due">Overdue</div>
                                    </div>

                                    <div class="flex items-center justify-between gap-3">
                                        <div>
                                            <div class="text-sm font-semibold">Finalize spec</div>
                                            <div class="text-xs" style="color:var(--muted)">Assigned to Team</div>
                                        </div>
                                        <div class="pill pill-upcoming">3d</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Task form (simple & elegant) -->
                            <div class="card-premium p-6">
                                <div class="text-sm text-muted" style="color:var(--muted)">Create Task</div>
                                <div class="text-lg font-semibold mb-3">Quick Add</div>

                                <form id="taskForm" class="space-y-3" onsubmit="return false;">
                                    <div>
                                        <label class="text-xs text-muted" style="color:var(--muted)">Title</label>
                                        <input id="taskTitle" class="input-field mt-1 w-full" placeholder="Design hero section" required>
                                    </div>

                                    <div>
                                        <label class="text-xs text-muted" style="color:var(--muted)">Assignee</label>
                                        <select id="taskAssignee" class="input-field mt-1 w-full">
                                            <option>— Select —</option>
                                            <option>Jane Smith</option>
                                            <option>John Doe</option>
                                            <option>Admin</option>
                                        </select>
                                    </div>

                                    <div class="flex gap-2">
                                        <input id="taskDue" type="date" class="input-field w-full" />
                                        <select id="taskPriority" class="input-field w-36">
                                            <option value="normal">Normal</option>
                                            <option value="high">High</option>
                                            <option value="low">Low</option>
                                        </select>
                                    </div>

                                    <div class="flex gap-2">
                                        <button id="addTaskBtn" class="btn-gold flex-1 py-2">Add Task</button>
                                        <button id="resetBtn" type="reset" class="py-2 px-4 border rounded-md" style="border-color:var(--card-border)">Reset</button>
                                    </div>
                                </form>

                                <div id="taskMsg" class="mt-3 text-sm" style="color:var(--muted); display:none;"></div>
                            </div>
                        </aside>
                    </div>

                    
                </div>

            </main>
        </div>
    </div>

    <!-- JavaScript (vanilla) -->
    <script>
        (function() {
            const htmlEl = document.documentElement;

            // Initial theme - attempt to use saved preference or system preference
            const stored = localStorage.getItem('theme-mode');
            if (stored === 'dark') htmlEl.classList.add('dark');
            else if (!stored) {
                // follow system preference
                const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (prefersDark) htmlEl.classList.add('dark');
            }

            // elements
            const themeToggle = document.getElementById('themeToggle');
            const iconSun = document.getElementById('iconSun');
            const iconMoon = document.getElementById('iconMoon');
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const mobileBackdrop = document.getElementById('mobileBackdrop');
            const mobileClose = document.getElementById('mobileClose');
            const taskForm = document.getElementById('taskForm');
            const addTaskBtn = document.getElementById('addTaskBtn');
            const taskMsg = document.getElementById('taskMsg');

            // reflect icons based on theme
            function refreshThemeIcon() {
                if (htmlEl.classList.contains('dark')) {
                    iconSun.classList.add('hidden');
                    iconMoon.classList.remove('hidden');
                } else {
                    iconSun.classList.remove('hidden');
                    iconMoon.classList.add('hidden');
                }
            }
            refreshThemeIcon();

            // toggle theme
            themeToggle.addEventListener('click', () => {
                htmlEl.classList.toggle('dark');
                if (htmlEl.classList.contains('dark')) localStorage.setItem('theme-mode', 'dark');
                else localStorage.setItem('theme-mode', 'light');
                refreshThemeIcon();
            });

            // mobile menu open with smooth transition
            mobileMenuButton.addEventListener('click', () => {
                mobileSidebar.classList.remove('hidden');
                // Add show class for transition
                setTimeout(() => mobileSidebar.classList.add('show'), 10);
            });

            // close handlers with smooth transition
            function closeMobileSidebar() {
                mobileSidebar.classList.remove('show');
                setTimeout(() => mobileSidebar.classList.add('hidden'), 300);
            }
            mobileBackdrop.addEventListener('click', closeMobileSidebar);
            mobileClose.addEventListener('click', closeMobileSidebar);

            // Add task simple interactivity
            addTaskBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const title = document.getElementById('taskTitle').value.trim();
                if (!title) {
                    taskMsg.style.display = 'block';
                    taskMsg.style.color = 'crimson';
                    taskMsg.innerText = 'Please enter a title for the task.';
                    return;
                }
                // Fake add: show confirmation and clear form
                taskMsg.style.display = 'block';
                taskMsg.style.color = 'green';
                taskMsg.innerText = 'Task "' + title + '" added — (demo only).';
                taskForm.reset();
                setTimeout(() => taskMsg.style.display = 'none', 3500);
            });

            // close mobile sidebar on window resize > md
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768 && !mobileSidebar.classList.contains('hidden')) {
                    closeMobileSidebar();
                }
            });
        })();
    </script>
</body>

</html>