<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Team Management Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: var(--bs-body-bg);
            color: var(--bs-body-color);
            transition: background 0.3s, color 0.3s;
        }

        /* Modern User Dropdown Styles */
        .profile-menu .dropdown-toggle {
            border: none;
            background: transparent;
            font-size: 1rem;
            transition: box-shadow 0.18s;
            outline: none;
        }

        .profile-pic img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 1px 6px 0 rgba(60, 75, 100, 0.10);
            transition: box-shadow 0.18s;
        }

        .dropdown-menu.animate__fadeIn {
            animation: fadeIn 0.22s cubic-bezier(0.3, 0.1, 0.45, 1) both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .profile-menu .dropdown-item {
            border-radius: 8px;
            transition: background 0.13s;
            display: flex;
            align-items: center;
        }

        .profile-menu .dropdown-item:hover,
        .profile-menu .dropdown-item:focus {
            background: var(--bs-primary-bg-subtle);
            color: var(--bs-primary);
        }

        .sidebar {
            min-width: 240px;
            max-width: 250px;
            min-height: 100vh;
            background: var(--bs-light);
            transition: left 0.3s;
            box-shadow: 2px 0 20px rgba(30, 38, 94, 0.05);
            border-radius: 18px 0 0 18px;
            z-index: 1030;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }

        .sidebar .nav-link {
            color: var(--bs-gray-700);
            border-radius: 10px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            transition: background 0.15s, color 0.15s;
            font-weight: 500;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: var(--bs-primary-bg-subtle);
            color: var(--bs-primary);
            box-shadow: 0 4px 18px rgba(37, 99, 235, 0.07);
        }

        .sidebar .bi {
            margin-right: 14px;
            font-size: 1.1rem;
        }

        .navbar {
            border-radius: 0 0 16px 16px;
            box-shadow: 0 4px 14px rgba(30, 60, 90, 0.04);
        }

        .navbar-toggler {
            border: none;
        }

        .card {
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(44, 62, 80, 0.05);
            overflow: hidden;
            transition: box-shadow 0.2s, transform 0.12s;
        }

        .card:hover {
            box-shadow: 0 8px 36px rgba(30, 96, 235, 0.08);
            transform: translateY(-2px) scale(1.01);
        }

        .quick-actions .btn {
            border-radius: 12px;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            min-width: 130px;
            transition: box-shadow 0.17s;
        }

        .quick-actions .btn:hover {
            box-shadow: 0 6px 20px 0 rgba(37, 199, 112, 0.13);
            transform: translateY(-3px);
        }

        .list-group-item {
            border: none;
            border-radius: 8px;
            margin-bottom: 6px;
        }

        .announcement {
            padding: 0.9rem;
            background: var(--bs-secondary-bg-subtle);
            border-radius: 10px;
            margin-bottom: 10px;
            color: var(--bs-secondary);
            font-size: 0.98rem;
        }

        /* Responsive sidebar */
        @media (max-width: 991.98px) {

            .sidebar {
                left: -100%;
                transition: left 0.3s ease;
            }

            .sidebar.open {
                left: 0;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            }

            .content {
                padding-left: 0 !important;
            }
        }

        /* Scrollable tables and charts on small screens */
        .table-responsive,
        .chart-responsive {
            overflow-x: auto;
        }

        /* Dark mode */
        [data-bs-theme="dark"] {
            --bs-body-bg: #18191a;
            --bs-body-color: #eee;
            --bs-card-bg: #23272b;
            --bs-primary-bg-subtle: #26347b;
            --bs-light: #22232d;
            --bs-gray-700: #bbb;
            --bs-secondary-bg-subtle: #252d33;
        }

        [data-bs-theme="dark"] .card {
            background: var(--bs-card-bg);
        }

        .mode-btn {
            border-radius: 10px;
            background: none;
            border: none;
            font-size: 1.3rem;
            color: var(--bs-body-color);
        }

        /* Close button spacing */
        #sidebarCloseBtn {
            border-radius: 10px;
            width: 40px;
            height: 40px;
            padding: 0;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar p-4">
        <!-- Close button, visible only on mobile -->
        <button type="button" class="btn btn-light d-lg-none mb-4" id="sidebarCloseBtn" aria-label="Close sidebar">
            <i class="bi bi-x fs-3"></i>
        </button>

        <!-- Sidebar content -->
        <h3 class="mb-4 text-primary fw-bold">TeamBoard</h3>
        <ul class="nav nav-pills flex-column">
            <li><a href="#" class="nav-link active"><i class="bi bi-grid"></i> Dashboard</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-people"></i> Teams</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-person-badge"></i> Members</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-check2-square"></i> Tasks</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-graph-up-arrow"></i> Reports</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-gear"></i> Settings</a></li>
        </ul>
    </nav>

    <div class="content" style="padding-left:250px;">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-2">
            <button class="btn d-lg-none me-2" id="mobileMenuBtn" aria-label="Toggle sidebar"><i class="bi bi-list"></i></button>
            <form class="d-none d-md-flex ms-auto me-4">
                <input class="form-control form-control-sm rounded-pill" type="search" placeholder="Search…" />
            </form>
            <div class="d-flex align-items-center">
                <button id="modeToggle" class="mode-btn me-3" aria-label="Toggle dark mode"><i class="bi bi-moon"></i></button>
                <a class="btn btn-link position-relative me-3" href="#"><i class="bi bi-bell fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">4</span>
                </a>
                <div class="dropdown profile-menu ms-2">
                    <button class="btn btn-link dropdown-toggle d-flex align-items-center py-0 px-2" data-bs-toggle="dropdown"
                        aria-expanded="false" id="profileDropdown" aria-label="Open user menu">
                        <span class="profile-pic me-2 d-inline-block">
                            <img src="https://i.pravatar.cc/40?img=1" alt="user" width="34" height="34" class="rounded-circle shadow-sm" />
                        </span>
                        <span class="d-none d-md-inline fw-semibold text-dark">Admin</span>
                        <i class="bi bi-chevron-down ms-2 d-md-none"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-2 animate__fadeIn" aria-labelledby="profileDropdown"
                        style="min-width:220px;">
                        <li class="px-2 py-2 border-bottom">
                            <div class="d-flex align-items-center">
                                <img src="https://i.pravatar.cc/40?img=1" alt="user" class="rounded-circle me-2" width="40" height="40" />
                                <div>
                                    <div class="fw-bold">Admin</div>
                                    <small class="text-muted d-block">admin@email.com</small>
                                    <span class="badge bg-info text-dark mt-1">Administrator</span>
                                </div>
                            </div>
                        </li>
                        <li><a class="dropdown-item mt-2" href="./profile.php"><i class="bi bi-person me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i>Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- MAIN GRID -->
        <main class="container-fluid pt-4">
            <!-- Stats Cards -->
            <div class="row g-4 mb-2">
                <div class="col-6 col-md-3">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3"><i class="bi bi-people"></i></span>
                            <div>
                                <h5 class="mb-0 fw-bold">12</h5>
                                <small class="text-muted">Teams</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <span class="bg-success bg-opacity-10 text-success rounded-circle p-3 me-3"><i class="bi bi-person-check"></i></span>
                            <div>
                                <h5 class="mb-0 fw-bold">38</h5>
                                <small class="text-muted">Active Members</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <span class="bg-warning bg-opacity-10 text-warning rounded-circle p-3 me-3"><i class="bi bi-clock-history"></i></span>
                            <div>
                                <h5 class="mb-0 fw-bold">7</h5>
                                <small class="text-muted">Pending Tasks</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <span class="bg-success bg-opacity-10 text-success rounded-circle p-3 me-3"><i class="bi bi-check-circle"></i></span>
                            <div>
                                <h5 class="mb-0 fw-bold">126</h5>
                                <small class="text-muted">Completed</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts & Quick Actions -->
            <div class="row g-4">
                <div class="col-12 col-lg-8">
                    <div class="card p-4 chart-responsive">
                        <h5 class="mb-3 fw-semibold">Task Progress</h5>
                        <canvas id="tasksChart" height="140"></canvas>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card p-4 mb-4">
                        <h5 class="mb-3 fw-semibold">Quick Actions</h5>
                        <div class="quick-actions d-flex flex-wrap gap-2">
                            <button class="btn btn-primary"><i class="bi bi-plus-lg me-2"></i> Add Team</button>
                            <button class="btn btn-secondary"><i class="bi bi-person-plus me-2"></i> Invite Member</button>
                            <button class="btn btn-success"><i class="bi bi-plus-square me-2"></i> Create Task</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity / Announcements and Table -->
            <div class="row g-4 mt-1">
                <div class="col-12 col-lg-4">
                    <div class="card p-4 mb-4">
                        <h5 class="mb-3 fw-semibold">Recent Activity</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex align-items-center">
                                <span class="text-success me-2"><i class="bi bi-check-circle-fill"></i></span> Mark assigned as completed by <b class="ms-1">Kiran</b>
                                <span class="badge bg-secondary ms-auto">now</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <span class="text-warning me-2"><i class="bi bi-clock-fill"></i></span> Task "Design Update" pending review
                                <span class="badge bg-warning ms-auto">5 min</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <span class="text-primary me-2"><i class="bi bi-people-fill"></i></span> New member <b class="ms-1">Sana</b> invited
                                <span class="badge bg-info text-dark ms-auto">15 min</span>
                            </li>
                        </ul>
                    </div>
                    <div class="card p-4">
                        <h5 class="mb-3 fw-semibold">Announcements</h5>
                        <div class="announcement">Team meeting on Monday at 10AM IST.</div>
                        <div class="announcement">Please submit timesheets by Friday EOD.</div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card p-4 table-responsive">
                        <h5 class="mb-3 fw-semibold">Upcoming Tasks</h5>
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Task</th>
                                    <th scope="col">Team</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Due</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Database Migration</td>
                                    <td>Development</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>Today</td>
                                    <td><button class="btn btn-sm btn-light"><i class="bi bi-arrow-right"></i></button></td>
                                </tr>
                                <tr>
                                    <td>Client Demo</td>
                                    <td>Marketing</td>
                                    <td><span class="badge bg-primary">Ongoing</span></td>
                                    <td>Tomorrow</td>
                                    <td><button class="btn btn-sm btn-light"><i class="bi bi-arrow-right"></i></button></td>
                                </tr>
                                <tr>
                                    <td>UI/UX Review</td>
                                    <td>Design</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>Yesterday</td>
                                    <td><button class="btn btn-sm btn-light"><i class="bi bi-arrow-right"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Scripts (Bootstrap, Chart.js, etc.)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.3/dist/chart.umd.min.js"></script>
    <script>
        // Mobile sidebar toggle open/close
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarCloseBtn = document.getElementById('sidebarCloseBtn');

        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });

        sidebarCloseBtn.addEventListener('click', () => {
            sidebar.classList.remove('open');
        });

        // Optional: Close sidebar clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (
                sidebar.classList.contains('open') &&
                !sidebar.contains(e.target) &&
                !mobileMenuBtn.contains(e.target)
            ) {
                sidebar.classList.remove('open');
            }
        });

        // Dark/Light Mode Toggle
        let modeToggle = document.getElementById('modeToggle');
        modeToggle.onclick = function() {
            let html = document.documentElement;
            let current = html.getAttribute('data-bs-theme');
            html.setAttribute('data-bs-theme', current === 'dark' ? 'light' : 'dark');
            modeToggle.innerHTML =
                current === 'dark' ? '<i class="bi bi-moon"></i>' : '<i class="bi bi-sun"></i>';
        };

        // Chart.js Example: Task Progress
        const ctx = document.getElementById('tasksChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                    label: 'Tasks Completed',
                    data: [2, 5, 7, 8, 6, 9, 12],
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37,99,235,0.13)',
                    tension: 0.35,
                    pointRadius: 4,
                    pointBackgroundColor: '#2563eb',
                    fill: true,
                }, ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: true,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#eee',
                        },
                    },
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                },
            },
        });
    </script>
</body>

</html>