<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #0d6efd, #212529, #ffda6a);
      background-size: 300% 300%;
      animation: gradientBG 12s ease infinite;
      font-family: 'Inter', sans-serif;
    }

    @keyframes gradientBG {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    .login-card {
  background: rgba(33, 37, 41, 0.9);
  border-radius: 20px;
  box-shadow: 0 0 30px rgba(212, 175, 55, 0.3); /* golden glow instead of blue */
  padding: 2rem;
  width: 100%;
  max-width: 420px;
  backdrop-filter: blur(12px);
}

/* 📱 Mobile adjustments */
@media (max-width: 576px) {
  .login-card {
    padding: 1.2rem;
    max-width: 95%;   /* almost full width */
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(212, 175, 55, 0.2); /* softer glow */
  }
}


    .login-header {
      font-weight: 700;
      color: #ffc107;
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .form-control {
      border-radius: 12px;
      padding: 12px;
      background: #2b3035;
      color: #fff;
      border: 1px solid #444;
    }

    .form-control:focus {
      border-color: #d4af37;
      box-shadow: 0 0 8px rgba(13, 110, 253, 0.5);
      background: #2b3035;
      color: #fff;
    }

    .input-group-text {
      background: #2b3035;
      border: 1px solid #444;
      color: #d4af37;
      cursor: pointer;
    }

    .btn-login {
      border-radius: 12px;
      padding: 12px;
      font-weight: 600;
      letter-spacing: 0.5px;
      background: linear-gradient(135deg, #d4af37, #ffda6a);
      /* golden gradient */
      border: none;
      color: #0d1b2a;
      /* dark text on gold */
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);
      /* glowing golden shadow */
    }

    .btn-login:hover {
      background: linear-gradient(135deg, #ffda6a, #d4af37);
      /* reverse gradient */
      color: #000;
      /* deeper contrast on hover */
      box-shadow: 0 6px 20px rgba(212, 175, 55, 0.6);
      transform: translateY(-2px);
    }
  </style>
</head>

<body>
  <div class="login-card">
    <h2 class="login-header"><i class="bi bi-shield-lock me-2"></i>Admin Login Team 0001</h2>

    <form action="../code/login_code.php" method="post">
      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label fw-semibold text-light">Email Address</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
          <input type="email" class="form-control shadow-none" id="email" name="email" placeholder="admin@example.com" required />
        </div>
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label for="password" class="form-label fw-semibold text-light">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input type="password" class="form-control shadow-none" id="password" name="password" placeholder="Enter your password" required />
          <span class="input-group-text" id="togglePassword"><i class="bi bi-eye-fill"></i></span>
        </div>
      </div>

      <!-- Submit -->
      <button type="submit" name="login_btn" class="btn btn-login w-100">
        <i class="bi bi-box-arrow-in-right me-2"></i> Login
      </button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Show/Hide Password Script -->
  <script>
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");

    togglePassword.addEventListener("click", () => {
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);

      // Toggle eye / eye-slash icon
      togglePassword.innerHTML = type === "password" ?
        '<i class="bi bi-eye-fill"></i>' :
        '<i class="bi bi-eye-slash-fill"></i>';
    });
  </script>
</body>

</html>