<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Login</title>
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="light-theme">
<main class="auth-container">
  <div class="auth-card">
    <h2 class="auth-title">Admin Sign In</h2>
    <form id="adminLoginForm" action="code/admin_login.php" method="POST" class="auth-form">
      <label>Email</label>
      <input type="email" name="email" required placeholder="admin@example.com">
      <label>Password</label>
      <input type="password" name="password" required placeholder="Password">
      <div class="auth-actions">
        <button type="submit" name="admin_login" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>
</main>
<script src="assets/js/script.js"></script>
</body>
</html>
