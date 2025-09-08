          <?php session_start(); ?>

          <!DOCTYPE html>
          <html lang="en">

          <head>
              <meta charset="UTF-8" />
              <meta name="viewport" content="width=device-width, initial-scale=1" />
              <title>TEAM 0001 - Homepage</title>
              <!-- Bootstrap 5 -->
              <link
                  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
                  rel="stylesheet" />
              <link rel="stylesheet" href="style.css" />
              <link
                  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
                  rel="stylesheet" />
              <link
                  href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Poppins:wght@400;600&display=swap"
                  rel="stylesheet" />

              <link
                  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
                  rel="stylesheet" />
          </head>

          <body>
              <!-- Navbar -->
              <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm" style="background: #0d1b2a">
                  <div class="container">
                      <!-- Brand -->
                      <a class="navbar-brand d-flex align-items-center fw-bold text-warning" href="#">
                          <img src="images/0001.jpeg" alt="Team 0001 Logo" class="me-2 rounded-circle" style="height: 35px; width: 35px; object-fit: cover" />
                          ⲧē𝕒ɱ_𝟘𝟘𝟘1
                      </a>

                      <!-- Toggler Button -->
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>

                      <!-- Nav Links -->
                      <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav ms-auto text-center">
                              <li class="nav-item"><a class="nav-link active text-light" href="../index.php">Home</a></li>
                              <li class="nav-item"><a class="nav-link text-light" href="#about">About</a></li>
                              <li class="nav-item"><a class="nav-link text-light" href="#members">Journey</a></li>
                              <li class="nav-item"><a class="nav-link text-light" href="#founders">Founders</a></li>
                              <li class="nav-item"><a class="nav-link text-light" href="#mission">Our Mission</a></li>
                              <li class="nav-item"><a class="nav-link text-light" href="#contact">Contact Us</a></li>

                              <?php if (isset($_SESSION['user_name'])): ?>
                                  <!-- User is logged in -->
                                  <li class="nav-item">
                                      <a class="nav-link text-warning fw-bold" href="../users/dashboard.php">
                                          <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link text-light" href="code/logout.php">
                                          <i class="fas fa-sign-out-alt me-1"></i> Logout
                                      </a>
                                  </li>
                              <?php else: ?>
                                  <!-- Admin Login button -->
                                  <li class="nav-item"><a class="nav-link active text-light" href="../admin/dashboard/login.php">Admin Login</a></li>
                              <?php endif; ?>

                          </ul>
                      </div>
                  </div>
              </nav>