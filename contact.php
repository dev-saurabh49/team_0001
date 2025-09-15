<?php include "./code/header.php" ?>

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
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                <?php if (isset($_SESSION['alert'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['alert']['type']; ?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['alert']['msg']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['alert']); ?>
                <?php endif; ?>

                <form id="contactForm" method="post" action="code/contact_code.php" class="p-4 bg-dark rounded-4 shadow-lg">
                    <div class="mb-3">
                        <label class="form-label text-light">Name</label>
                        <input
                            type="text"
                            name="c_name"
                            class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3 w-100"
                            placeholder="Your Name"
                            required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Email</label>
                        <input
                            type="email"
                            name="c_email"
                            class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3 w-100"
                            placeholder="Your Email"
                            required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Message</label>
                        <textarea
                            class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3 w-100"
                            rows="5"
                            name="c_msg"
                            placeholder="Your Message"
                            required></textarea>
                    </div>

                    <div class="d-grid">
                        <button
                            type="submit"
                            name="c_btn"
                            class="btn btn-warning fw-bold rounded-pill py-2">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">
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

<?php include "./code/footer.php" ?>