<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <div class="d-flex justify-content-center align-items-center min-vh-100 bg-primary bg-gradient">
    <div class="card shadow rounded-4 p-4" style="max-width: 400px; width: 100%;">
      <h2 class="text-center text-primary mb-4 fw-bold">Admin Login</h2>
      <form action="../code/login_code.php" method="post">
        <div class="mb-3">
          <label for="email" class="form-label fw-semibold">Email</label>
          <div class="input-group">
            <span class="input-group-text bg-white border-end-0"><i class="bi bi-envelope-fill text-primary"></i></span>
            <input type="email" class="form-control border-start-0 shadow-none" id="email" name="email" placeholder="admin@example.com" required />
          </div>
        </div>
        <div class="mb-4">
          <label for="password" class="form-label fw-semibold">Password</label>
          <div class="input-group">
            <span class="input-group-text bg-white border-end-0"><i class="bi bi-lock-fill text-primary"></i></span>
            <input type="password" class="form-control border-start-0 shadow-none" id="password" name="password" placeholder="Enter your password" required />
          </div>
        </div>
        <button type="submit" name="login_btn" class="btn btn-primary w-100 fw-bold">
          <i class="bi bi-box-arrow-in-right me-2"></i>Login
        </button>
      </form>
    </div>
  </div>

  <!-- Bootstrap 5 JS bundle (Popper and Bootstrap JS) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
