<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team_0001 | User Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;800&display=swap" rel="stylesheet">


    <style>
        /* Luxury Gold Theme */
        body {
            background-color: #111111;
            color: #ffffff;
            font-family: 'Inter', sans-serif;
        }

        /* Sticky Header */
        .header {
            height: 70px;
            background-color: #1a1a1a;
            border-bottom: 1px solid #2c2c2c;
            position: sticky;
            /* sticky on scroll */
            top: 0;
            width: 100%;
            display: flex;
            align-items: center;
            padding: 0 20px;
            z-index: 1050;
            justify-content: space-between;
        }

        .header .welcome {
            color: #d4af37;
            font-weight: 600;
        }

        /* Header icons */
        .header .header-icons .nav-link {
            color: #d4af37;
            /* Fixed gold color for all screens */
            margin-left: 15px;
            position: relative;
            font-size: 1.3rem;
            transition: 0.3s;
        }

        .header .header-icons .nav-link:hover {
            color: #ffffff;
        }

        /* Sidebar */
        .sidebar {
            background-color: #1a1a1a;
            color: #ffffff;
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 70px;
            transition: all 0.3s;
            z-index: 1040;
        }

        .sidebar .nav-link {
            color: #e5e5e5;
            padding: 12px 20px;
            transition: 0.3s;
            display: flex;
            align-items: center;
            border-radius: 8px;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.2rem;
            color: #d4af37;
        }

        .sidebar .nav-link:hover {
            background-color: #2c2c2c;
            color: #d4af37;
        }
        .sidebar-mobile .nav-link {
    color: #e5e5e5 !important; /* force gold/white theme instead of blue */
    font-weight: 500;
    padding: 12px 20px;
    border-radius: 8px;
    transition: 0.3s;
}
.sidebar-mobile .nav-link i {
    color: #d4af37;
    margin-right: 12px;
    font-size: 1.3rem;
}
.sidebar-mobile .nav-link:hover {
    background-color: #2c2c2c;
    color: #d4af37;
}
.sidebar-mobile .nav-link.text-danger {
    color: #ff4d4d !important;
}

/* Add gap between items */
.sidebar-mobile ul.nav.flex-column {
    gap: 8px;
}

/* Make offcanvas content full height */
.sidebar-mobile .offcanvas-body {
    height: calc(100vh - 70px);
    overflow-y: auto;
    padding-top: 10px;
}

/* Smooth scrollbar */
.sidebar-mobile .offcanvas-body::-webkit-scrollbar {
    width: 6px;
}
.sidebar-mobile .offcanvas-body::-webkit-scrollbar-thumb {
    background: #d4af37;
    border-radius: 3px;
}
.sidebar-mobile .offcanvas-body::-webkit-scrollbar-track {
    background: #1a1a1a;
}

/* Ensure offcanvas has correct z-index */
.sidebar-mobile {
    z-index: 1100;
}

        /* Main content */
        main {
            margin-left: 250px;
            padding: 90px 20px 20px 20px;
            transition: margin-left 0.3s;
        }

        .premium-card {
            background: linear-gradient(135deg, #1f1f1f, #2a2a2a);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.6);
            transition: all 0.4s ease-in-out;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .premium-card::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, rgba(212, 175, 55, 0.2), rgba(212, 175, 55, 0));
            top: -100%;
            left: -100%;
            transition: all 0.6s ease-in-out;
            transform: rotate(25deg);
        }

        .premium-card:hover::after {
            top: 0;
            left: 0;
        }

        .premium-card:hover {
            transform: translateY(-5px);
            /* box-shadow: 0 12px 30px rgba(212, 175, 55, 0.4); */
        }

        /* Icon Circle */
        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #d4af37;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            color: #111111;
            transition: transform 0.4s ease;
        }

        .premium-card:hover .icon-circle {
            transform: scale(1.2) rotate(10deg);
        }

        .card-title {
            font-weight: 600;
            color: #d4af37;
            font-size: 1rem;
            text-transform: uppercase;
        }

        .card-count {
            font-weight: 700;
            font-size: 2rem;
            color: #ffffff;
        }

        .card-subtitle {
            font-size: 0.9rem;
            color: #b3b3b3;
        }

        .card-title {
            font-weight: 600;
            color: #d4af37;
        }

        .card-count {
            font-weight: 700;
            color: #ffffff;
        }

        /* Premium Cards */
        .card {
            background-color: #1f1f1f;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            padding: 20px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);

        }

        .card h5 {
            color: #d4af37;
            display: flex;
            align-items: center;
        }

        .card h5 i {
            margin-right: 10px;
        }

        /* Mobile adjustments */
        @media (max-width: 992px) {
            .sidebar {
                display: none;
            }

            main {
                margin-left: 0;
            }
        }

        .dashboard-header {
            font-family: 'Raleway', sans-serif;
        }

        .dashboard-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(90deg, #d4af37, #f0e68c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeInSlide 1s ease forwards;
            margin-bottom: 0.5rem;
        }

        .title-underline {
            width: 60px;
            height: 4px;
            background: #d4af37;
            border-radius: 2px;
            margin-bottom: 1rem;
            opacity: 0;
            animation: fadeInSlide 1.2s ease forwards;
            animation-delay: 0.5s;
        }

        .dashboard-subtitle {
            font-size: 1.1rem;
            color: #b3b3b3;
            opacity: 0;
            animation: fadeIn 1s ease forwards;
            animation-delay: 1s;
        }

        /* Animations */
        @keyframes fadeInSlide {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <!-- Mobile Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start d-lg-none sidebar-mobile" tabindex="-1" id="mobileSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" style="color:#d4af37;">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="nav flex-column gap-2 px-2">
                <li><a href="./dashboard.php" class="nav-link"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li><a href="./profile.php" class="nav-link"><i class="bi bi-person"></i> Profile</a></li>
                <li><a href="./messages.php" class="nav-link"><i class="bi bi-chat-dots"></i> Messages</a></li>
                <li><a href="./complaint.php" class="nav-link"><i class="bi bi-exclamation-triangle"></i> Complaint</a></li>
                <li><a href="./polls.php" class="nav-link"><i class="bi bi-bar-chart"></i> Polls</a></li>
                <li><a href="./settings.php" class="nav-link"><i class="bi bi-gear"></i> Settings</a></li>
                <li><a href="./logout.php" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            </ul>
        </div>
    </div>

    <!-- Sidebar Desktop -->
    <div class="sidebar d-none d-lg-block">
        <ul class="nav flex-column">
            <li><a href="./dashboard.php" class="nav-link"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="./profile.php" class="nav-link"><i class="bi bi-person"></i> Profile</a></li>
            <li><a href="./messages.php" class="nav-link"><i class="bi bi-chat-dots"></i> Messages</a></li>
            <li><a href="./complaint.php" class="nav-link"><i class="bi bi-exclamation-triangle"></i> Complaint</a></li>
            <li><a href="./polls.php" class="nav-link"><i class="bi bi-bar-chart"></i> Polls</a></li>
            <li><a href="./settings.php" class="nav-link"><i class="bi bi-gear"></i> Settings</a></li>
            <li><a href="./logout.php" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="d-flex align-items-center">
            <button class="btn btn-toggle d-lg-none me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                <i class="bi bi-list" style="font-size:1.5rem; color:#d4af37;"></i>
            </button>
            <span class="welcome">Welcome, <strong>John Doe</strong></span>
        </div>

        <div class="header-icons d-flex align-items-center">
            <a href="#" class="nav-link position-relative" title="Notifications">
                <i class="bi bi-bell"></i>

            </a>
            <a href="#" class="nav-link position-relative" title="Messages">
                <i class="bi bi-chat-dots"></i>

            </a>

            <!-- Profile Dropdown -->
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" title="Profile">
                    <i class="bi bi-person-circle"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="./profile.php"><i class="bi bi-person me-2"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="./settings.php"><i class="bi bi-gear me-2"></i> Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger" href="./logout.php"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container-fluid">
            <div class="dashboard-header mb-5 text-center">
                <h1 class="dashboard-title">Dashboard</h1>
                <div class="title-underline mx-auto"></div>
                <p class="dashboard-subtitle">Welcome to Team_0001 Premium User Dashboard</p>
            </div>

            <!-- Premium Cards -->
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card premium-card p-4">
                        <div class="d-flex align-items-center">
                            <!-- Icon Circle -->
                            <div class="icon-circle me-3">
                                <i class="bi bi-chat-dots"></i>
                            </div>
                            <div>
                                <h6 class="card-title mb-1">Messages</h6>
                                <h3 class="card-count mb-0">12</h3>
                                <small class="card-subtitle">New messages</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card premium-card p-4">
                        <div class="d-flex align-items-center">
                            <!-- Icon Circle -->
                            <div class="icon-circle me-3">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <div>
                                <h6 class="card-title mb-1">Polls</h6>
                                <h3 class="card-count mb-0">3</h3>
                                <small class="card-subtitle">Active pols</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card premium-card p-4">
                        <div class="d-flex align-items-center">
                            <!-- Icon Circle -->
                            <div class="icon-circle me-3">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <div>
                                <h6 class="card-title mb-1">Messages</h6>
                                <h3 class="card-count mb-0">12</h3>
                                <small class="card-subtitle">unresolved complaint</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <div class="card">
                        <h5><i class="bi bi-exclamation-triangle"></i> Complaints</h5>
                        <p>1 unresolved complaint</p>
                    </div>
                </div> -->
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>