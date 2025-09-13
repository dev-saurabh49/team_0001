<!-- NOw listen generate a prompt for designning user_dashboard.php based on admin menus main theme #d4af37 and background: linear-gradient(135deg, #0d1b2a, #1b263b); and focus on generating a premium ui where user can see all things comes from admin using side bar or something else -->

<?php include 'code/header.php'; ?>
<!--Ends here  -->
<!-- modal login -->
<!-- Login Modal -->
<!-- Login Modal -->
<div
  class="modal fade"
  id="loginModal"
  tabindex="-1"
  aria-labelledby="loginModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div
      class="modal-content"
      style="
        background: rgba(13, 27, 42, 0.95);
        border: 2px solid #ffc107;
        border-radius: 20px;
        box-shadow: 0 0 25px rgba(255, 193, 7, 0.3);
        backdrop-filter: blur(12px);
        animation: fadeInUp 0.6s ease;
        color: #fff;
      ">

      <!-- Header -->
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold text-warning" id="loginModalLabel">
          <i class="fas fa-user-shield"></i> Member Login
        </h5>
        <button
          type="button"
          class="btn-close btn-close-white"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form id="loginForm" action="code/login_code.php" method="post" enctype="multipart/form-data">

          <!-- Email -->
          <div class="mb-3">
            <label for="username" class="form-label fw-bold">Email</label>
            <div class="input-group">
              <span class="input-group-text bg-dark border-warning text-warning">
                <i class="fas fa-envelope"></i>
              </span>
              <input
                name="email"
                type="email"
                class="form-control bg-dark text-white border-warning shadow-none"
                id="username"
                placeholder="Enter your Team ID"
                required />
            </div>
            <small id="usernameError" class="text-danger d-none">⚠️ Team ID required</small>
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label fw-bold">Password</label>
            <div class="input-group">
              <span class="input-group-text bg-dark border-warning text-warning">
                <i class="fas fa-lock"></i>
              </span>
              <input
                name="password"
                type="password"
                class="form-control bg-dark text-white border-warning shadow-none"
                id="password"
                placeholder="Enter your password"
                required />
              <span class="input-group-text bg-dark border-warning text-warning" id="togglePassword" style="cursor:pointer;">
                <i class="fas fa-eye"></i>
              </span>
            </div>
            <small id="passwordError" class="text-danger d-none">⚠️ Password must be at least 6 characters</small>
          </div>

          <!-- Remember Me -->
          <div class="form-check mb-3">
            <input
              class="form-check-input border-warning"
              type="checkbox"
              id="remember" />
            <label class="form-check-label" for="remember">Remember me</label>
            <br />
            <small id="checkboxError" class="text-danger d-none">⚠️ Please check this box</small>
          </div>

          <!-- Submit -->
          <button
            name="login_btn"
            type="submit"
            class="btn btn-warning w-100 fw-bold rounded-pill shadow-sm">
            <i class="fas fa-sign-in-alt me-1"></i> Login
          </button>
        </form>
      </div>

      <!-- Footer -->
      <div class="modal-footer border-0 text-center">
        <p class="small text-light m-0">
          Forgot password?
          <a href="#" class="text-warning fw-bold" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" data-bs-dismiss="modal">Click here</a>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Forgot Password Modal -->
<div
  class="modal fade"
  id="forgotPasswordModal"
  tabindex="-1"
  aria-labelledby="forgotPasswordModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div
      class="modal-content"
      style="
        background: rgba(13, 27, 42, 0.95);
        border: 2px solid #ffc107;
        border-radius: 20px;
        box-shadow: 0 0 25px rgba(255, 193, 7, 0.3);
        backdrop-filter: blur(12px);
        animation: fadeInUp 0.6s ease;
        color: #fff;
      ">

      <!-- Header -->
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold text-warning" id="forgotPasswordModalLabel">
          <i class="fas fa-key"></i> Reset Password
        </h5>
        <button
          type="button"
          class="btn-close btn-close-white"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form id="forgotForm" action="code/forgot_password.php" method="post">
          <div class="mb-3">
            <label for="forgotEmail" class="form-label fw-bold">Enter your registered Email</label>
            <div class="input-group">
              <span class="input-group-text bg-dark border-warning text-warning">
                <i class="fas fa-envelope"></i>
              </span>
              <input
                type="email"
                class="form-control bg-dark text-white border-warning shadow-none"
                id="forgotEmail"
                name="forgot_email"
                placeholder="you@example.com"
                required />
            </div>
          </div>
          <button
            type="submit"
            class="btn btn-warning w-100 fw-bold rounded-pill shadow-sm">
            <i class="fas fa-paper-plane me-1"></i> Send Reset Link
          </button>
        </form>
      </div>

      <!-- Footer -->
      <div class="modal-footer border-0 text-center">
        <p class="small text-light m-0">
          Remembered password?
          <a href="#" class="text-warning fw-bold" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login here</a>
        </p>
      </div>
    </div>
  </div>
</div>


<!-- end modal -->

<!-- Hero Section -->
<section
  id="hero"
  class="d-flex align-items-center text-light"
  style="
        margin-top: 60px;
        min-height: 100vh;
        background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%);
      ">
  <div class="container">
    <div
      class="row align-items-center flex-column-reverse flex-lg-row text-center text-lg-start">
      <div class="col-lg-7 mb-4 mb-lg-0 mt-4 mt-lg-5">
        <h1 class="display-5 fw-bold text-warning mb-3">
          Welcome to <span class="text-light">Team 0001</span>
        </h1>
        <p class="lead mb-4 px-2 px-lg-0 mt-3">
          <span class="fw-bold text-warning">
            Strength >> Unity >> Brotherhood
          </span>
          <br />
          <span>
            Team 0001 is not just a group of friends—it’s a family bound by
            trust, discipline, and unity. Every member stands together,
            supporting each other through every challenge.
          </span>
        </p>
        <div class="d-flex flex-column flex-sm-row gap-2 gap-sm-3 align-items-center justify-content-center justify-content-sm-start">
          <?php if (isset($_SESSION['user_email'])): ?>
            <!-- User is logged in -->
            <!-- <button class="btn btn-success fw-bold rounded-pill px-4 py-2 w-100 w-sm-auto mb-2 mb-sm-0" disabled>
              <i class="fas fa-user"></i> Hello, <?php echo $_SESSION['user_name']; ?>
            </button> -->
            <a href="./users/test/dsh.php" target="_blank" class="btn btn-outline-success fw-bold px-4 py-2 rounded-pill w-100 w-sm-auto mb-2 mb-sm-0">
              <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="code/logout.php" class="btn btn-danger fw-bold px-4 py-2 rounded-pill w-100 w-sm-auto">
              <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
          <?php else: ?>
            <!-- User is not logged in -->
            <button type="button" class="btn btn-warning fw-bold rounded-pill px-4 py-2 w-100 w-sm-auto mb-2 mb-sm-0"
              data-bs-toggle="modal" data-bs-target="#loginModal">
              <i class="fas fa-user-lock"></i> Login
            </button>
            <button type="button" class="btn btn-outline-warning fw-bold px-4 py-2 rounded-pill w-100 w-sm-auto"
              data-bs-toggle="modal" data-bs-target="#registerModal">
              <i class="fas fa-user-plus me-2"></i> Register
            </button>
          <?php endif; ?>
        </div>
        <!-- Register Modal -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark text-light rounded-4">
              <div class="modal-header border-0">
                <h5 class="modal-title fw-bold text-warning" id="registerModalLabel">
                  <i class="fas fa-user-plus me-2"></i> Register
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <form id="registerForm" action="./code/register_code.php" method="post" enctype="multipart/form-data">
                  <!-- Full Name -->
                  <div class="mb-3">
                    <label class="form-label text-light">Full Name</label>
                    <input
                      name="name"
                      type="text"
                      class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3"
                      placeholder="Your Name"
                      required />
                  </div>

                  <!-- Email -->
                  <div class="mb-3">
                    <label class="form-label text-light">Email</label>
                    <input
                      name="email"
                      type="email"
                      class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3"
                      placeholder="Your Email"
                      required />
                  </div>

                  <!-- Phone -->
                  <div class="mb-3">
                    <label class="form-label text-light">Phone</label>
                    <input
                      name="phone"
                      type="text"
                      class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3"
                      placeholder="Phone Number"
                      required />
                  </div>

                  <!-- Password -->
                  <div class="mb-3">
                    <label class="form-label text-light">Password</label>
                    <input
                      name="password"
                      type="password"
                      class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3"
                      placeholder="Password"
                      required />
                  </div>

                  <!-- Profile Picture -->
                  <div class="mb-3">
                    <label class="form-label text-light">Profile Picture</label>
                    <div class="position-relative">
                      <input
                        name="profile"
                        type="file"
                        class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3"
                        accept="image/*"
                        required />
                      <i class="fas fa-camera position-absolute text-warning" style="top: 50%; right: 15px; transform: translateY(-50%); pointer-events: none;"></i>
                    </div>
                    <small class="text-light">Choose a profile picture (JPG, PNG, max 2MB)</small>
                  </div>

                  <!-- Submit -->
                  <div class="d-grid">
                    <button
                      name="register_btn"
                      type="submit"
                      class="btn btn-warning fw-bold rounded-pill py-2">
                      Submit
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


      </div>

      <!-- Swiper Carousel -->
      <div class="col-lg-5 mb-4 mb-lg-0 d-flex justify-content-center align-items-center">
        <div class="swiper mySwiper"
          style="width: 100%; max-width: 300px; height: 300px;">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide d-flex justify-content-center align-items-center">
              <img
                src="./images/0001.jpeg"
                alt="Team 0001"
                class="rounded-circle shadow-lg"
                style="width: 100%; height: 100%; object-fit: cover; background: transparent;" />
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide d-flex justify-content-center align-items-center">
              <img
                src="https://plus.unsplash.com/premium_photo-1726403421924-eeb265f8c57a?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHRlYW0lMjAwMDAxfGVufDB8fDB8fHww"
                alt="Team 0002"
                class="rounded-circle shadow-lg"
                style="width: 100%; height: 100%; object-fit: cover; background: transparent;" />
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide d-flex justify-content-center align-items-center">
              <img
                src="images/0001.jpeg"
                alt="Team 0003"
                class="rounded-circle shadow-lg"
                style="width: 100%; height: 100%; object-fit: cover; background: transparent;" />
            </div>
            <div class="swiper-slide d-flex justify-content-center align-items-center">
              <img
                src="https://plus.unsplash.com/premium_photo-1726403421924-eeb265f8c57a?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHRlYW0lMjAwMDAxfGVufDB8fDB8fHww"
                alt="Team 0003"
                class="rounded-circle shadow-lg"
                style="width: 100%; height: 100%; object-fit: cover; background: transparent;" />
            </div>
            <div class="swiper-slide d-flex justify-content-center align-items-center">
              <img
                src="images/0001.jpeg"
                alt="Team 0003"
                class="rounded-circle shadow-lg"
                style="width: 100%; height: 100%; object-fit: cover; background: transparent;" />
            </div>
          </div>


        </div>
      </div>


    </div>
  </div>
</section>

<!-- About Section -->
<section
  id="about"
  class="py-5"
  style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%); color: #fff;">
  <div class="container">
    <div class="row align-items-center">
      <!-- Swiper Images -->
      <div class="col-lg-5 mb-4 mb-lg-0 d-flex justify-content-center align-items-center">
        <div class="swiper mySwiper" style="width: 100%; max-width: 300px;">
          <div class="swiper-wrapper">
            <div class="swiper-slide d-flex justify-content-center align-items-center">
              <img src="./images/0001.jpeg" alt="Team Member 1" class="rounded-circle shadow-lg" style="width: 100%; height: auto; object-fit: cover;">
            </div>
            <div class="swiper-slide d-flex justify-content-center align-items-center">
              <img src="https://plus.unsplash.com/premium_photo-1726403421924-eeb265f8c57a?w=600" alt="Team Member 2" class="rounded-circle shadow-lg" style="width: 100%; height: auto; object-fit: cover;">
            </div>
            <div class="swiper-slide d-flex justify-content-center align-items-center">
              <img src="./images/0001.jpeg" alt="Team Member 3" class="rounded-circle shadow-lg" style="width: 100%; height: auto; object-fit: cover;">
            </div>
          </div>
        </div>
      </div>

      <!-- Text & Icons -->
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="fw-bold text-warning mb-3" data-aos="fade-right">
          About <span class="text-light gallery_span">Us</span>
        </h1>
        <p class="mb-4 text-light px-2 px-lg-0" data-aos="fade-up">
          <span class="fw-bold text-warning mb-3">Discipline >> Respect >> Loyalty</span><br>
          Where brotherhood meets loyalty and trust. We rise together, stronger with every challenge.
        </p>

        <div class="row text-center g-4 mt-4">
          <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="50">
            <div class="icon-box p-4 rounded shadow-lg h-100">
              <i class="fas fa-handshake fa-3x text-warning mb-3"></i>
              <h6 class="fw-bold">Brotherhood</h6>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box p-4 rounded shadow-lg h-100">
              <i class="fas fa-heart fa-3x text-warning mb-3"></i>
              <h6 class="fw-bold">Loyalty</h6>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="150">
            <div class="icon-box p-4 rounded shadow-lg h-100">
              <i class="fas fa-hands-praying fa-3x text-warning mb-3"></i>
              <h6 class="fw-bold">Respect</h6>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box p-4 rounded shadow-lg h-100">
              <i class="fas fa-fire fa-3x text-warning mb-3"></i>
              <h6 class="fw-bold">Discipline</h6>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="250">
            <div class="icon-box p-4 rounded shadow-lg h-100">
              <i class="fas fa-dumbbell fa-3x text-warning mb-3"></i>
              <h6 class="fw-bold">Strength</h6>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box p-4 rounded shadow-lg h-100">
              <i class="fas fa-bolt fa-3x text-warning mb-3"></i>
              <h6 class="fw-bold">Unity</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Swiper JS Init -->
  <script>
    const swiper = new Swiper(".mySwiper", {
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false
      },
      slidesPerView: 1,
      spaceBetween: 20,
      centeredSlides: true,
      breakpoints: {
        576: {
          slidesPerView: 2
        },
        768: {
          slidesPerView: 2
        },
        992: {
          slidesPerView: 3
        }
      }
    });
  </script>
</section>





<section
  id="founders"
  class="py-5"
  style="
        background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%);
        color: #fff;
      ">
  <div class="container text-center">
    <h2 class="fw-bold text-warning mb-4" data-aos="fade-down">
      Meet Our <span class="gallery_span text-light">Founders</span>
    </h2>
    <p class="mb-5 text-light px-2 px-lg-5" data-aos="fade-up" data-aos-delay="100">
      Team 0001 की नींव कुछ खास लोगों ने रखी है। उनका vision, brotherhood और
      dedication ही आज हमें यहां तक लाया है।
    </p>

    <div class="row g-4">
      <!-- Founder 1 -->
      <div class="col-12 col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="card founder-card h-100 shadow-lg border-0 text-center p-4">
          <img
            src="images/rishabh_1.jpg"
            alt="Founder 1"
            class="rounded-circle mx-auto mb-3 shadow-lg border border-3 border-warning"
            style="width: 130px; height: 130px; object-fit: cover" />
          <h5 class="fw-bold text-warning">
            <a
              href="https://rishabhshukla9580.netlify.app/"
              class="text-light gallery_span text-decoration-none">Rishabh </a>Shukla
          </h5>
          <p class="text-light small">Founder & Leader</p>
          <blockquote class="fst-italic text-light small">
            "Discipline and Unity is our real strength."
          </blockquote>
        </div>
      </div>

      <!-- Founder 2 -->


      <!-- Founder 3 -->
      <div class="col-12 col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
        <div class="card founder-card h-100 shadow-lg border-0 text-center p-4">
          <img
            src="images/rishabh_1.jpg"
            alt="Founder 3"
            class="rounded-circle mx-auto mb-3 shadow-lg border border-3 border-warning"
            style="width: 130px; height: 130px; object-fit: cover" />
          <h5 class="fw-bold text-warning">
            <a
              href="https://rishabhshukla9580.netlify.app/"
              class="text-light gallery_span text-decoration-none">Rishabh </a>Shukla
          </h5>
          <p class="text-light small">Founder & Leader</p>
          <blockquote class="fst-italic text-light small">
            "Discipline and Unity is our real strength."
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Bootstrap Modal for Lightbox -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark border-0">
      <div class="modal-body p-0">
        <img
          src=""
          id="modalImage"
          class="img-fluid w-100"
          alt="Gallery Image" />
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <button
          type="button"
          class="btn btn-warning fw-bold rounded-pill"
          data-bs-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>


<section id="top-members" class="py-5" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%); color: #fff;">
  <div class="container">
    <!-- Section Title -->
    <div class="row mb-5 text-center">
      <div class="col">
        <h2 class="display-5 fw-bold text-warning mb-3">
          Our <span class="text-light gallery_span">Top Members</span>
        </h2>
        <p class="lead text-light px-2 px-lg-5">
          Meet the dedicated members who make Team 0001 special.
        </p>
      </div>
    </div>

    <!-- Desktop Grid -->
    <div class="row d-none d-lg-flex g-4 justify-content-center">
      <div class="col-12 col-md-4">
        <div class="card member-card h-100 text-center p-4" data-aos="fade-up">
          <img src="images/member1.jpg" class="rounded-circle mx-auto mb-3 shadow-lg border border-3 border-warning" style="width:120px;height:120px;object-fit:cover;" />
          <h5 class="fw-bold text-warning">Rishabh Shukla</h5>
          <p class="text-light small">Lead Strategist</p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card member-card h-100 text-center p-4" data-aos="fade-up" data-aos-delay="100">
          <img src="images/member2.jpg" class="rounded-circle mx-auto mb-3 shadow-lg border border-3 border-warning" style="width:120px;height:120px;object-fit:cover;" />
          <h5 class="fw-bold text-warning">Saurabh Pandey</h5>
          <p class="text-light small">Co-Organizer</p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card member-card h-100 text-center p-4" data-aos="fade-up" data-aos-delay="200">
          <img src="images/member3.jpg" class="rounded-circle mx-auto mb-3 shadow-lg border border-3 border-warning" style="width:120px;height:120px;object-fit:cover;" />
          <h5 class="fw-bold text-warning">Ananya Sharma</h5>
          <p class="text-light small">Event Coordinator</p>
        </div>
      </div>
    </div>

    <!-- Mobile Slider -->
    <div class="splide d-lg-none" id="topMembersSplide">
      <div class="splide__track">
        <ul class="splide__list">
          <!-- Slide 1 -->
          <li class="splide__slide">
            <div class="card member-card h-100 text-center p-4">
              <img src="images/member1.jpg" class="rounded-circle mx-auto mb-3 shadow-lg border border-3 border-warning" style="width:120px;height:120px;object-fit:cover;" />
              <h5 class="fw-bold text-warning">Rishabh Shukla</h5>
              <p class="text-light small">Lead Strategist</p>
            </div>
          </li>
          <!-- Slide 2 -->
          <li class="splide__slide">
            <div class="card member-card h-100 text-center p-4">
              <img src="images/member2.jpg" class="rounded-circle mx-auto mb-3 shadow-lg border border-3 border-warning" style="width:120px;height:120px;object-fit:cover;" />
              <h5 class="fw-bold text-warning">Saurabh Pandey</h5>
              <p class="text-light small">Co-Organizer</p>
            </div>
          </li>
          <!-- Slide 3 -->
          <li class="splide__slide">
            <div class="card member-card h-100 text-center p-4">
              <img src="images/member3.jpg" class="rounded-circle mx-auto mb-3 shadow-lg border border-3 border-warning" style="width:120px;height:120px;object-fit:cover;" />
              <h5 class="fw-bold text-warning">Ananya Sharma</h5>
              <p class="text-light small">Event Coordinator</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>


<!-- Hover Animation -->
<style>
  .member-card {
    background: rgba(17, 17, 17, 0.85);
    border-radius: 20px;
    transition: all 0.4s ease;
    backdrop-filter: blur(10px);
    border: none;
  }

  .member-card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 10px 30px rgba(255, 193, 7, 0.45);
  }

  .member-card img {
    transition: all 0.4s ease;
  }

  .member-card:hover img {
    transform: scale(1.1);
    border-color: #ffcc00;
  }

  .gallery_span {
    position: relative;
    display: inline-block;
  }

  .gallery_span::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -5px;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, #ffcc00, #ff9900);
    border-radius: 5px;
    animation: underline 2s infinite alternate;
  }

  @keyframes underline {
    from {
      transform: scaleX(0);
    }

    to {
      transform: scaleX(1);
    }
  }
</style>

<!-- end-top -->



<!-- Callback Modal -->
<div
  class="modal fade"
  id="callbackModal"
  tabindex="-1"
  aria-labelledby="callbackModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light rounded-4 shadow-lg">
      <div class="modal-header border-0">
        <h5
          class="modal-title text-warning fw-bold"
          id="callbackModalLabel">
          Request a Call Back
        </h5>
        <button
          type="button"
          class="btn-close btn-close-white"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="callbackForm">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input
              type="text"
              class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3"
              placeholder="Your Name"
              required />
          </div>
          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input
              type="tel"
              class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3"
              placeholder="Your Phone Number"
              required />
          </div>
          <div class="d-grid">
            <button
              type="submit"
              class="btn btn-warning fw-bold rounded-pill py-2">
              <i class="fas fa-paper-plane me-2"></i> Submit
            </button>
          </div>
        </form>
        <div
          id="callbackSuccess"
          class="alert alert-success mt-3 d-none"
          role="alert">
          ✅ Your request has been submitted!
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Testimonials Section -->
<section id="testimonials" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%); padding:80px 0;" class="text-light">
  <div class="container">
    <!-- Section Title -->
    <div class="row mb-5 text-center">
      <div class="col">
        <h2 class="display-5 fw-bold text-warning mb-3">
          What People Say <span class="text-light gallery_span">About Us</span>
        </h2>
        <p class="lead text-light px-2 px-lg-5">
          Feedback from our community and partners who trust Team 0001.
        </p>
      </div>
    </div>

    <!-- Testimonials Carousel -->
    <div class="splide" id="testimonialsSplide">
      <div class="splide__track">
        <ul class="splide__list">

          <!-- Testimonial 1 -->
          <li class="splide__slide">
            <div class="testimonial-card p-4 shadow-lg border-0" data-aos="fade-up">
              <div class="text-center">
                <img src="images/member1.jpg" class="rounded-circle mb-3 shadow-lg border border-3 border-warning" style="width:80px;height:80px;object-fit:cover;">
                <p class="text-light fst-italic">
                  "Team 0001 is the most dedicated and organized team I have worked with. Their discipline and unity are unmatched!"
                </p>
                <h6 class="fw-bold text-warning mb-0">Rishabh Sharma</h6>
                <small class="text-light">Community Partner</small>
              </div>
            </div>
          </li>

          <!-- Testimonial 2 -->
          <li class="splide__slide">
            <div class="testimonial-card p-4 shadow-lg border-0" data-aos="fade-up" data-aos-delay="100">
              <div class="text-center">
                <img src="images/member2.jpg" class="rounded-circle mb-3 shadow-lg border border-3 border-warning" style="width:80px;height:80px;object-fit:cover;">
                <p class="text-light fst-italic">
                  "Amazing team with a strong vision. Their events always leave a positive impact on the community."
                </p>
                <h6 class="fw-bold text-warning mb-0">Saurabh Pandey</h6>
                <small class="text-light">Event Attendee</small>
              </div>
            </div>
          </li>

          <!-- Testimonial 3 -->
          <li class="splide__slide">
            <div class="testimonial-card p-4 shadow-lg border-0" data-aos="fade-up" data-aos-delay="200">
              <div class="text-center">
                <img src="images/member3.jpg" class="rounded-circle mb-3 shadow-lg border border-3 border-warning" style="width:80px;height:80px;object-fit:cover;">
                <p class="text-light fst-italic">
                  "Joining Team 0001 was the best decision! The team spirit is incredible and they inspire everyone around them."
                </p>
                <h6 class="fw-bold text-warning mb-0">Ananya Sharma</h6>
                <small class="text-light">Team Member</small>
              </div>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Premium Styling -->
<style>
  .testimonial-card {
    background: rgba(17, 17, 17, 0.85);
    border-radius: 20px;
    transition: all 0.4s ease;
    backdrop-filter: blur(10px);
  }

  .testimonial-card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 10px 25px rgba(255, 193, 7, 0.4);
  }

  .testimonial-card img {
    transition: all 0.4s ease;
  }

  .testimonial-card:hover img {
    transform: scale(1.1);
    border-color: #ffcc00;
  }

  #testimonials .splide__pagination__page {
    background: #fff !important;
    opacity: 0.5;
  }

  #testimonials .splide__pagination__page.is-active {
    background: #ffcc00 !important;
    transform: scale(1.3);
    opacity: 1;
  }
</style>

<!-- fun facyts -->
<!-- Stats / Fun Facts Section -->
<section id="stats" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%); padding:80px 0;" class="text-light">
  <div class="container">
    <div class="row mb-5 text-center">
      <div class="col cus-card">
        <h2 class="display-5 fw-bold text-warning mb-3">
          Our <span class="text-light gallery_span">Impact</span>
        </h2>
        <p class="lead text-light px-2 px-lg-5">
          Some numbers that tell our story and showcase the dedication of Team 0001.
        </p>
      </div>
    </div>

    <div class="row text-center g-4">
      <!-- Stat 1 -->
      <div class="col-6 col-md-3" data-aos="fade-up">
        <div class="p-4 rounded-4 shadow-lg bg-dark">
          <i class="fas fa-users fa-3x text-warning mb-2"></i>
          <h3 class="fw-bold text-warning counter" data-target="50">0</h3>
          <p class="mb-0 text-light small">Active Members</p>
        </div>
      </div>

      <!-- Stat 2 -->
      <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
        <div class="p-4 rounded-4 shadow-lg bg-dark">
          <i class="fas fa-trophy fa-3x text-warning mb-2"></i>
          <h3 class="fw-bold text-warning counter" data-target="10">0</h3>
          <p class="mb-0 text-light small">Awards Won</p>
        </div>
      </div>

      <!-- Stat 3 -->
      <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
        <div class="p-4 rounded-4 shadow-lg bg-dark">
          <i class="fas fa-handshake fa-3x text-warning mb-2"></i>
          <h3 class="fw-bold text-warning counter" data-target="25">0</h3>
          <p class="mb-0 text-light small">Events Organized</p>
        </div>
      </div>

      <!-- Stat 4 -->
      <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
        <div class="p-4 rounded-4 shadow-lg bg-dark">
          <i class="fas fa-globe-americas fa-3x text-warning mb-2"></i>
          <h3 class="fw-bold text-warning counter" data-target="5">0</h3>
          <p class="mb-0 text-light small">Community Projects</p>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- Events Section -->
<section id="events" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%); padding:80px 0;" class="text-light">
  <div class="container">
    <div class="row mb-5 text-center">
      <div class="col">
        <h2 class="display-5 fw-bold text-warning mb-3" data-aos="fade-down">
          Upcoming <span class="text-light gallery_span">Events</span>
        </h2>
        <p class="lead text-light px-2 px-lg-5" data-aos="fade-up" data-aos-delay="100">
          Join us in our upcoming events and activities. Stay engaged and be part of Team 0001’s journey.
        </p>
      </div>
    </div>

    <div class="row g-4 justify-content-center">
      <!-- Event Card 1 -->
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="card bg-dark shadow-lg rounded-4 text-center p-4 h-100">
          <i class="fas fa-calendar-alt fa-3x text-warning mb-3"></i>
          <h5 class="fw-bold text-warning mb-2">Team Meetup</h5>
          <p class="text-light mb-1">Date: 25th Sep 2025</p>
          <p class="text-light mb-3">Venue: Community Hall, City Center</p>
          <a href="#" class="btn btn-outline-warning rounded-pill px-4 py-2">Join Event</a>
        </div>
      </div>

      <!-- Event Card 2 -->
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="card bg-dark shadow-lg rounded-4 text-center p-4 h-100">
          <i class="fas fa-lightbulb fa-3x text-warning mb-3"></i>
          <h5 class="fw-bold text-warning mb-2">Workshop on Team Strategy</h5>
          <p class="text-light mb-1">Date: 5th Oct 2025</p>
          <p class="text-light mb-3">Venue: Online Zoom Session</p>
          <a href="#" class="btn btn-outline-warning rounded-pill px-4 py-2">Register</a>
        </div>
      </div>

      <!-- Event Card 3 -->
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
        <div class="card bg-dark shadow-lg rounded-4 text-center p-4 h-100">
          <i class="fas fa-trophy fa-3x text-warning mb-3"></i>
          <h5 class="fw-bold text-warning mb-2">Annual Awards Night</h5>
          <p class="text-light mb-1">Date: 20th Dec 2025</p>
          <p class="text-light mb-3">Venue: Grand Banquet Hall</p>
          <a href="#" class="btn btn-outline-warning rounded-pill px-4 py-2">RSVP</a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- FAQ Section -->
<section id="faq" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%); padding:80px 0;" class="text-light">
  <div class="container">
    <div class="row mb-5 text-center">
      <div class="col">
        <h2 class="display-5 fw-bold text-warning mb-3">
          Frequently Asked <span class="text-light gallery_span">Questions</span>
        </h2>
        <p class="lead text-light px-2 px-lg-5">
          Answers to some common questions about Team 0001, our mission, and joining process.
        </p>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="accordion" id="faqAccordion">
          <!-- FAQ 1 -->
          <div class="accordion-item mb-3 bg-dark rounded-4 shadow-lg border-0" data-aos="fade-up">
            <h2 class="accordion-header" id="faqHeading1">
              <button class="accordion-button bg-dark text-warning fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                How can I join Team 0001?
              </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-light">
                You can join by contacting us through the contact form or WhatsApp. We welcome individuals who share our values of unity, discipline, and brotherhood.
              </div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="accordion-item mb-3 bg-dark rounded-4 shadow-lg border-0" data-aos="fade-up" data-aos-delay="100">
            <h2 class="accordion-header" id="faqHeading2">
              <button class="accordion-button bg-dark text-warning fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                What kind of activities does the team organize?
              </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-light">
                Team 0001 organizes community service projects, team-building events, workshops, and social gatherings to strengthen unity and give back to the community.
              </div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="accordion-item mb-3 bg-dark rounded-4 shadow-lg border-0" data-aos="fade-up" data-aos-delay="200">
            <h2 class="accordion-header" id="faqHeading3">
              <button class="accordion-button bg-dark text-warning fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                Are there any membership fees?
              </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-light">
                No, there are no fees to join Team 0001. Participation is voluntary, and we encourage commitment and active engagement rather than monetary contributions.
              </div>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="accordion-item mb-3 bg-dark rounded-4 shadow-lg border-0" data-aos="fade-up" data-aos-delay="300">
            <h2 class="accordion-header" id="faqHeading4">
              <button class="accordion-button bg-dark text-warning fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                How can I stay updated on team activities?
              </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-light">
                You can stay updated by following our social media profiles, subscribing to our newsletter, and joining our WhatsApp group for announcements and updates.
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>


<section
  id="contact"
  style="
        min-height: 80vh;
        background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%);
        padding: 80px 0;
      "
  class="text-light">
  <div class="container">
    <!-- Section Header -->
    <div class="row mb-5 text-center">
      <div class="col">
        <h2 class="display-5 fw-bold text-warning mb-2">
          Contact <span class="text-light gallery_span">Us</span>
        </h2>
        <p class="lead text-light">
          Have questions or want to connect? Send us a message or reach out
          via phone, WhatsApp, or social media.
        </p>
      </div>
    </div>

    <!-- Contact Form + Info -->
    <div
      class="row justify-content-center align-items-start flex-column-reverse flex-lg-row">
      <!-- Contact Form -->
      <div class="col-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
        <form id="contactForm" class="p-4 bg-dark rounded-4 shadow-lg">
          <div class="mb-3">
            <label class="form-label text-light">Name</label>
            <input
              type="text"
              class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3 w-100"
              placeholder="Your Name"
              required />
          </div>

          <div class="mb-3">
            <label class="form-label text-light">Email</label>
            <input
              type="email"
              class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3 w-100"
              placeholder="Your Email"
              required />
          </div>

          <div class="mb-3">
            <label class="form-label text-light">Message</label>
            <textarea
              class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3 w-100"
              rows="5"
              placeholder="Your Message"
              required></textarea>
          </div>

          <div class="d-grid">
            <button
              type="submit"
              class="btn btn-warning fw-bold rounded-pill py-2">
              Send Message
            </button>
          </div>
        </form>
      </div>

      <!-- Contact Info -->
      <div class="col-12 col-lg-6 mb-4 mb-lg-0 " data-aos="fade-up">
        <div class="get-in-touch p-4 bg-dark rounded-4 shadow-lg h-100">
          <h5 class="text-warning fw-bold mb-4 text-center text-lg-start">
            Get in Touch
          </h5>
          <p class="mb-3 text-center text-lg-start">
            <i class="fas fa-phone-alt me-2"></i> +91 9580526988
          </p>
          <p class="mb-3 text-center text-lg-start">
            <i class="fab fa-whatsapp me-2"></i>
            <a
              href="https://chat.whatsapp.com/GJ48c1MP4Zj4MXmHiEWsub"
              class="text-light text-decoration-none">Chat on WhatsApp</a>
          </p>
          <p class="mb-3 text-center text-lg-start">
            <i class="fas fa-envelope me-2"></i>
            <a
              href="mailto:rishabhshukla43558@gmail.com"
              class="text-light text-decoration-none">rishabhshukla43558@gmail.com</a>
          </p>

          <h6
            class="text-warning fw-bold mt-4 mb-3 text-center text-lg-start">
            Follow Us
          </h6>
          <div class="text-center text-lg-start">
            <a href="#" class="text-light fs-5 me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-light fs-5 me-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-light fs-5 me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-light fs-5"><i class="fab fa-linkedin-in"></i></a>
          </div>

          <div class="text-center mt-4">
            <button
              class="btn-callback-floating"
              data-bs-toggle="modal"
              data-bs-target="#callbackModal"
              title="Request Call Back">
              <i class="fas fa-phone-alt me-2"></i> Request Call Back
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Rate Us Section -->
<section id="rate-us" class="text-light" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%); padding:80px 0;">
  <div class="container">
    <div class="row mb-5 text-center">
      <div class="col">
        <h2 class="display-5 fw-bold text-warning mb-3">
          Rate <span class="text-light gallery_span">Us</span>
        </h2>
        <p class="lead text-light px-2 px-lg-5">
          Your feedback helps Team 0001 grow stronger. Share your thoughts and rate your experience with us.
        </p>
      </div>
    </div>

    <div class="row g-4 justify-content-center align-items-start">
      <!-- Left Side: User Info Form -->
      <div class="col-12 col-md-6" data-aos="fade-up">
        <div class="card bg-dark text-light shadow-lg border-warning rounded-4 p-4">
          <h5 class="text-warning fw-bold mb-4 text-center">Your Details</h5>
          <form id="userForm" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="userName" class="form-label fw-bold">Name</label>
              <input type="text" class="form-control bg-secondary text-light border-warning" id="userName" placeholder="Your Name" required>
            </div>
            <div class="mb-3">
              <label for="userEmail" class="form-label fw-bold">Email</label>
              <input type="email" class="form-control bg-secondary text-light border-warning" id="userEmail" placeholder="Your Email" required>
            </div>
            <div class="mb-3">
              <label for="userProfile" class="form-label fw-bold">Profile Photo</label>
              <input type="file" class="form-control bg-secondary text-light border-warning" id="userProfile" accept="image/*">
            </div>
          </form>
        </div>
      </div>

      <!-- Right Side: Stars & Comment -->
      <div class="col-12 col-md-6" data-aos="fade-up">
        <div class="card bg-dark text-light shadow-lg border-warning rounded-4 p-4">
          <h5 class="text-warning fw-bold mb-4 text-center">Your Rating</h5>
          <div class="star-rating mb-3 text-center">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
          </div>
          <textarea id="ratingComment" class="form-control bg-secondary text-light border-warning rounded-3 py-2 px-3 mb-3" rows="4" placeholder="Leave your comments here..."></textarea>
          <button id="submitRating" class="btn btn-warning fw-bold w-100 rounded-pill">Submit Rating</button>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Footer -->
<!-- Footer Section -->

<button id="scrollTopBtn" title="Go to top">
  <i class="fas fa-chevron-up"></i>
</button>
<!-- WhatsApp Floating Button -->
<a
  href="https://chat.whatsapp.com/GJ48c1MP4Zj4MXmHiEWsub"
  target="_blank"
  class="btn-whatsapp"
  title="Chat on WhatsApp">
  <i class="fab fa-whatsapp"></i>
</a>

<?php include 'code/footer.php'; ?>