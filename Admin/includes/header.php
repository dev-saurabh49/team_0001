<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="/Admin/assets/style.css" rel="stylesheet">


</head>

<nav class="navbar px-3 d-flex justify-content-between align-items-center">
    <div>
        <span class="toggle-btn d-md-none" onclick="toggleSidebar()"><i class="fa fa-bars"></i></span>
        <span class="navbar-brand mb-0 h4 text-primary">Welcome, <?php echo $_SESSION['admin_name']; ?> 👋</span>
    </div>
    <div>
        <button id="themeToggle" class="btn btn-sm btn-primary fw-bold rounded-pill">
            <i class="fa fa-moon"></i> Dark
        </button>

    </div>
</nav>


<body>