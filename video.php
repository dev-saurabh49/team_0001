<?php include("./code/header.php"); ?>

<section class="py-5" style="background: linear-gradient(135deg,#0d1b2a,#1b263b); min-height:100vh;">
  <div class="container mt-5">
    <!-- Section Header -->
    <div class="text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold text-warning display-5">Our <span class="text-light gallery_span">Videos</span></h2>
      <p class="text-light">Watch our team highlights, memories, and special moments.</p>
    </div>

    <!-- Video Grid -->
    <div class="row g-4">
      <!-- Video 1 -->
      <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="card bg-dark shadow-lg border-0 h-100">
          <video controls class="rounded-top w-100" style="max-height:220px; object-fit:cover;">
            <source src="videos/video1.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <div class="card-body">
            <h6 class="fw-bold text-warning">Team Introduction</h6>
            <p class="text-light small mb-0">Get to know who we are and what we stand for.</p>
          </div>
        </div>
      </div>

      <!-- Video 2 -->
      <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="card bg-dark shadow-lg border-0 h-100">
          <video controls class="rounded-top w-100" style="max-height:220px; object-fit:cover;">
            <source src="videos/video2.mp4" type="video/mp4">
          </video>
          <div class="card-body">
            <h6 class="fw-bold text-warning">Annual Meetup</h6>
            <p class="text-light small mb-0">Highlights from our last annual meetup.</p>
          </div>
        </div>
      </div>

      <!-- Video 3 -->
      <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="card bg-dark shadow-lg border-0 h-100">
          <video controls class="rounded-top w-100" style="max-height:220px; object-fit:cover;">
            <source src="videos/video3.mp4" type="video/mp4">
          </video>
          <div class="card-body">
            <h6 class="fw-bold text-warning">Fun Activities</h6>
            <p class="text-light small mb-0">Some fun and candid moments with the team.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("./code/footer.php"); ?>
