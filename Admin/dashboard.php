<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../index.php");
    exit();
}
include "includes/header.php";
include "includes/sidebar.php";
?>

<!-- Main Content -->
<div class="content">
  <nav class="navbar navbar-dark px-3">
    <span class="toggle-btn d-md-none" onclick="toggleSidebar()"><i class="fa fa-bars"></i></span>
    <span class="navbar-brand mb-0 h4 text-info">Welcome, <?php echo $_SESSION['admin_name']; ?> 👋</span>
  </nav>

  <div class="row mt-4">
    <div class="col-md-4 col-sm-6 mb-4">
      <div class="card p-4 text-center">
        <h5>Total Users</h5>
        <h2 class="fw-bold text-primary">120</h2>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 mb-4">
      <div class="card p-4 text-center">
        <h5>Total Teams</h5>
        <h2 class="fw-bold text-success">15</h2>
      </div>
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
      <div class="card p-4 text-center">
        <h5>Admins</h5>
        <h2 class="fw-bold text-warning">3</h2>
      </div>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>
