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
                          ★彡[ⲧē𝕒ɱ_𝟘𝟘𝟘1]彡★
                      </a>

                      <!-- Toggler Button -->
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>

                      <!-- Nav Links -->
                      <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav ms-auto text-center">
                              <li class="nav-item"><a class="nav-link active text-light" href="#">Home</a></li>
                              <li class="nav-item"><a class="nav-link text-light" href="#about">About</a></li>
                              <li class="nav-item"><a class="nav-link text-light" href="#members">Journey</a></li>
                              <li class="nav-item"><a class="nav-link text-light" href="#founders">Founders</a></li>
                              <li class="nav-item"><a class="nav-link text-light" href="#mission">Our Mission</a></li>
                              <li class="nav-item"><a class="nav-link text-light" href="#contact">Contact Us</a></li>

                              <?php if (isset($_SESSION['user_name'])): ?>
                                  <!-- User is logged in -->
                                  <li class="nav-item">
                                      <a class="nav-link text-warning fw-bold" href="user_dashboard.php">
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
                                  <li class="nav-item">
                                      <button type="button" class="btn btn-outline-warning fw-bold rounded-pill px-3 py-1 nav-admin-btn"
                                          data-bs-toggle="modal" data-bs-target="#adminLoginModal">
                                          <i class="fas fa-user-shield me-1"></i>Login
                                      </button>
                                  </li>
                              <?php endif; ?>

                          </ul>
                      </div>
                  </div>
              </nav>


              <!-- Admin login modal -->


              <!-- Admin Login Modal (unchanged) -->
              <div
                  class="modal fade"
                  id="adminLoginModal"
                  tabindex="-1"
                  aria-labelledby="adminLoginModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content bg-dark text-light rounded-4 shadow-lg">
                          <div class="modal-header border-0">
                              <h5 class="modal-title text-warning fw-bold" id="adminLoginModalLabel">
                                  Admin Login
                              </h5>
                              <button
                                  type="button"
                                  class="btn-close btn-close-white"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form id="adminLoginForm" action="/Admin/code/admin_login.php" method="post">
                                  <div class="mb-3">
                                      <label class="form-label text-light">Email Id</label>
                                      <input
                                        name="email"
                                          type="text"
                                          class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3"
                                          placeholder="Admin Username"
                                          required />
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label text-light">Password</label>
                                      <input
                                          type="password"
                                          name="password"
                                          class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3"
                                          placeholder="Password"
                                          required />
                                  </div>
                                  <div class="d-grid">
                                      <button type="submit" name="admin_login" class="btn btn-warning fw-bold rounded-pill py-2">
                                          Login
                                      </button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>