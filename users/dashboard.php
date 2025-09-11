<?php
session_start();
if (!isset($_SESSION['user_email']) || !$_SESSION['user_id']) {
    header('Location: ../index.php');
    exit();
}
include 'head.php';
?>

<main class="content">
    <div class="container-fluid">

        <h3 class="mb-4" style="font-family:'Cinzel Decorative',serif;font-size:2rem; font-weight:700; letter-spacing:2px; color:#d4af37; text-shadow:0 2px 8px #000b;">
            Welcome, <?php echo htmlspecialchars($_SESSION['user_email']); ?>!
        </h3>

        <!-- Dashboard Summary Cards -->
        <div class="row g-4 mb-2">
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="icon-circle"><i class="bi bi-people"></i></div>
                    <div class="flex-text">
                        <h6>Total Users</h6>
                        <p>120</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="icon-circle"><i class="bi bi-bell"></i></div>
                    <div class="flex-text">
                        <h6>Announcements</h6>
                        <p>5 New</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="icon-circle"><i class="bi bi-bar-chart"></i></div>
                    <div class="flex-text">
                        <h6>Reports</h6>
                        <p>3 Pending</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 g-md-4">
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card card-premium shadow-sm border-0 p-3 h-100">
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="icon-circle me-3"><i class="bi bi-star-fill"></i></span>
                        <div class="flex-text">
                            <h5 class="mb-1">Points</h5>
                            <small class="text-muted">Your score: <span class="fw-bold text-light">3,200</span></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card card-premium shadow-sm border-0 p-3 h-100">
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="icon-circle me-3"><i class="bi bi-bar-chart-fill"></i></span>
                        <div class="flex-text">
                            <h5 class="mb-1">Polls</h5>
                            <small class="text-muted">Answered: <span class="fw-bold text-light">12</span> of 15</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card card-premium shadow-sm border-0 p-3 h-100">
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="icon-circle me-3"><i class="bi bi-exclamation-triangle-fill"></i></span>
                        <div class="flex-text">
                            <h5 class="mb-1">Complaints</h5>
                            <small class="text-muted">Resolved: <span class="fw-bold text-light">3</span> | Pending: <span class="fw-bold text-light">1</span></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include 'foot.php'; ?>
