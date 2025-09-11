<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Team_0001 || Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet" />
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%);
            color: #fff;
            margin: 0;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Cinzel Decorative', serif;
            color: #d4af37;
            letter-spacing: 1.2px;
        }
        .navbar {
            background: rgba(13, 27, 42, 0.9);
            backdrop-filter: blur(6px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            position: fixed; top: 0; width: 100%; z-index: 1060;
            padding: 0.7rem 1.2rem;
        }
        .btn-logout, .btn-back {
            font-weight: 600; border-radius: 25px;
            padding: 6px 22px; border: none;
            transition: 0.2s ease-in-out; cursor: pointer;
        }
        .btn-back {
            background: #d4af37; color: #000;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.4);
        }
        .btn-back:hover { background: #fff; color: #000; }
        .btn-logout { background: #d9534f; color: #fff;
            box-shadow: 0 4px 12px rgba(217, 83, 79, 0.4);
        }
        .btn-logout:hover { background: #d4af37; color: #000; }
        .sidebar {
            position: fixed; top: 0; left: -250px; width: 250px; height: 100%;
            background: #1b263b;
            border-right: 1px solid rgba(212, 175, 55, 0.3);
            transition: all 0.3s ease; z-index: 1055;
            padding-top: 4rem; overflow-y: auto;
        }
        .sidebar.active { left: 0; }
        .sidebar .close-btn { position: absolute; top: 15px; right: 15px;
            font-size: 1.5rem; color: #d4af37; cursor: pointer; }
        .sidebar .user-section {
            text-align: center; margin-bottom: 2rem;
        }
        .sidebar .user-section img {
            width: 70px; height: 70px; border-radius: 50%;
            border: 2px solid #d4af37;
            box-shadow: 0 3px 8px rgba(212, 175, 55, 0.4);
        }
        .sidebar .user-name { margin-top: 0.6rem; font-weight: 600; font-size: 1.1rem; }
        .sidebar .user-role { font-size: 0.9rem; color: #d4af37; font-weight: bold; }
        .sidebar .nav-link {
            color: #ddd; font-weight: 500; padding: 0.8rem 1rem; border-radius: 8px;
            margin: 0.3rem 0; display: flex; align-items: center; gap: 12px;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(212, 175, 55, 0.15);
            color: #d4af37;
        }
        .content {
            margin-left: 0; padding: 4rem 1.5rem 1.5rem 1.5rem;
            transition: margin-left 0.3s ease;
        }
        @media (min-width: 992px) {
            .sidebar { left: 0; overflow-y: auto; z-index: 1055; }
            .content { margin-left: 250px; padding-top: 4rem; }
            .sidebar .close-btn { display: none; }
        }
        .mobile-menu-btn {
            font-size: 1.5rem; color: #d4af37; cursor: pointer;
        }
        @media (min-width: 992px) { .mobile-menu-btn { display: none; } }
        .card {
            display: flex; flex-wrap: wrap; align-items: center; padding: 1rem;
            background: rgba(212, 175, 55, 0.08);
            border: none; border-radius: 8px;
            min-height: 110px;
        }
        .icon-circle {
            font-size: 2.5rem; min-width: 3.5rem; color: #d4af37;
        }
        .flex-text {
            flex-grow: 1; margin-left: 1rem; min-width: 0; color: #fff;
        }
        .card h6, .card p {
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin: 0;
        }
        .card h6 { font-size: 1.15rem; color: #d4af37; letter-spacing: 0.9px; }
        .card p { font-size: 1.25rem; color: #ffd866; }
        .card .icon-circle + .flex-text h6 { text-transform: uppercase; font-weight: 600; margin-bottom: 5px; }
        .card-premium { background: rgba(212,175,55,0.13) !important; }
        @media (max-width: 576px) {
            .icon-circle { font-size: 1.8rem; min-width: 2.5rem; }
            .card { flex-direction: column; text-align: center; padding: 0.8rem; }
            .flex-text { margin-left: 0; margin-top: 0.4rem; width: 100%; }
            .card h6 { font-size: 1rem !important; white-space: normal; }
            .card p { font-size: 1.1rem !important; white-space: normal; }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <span class="mobile-menu-btn" id="mobileMenuBtn" onclick="toggleSidebar()"><i class="bi bi-list"></i></span>
            <h6 class="ms-2">TEAM_0001 DASHBOARD</h6>
            <div class="ms-auto">
                <button class="btn-back me-2">Back</button>
                <button class="btn-logout">Logout</button>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <span class="close-btn" id="sidebarCloseBtn" onclick="toggleSidebar()">&times;</span>
        <div class="user-section">
            <img src="https://via.placeholder.com/70" alt="User" />
            <div class="user-name">John Doe</div>
            <div class="user-role">Admin</div>
        </div>
        <ul class="nav flex-column px-2">
            <li><a href="#" class="nav-link active"><i class="bi bi-grid"></i> Dashboard</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-person"></i> Profile</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-gear"></i> Settings</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
        </ul>
    </div>
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("active");
        }
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.getElementById("sidebar");
            const mobileMenuBtn = document.getElementById("mobileMenuBtn");
            const sidebarCloseBtn = document.getElementById("sidebarCloseBtn");
            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener("click", function() {
                    sidebar.classList.toggle("active");
                });
            }
            if (sidebarCloseBtn) {
                sidebarCloseBtn.addEventListener("click", function() {
                    sidebar.classList.remove("active");
                });
            }
            document.addEventListener("click", function(event) {
                if (window.innerWidth < 992 && sidebar.classList.contains("active")) {
                    if (!sidebar.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                        sidebar.classList.remove("active");
                    }
                }
            });
        });
    </script>
