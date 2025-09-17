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

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8" data-aos="fade-up">
                <div class="card bg-dark text-light shadow-lg border-warning rounded-4 p-4">
                    <h5 class="text-warning fw-bold mb-4 text-center">Give Your Feedback</h5>

                    <!-- Single Unified Form -->
                    <form id="ratingForm" action="../code/save_rating.php" method="POST" enctype="multipart/form-data">
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="userName" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control bg-secondary text-light border-warning" id="userName" name="name" placeholder="Your Name" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="userEmail" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control bg-secondary text-light border-warning" id="userEmail" name="email" placeholder="Your Email" required>
                        </div>

                        <!-- Profile Photo -->
                        <div class="mb-3">
                            <label for="userProfile" class="form-label fw-bold">Profile Photo</label>
                            <input type="file" class="form-control bg-secondary text-light border-warning" id="userProfile" name="profile" accept="image/*">
                        </div>

                        <!-- Star Rating -->
                        <div class="mb-3 text-center">
                            <label class="form-label fw-bold d-block">Your Rating</label>
                            <div class="star-rating">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                            </div>
                            <input type="hidden" id="ratingValue" name="rating" required>
                        </div>

                        <!-- Comment -->
                        <div class="mb-3">
                            <label for="ratingComment" class="form-label fw-bold">Your Comments</label>
                            <textarea id="ratingComment" name="comment" class="form-control bg-secondary text-light border-warning rounded-3 py-2 px-3" rows="4" placeholder="Leave your comments here..."></textarea>
                        </div>

                        <!-- Submit -->
                        <button type="submit" id="submitRating" class="btn btn-warning fw-bold w-100 rounded-pill">Submit Rating</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>