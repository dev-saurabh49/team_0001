          <?php session_start(); ?>
          <?php
            include './code/db_connection.php';  // Adjust path accordingly

            // Fetch maintenance mode status
            $result = $conn->query("SELECT is_active FROM maintenance_mode WHERE id = 1 LIMIT 1");
            $siteSettings = $result->fetch_assoc();

            if (!empty($siteSettings['is_active'])) {
            ?>
              <!DOCTYPE html>
              <html lang="en">

              <head>
                  <title>Maintenance Mode - Team 0001</title>
                  <meta name="viewport" content="width=device-width, initial-scale=1" />
                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
                  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
                  <style>
                      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

                      body,
                      html {
                          height: 100%;
                          margin: 0;
                          font-family: 'Poppins', sans-serif;
                          background: linear-gradient(135deg, #0d1b2a, #1b263b);
                          color: #f5f5f5;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          overflow: hidden;
                          flex-direction: column;
                          text-align: center;
                          padding: 20px;
                      }

                      h1 {
                          font-size: 3rem;
                          margin-bottom: 1rem;
                          color: #ffc107;
                          /* Golden text */
                          text-shadow: 0 0 15px rgba(212, 175, 55, 0.7);
                      }

                      .site-name {
                          font-weight: 700;
                          color: #f5f5f5;
                      }

                      p {
                          font-size: 1.25rem;
                          max-width: 450px;
                          margin: 0 auto 2rem;
                          color: #e0e0e0;
                      }

                      /* Animated golden dots loader */
                      .loader {
                          display: flex;
                          justify-content: center;
                          gap: 12px;
                          margin-bottom: 2rem;
                      }

                      .loader span {
                          width: 15px;
                          height: 15px;
                          background: #ffc107;
                          border-radius: 50%;
                          opacity: 0.6;
                          animation: bounce 1.4s infinite ease-in-out both;
                      }

                      .loader span:nth-child(1) {
                          animation-delay: -0.32s;
                      }

                      .loader span:nth-child(2) {
                          animation-delay: -0.16s;
                      }

                      @keyframes bounce {

                          0%,
                          80%,
                          100% {
                              transform: scale(0.7);
                              opacity: 0.5;
                          }

                          40% {
                              transform: scale(1.2);
                              opacity: 1;
                          }
                      }

                      .btn-maintenance {
                          background: linear-gradient(135deg, #d4af37, #ffd700);
                          color: #0d1b2a;
                          font-weight: 600;
                          border-radius: 50px;
                          padding: 10px 25px;
                          text-transform: uppercase;
                          letter-spacing: 1px;
                          transition: all 0.3s ease;
                      }

                      .btn-maintenance:hover {
                          background: linear-gradient(135deg, #ffd700, #d4af37);
                          color: #000;
                          transform: scale(1.05);
                      }

                      @media (max-width: 500px) {
                          h1 {
                              font-size: 2rem;
                          }

                          p {
                              font-size: 1rem;
                              max-width: 90%;
                          }
                      }
                  </style>
              </head>

              <body>
                  <h1><span class="site-name">Team 0001 Official Website</span><br>is Under Maintenance</h1>
                  <p>We're making improvements and will be back shortly.<br>Thank you for your patience!</p>

                  <div class="loader" aria-label="Loading animation">
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>

                  <a href="./admin/dashboard/login.php" class="btn-maintenance text-decoration-none">Admin Login</a>
              </body>

              </html>

          <?php
                exit;
            }
            ?>
          <!DOCTYPE html>
          <html lang="en">

          <head>
              <meta charset="UTF-8" />
              <meta name="viewport" content="width=device-width, initial-scale=1" />
              <title>TEAM 0001 - Homepage</title>
              <!-- Bootstrap 5 -->
              <!-- AOS CSS -->
              <link href="https://cdn.jsdelivr.net/npm/aos@3.0.0-beta.6/dist/aos.css" rel="stylesheet">
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css">
              <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js"></script>

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
              <link
                  rel="stylesheet"
                  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
                      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>

                      <!-- Nav Links -->
                      <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav ms-auto text-center align-items-center">
                              <!-- Main Pages -->
                              <li class="nav-item">
                                  <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active text-warning fw-bold' : 'text-light'; ?>" href="../index.php">
                                      Home
                                  </a>
                              </li>
                              <!-- <li class="nav-item">
                                  <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active text-warning fw-bold' : 'text-light'; ?>" href="../about.php">
                                      About Us
                                  </a>
                              </li> -->
                              <li class="nav-item">
                                  <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'journey.php' ? 'active text-warning fw-bold' : 'text-light'; ?>" href="../journey.php">
                                      Journey
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'mission.php' ? 'active text-warning fw-bold' : 'text-light'; ?>" href="../mission.php">
                                      Our Mission
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'gallery.php' ? 'active text-warning fw-bold' : 'text-light'; ?>" href="../gallery.php">
                                      Gallery
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'video.php' ? 'active text-warning fw-bold' : 'text-light'; ?>" href="../video.php">
                                      Videos
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'testimonials.php' ? 'active text-warning fw-bold' : 'text-light'; ?>" href="../testimonials.php">
                                      Testimonials
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active text-warning fw-bold' : 'text-light'; ?>" href="../contact.php">
                                      Contact US
                                  </a>
                              </li>



                              <!-- User-specific -->
                              <?php if (isset($_SESSION['user_name'])): ?>
                                  <li class="nav-item">
                                      <a class="nav-link text-warning fw-bold" href="../users/dashboard.php">
                                          <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link text-danger fw-semibold" href="code/logout.php">
                                          <i class="fas fa-sign-out-alt me-1"></i> Logout
                                      </a>
                                  </li>
                              <?php else: ?>
                                  <li class="nav-item">
                                      <a class="nav-link  text-light px-3 py-1 ms-2 rounded-pill" href="../admin/dashboard/login.php">
                                          Admin Login
                                      </a>
                                  </li>
                              <?php endif; ?>
                          </ul>

                      </div>
                  </div>
              </nav>