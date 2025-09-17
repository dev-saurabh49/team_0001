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
<!--Ends here  -->
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
<!-- Forgot Password Modal End-->



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
                <h1 class="display-5 fw-bold text-warning mb-3" data-aos="fade-right">
                    Welcome to <span class="text-light gallery_span">Team 0001</span>
                </h1>
                <p class="lead mb-4 px-2 px-lg-0 mt-3" data-aos="fade-up">
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
                <div class="d-flex flex-column flex-sm-row gap-2 gap-sm-3 align-items-center justify-content-center justify-content-sm-start" data-aos="zoom-in" data-aos-delay="200">
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

                <!-- otp modal  -->
                <!-- OTP Modal -->
                <div class="modal fade" id="otpModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark text-light rounded-4">
                            <div class="modal-header border-0">
                                <h5 class="modal-title text-warning fw-bold">Verify OTP</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form id="otpForm">
                                    <div class="mb-3">
                                        <label class="form-label">Enter OTP</label>
                                        <input type="text" name="otp" class="form-control bg-secondary text-light border-0" required>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-warning fw-bold rounded-pill">Verify</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end otp modal -->


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
<!-- Hero Section End-->