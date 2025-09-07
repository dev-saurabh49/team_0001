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
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar p-4">
        <!-- Close button, visible only on mobile -->
        <button type="button" class="btn btn-light d-lg-none mb-4" id="sidebarCloseBtn" aria-label="Close sidebar">
            <i class="bi bi-x fs-3"></i>
        </button>

        <!-- Sidebar content -->
        <h3 class="mb-4 text-primary fw-bold">Team 0001</h3>
        <ul class="nav nav-pills flex-column">
            <li><a href="./d.php" class="nav-link active"><i class="bi bi-grid"></i> Dashboard</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-people"></i> Teams</a></li>
            <li><a href="../dashboard/members.php" class="nav-link"><i class="bi bi-person-badge"></i> Members</a></li>
            <li><a href="../dashboard/block_member.php" class="nav-link"><i class="bi bi-block-person"></i> Blocked Members</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-check2-square"></i> Tasks</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-graph-up-arrow"></i> Reports</a></li>
            <li><a href="#" class="nav-link"><i class="bi bi-gear"></i> Settings</a></li>
        </ul>
    </nav>

    <div class="content mt-3" style="padding-left:250px;">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-2">
            <button class="btn d-lg-none me-2" id="mobileMenuBtn" aria-label="Toggle sidebar"><i class="bi bi-list"></i></button>
            <?php

            session_start();
            if (isset($_SESSION['admin_name'])) {
                echo '<div class="welcome-message text-primary fw-semibold me-3">Welcome, ' . $_SESSION['admin_name'] . '!</div>';
            }
            ?>


            <form class="d-none d-md-flex ms-auto me-4">
                <input class="form-control form-control-sm rounded-pill" type="search" placeholder="Search…" />
            </form>
            <div class="d-flex align-items-center">
                <button id="modeToggle" class="mode-btn me-3" aria-label="Toggle dark mode"><i class="bi bi-moon"></i></button>
                <a class="btn btn-link position-relative me-3" href="./show_activity.php"><i class="bi bi-bell fs-5"></i>
                    <?php
                    include "../../code/db_connection.php";

                    // Count latest activities (ya total activities)
                    $countQuery = "SELECT COUNT(*) as total FROM member_activity";
                    $result = $conn->query($countQuery);
                    $row = $result->fetch_assoc();
                    $activityCount = $row['total'];
                    ?>

                    <!-- Button with dynamic badge -->
                    
                        <?php if ($activityCount > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo $activityCount; ?>
                            </span>
                        <?php endif; ?>
                  

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
                        <li><a class="dropdown-item text-danger" href="../code/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>