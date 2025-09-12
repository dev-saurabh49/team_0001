<title>Team-0001 | Gallery</title>
<?php include './code/header.php'; ?>

<!-- Gallery Hero Section -->

<!-- Gallery Section -->
<section id="gallery" class="py-5 mt-5" style="background: linear-gradient(135deg,#0d1b2a,#1b263b);">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-down">
      <h2 class="fw-bold text-warning display-5">Our <span class="text-light gallery_span">Gallery</span></h2>
      <p class="text-light">Some beautiful memories & moments captured</p>
    </div>

    <!-- Masonry Gallery -->
    <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item position-relative overflow-hidden rounded shadow-lg" data-aos="zoom-in">
          <img src="images/gallery1.jpg" class="w-100 h-100 object-fit-cover" alt="Gallery Image">
          <div class="gallery-overlay d-flex align-items-center justify-content-center">
            <h5 class="text-warning fw-bold">Brotherhood</h5>
          </div>
        </div>
      </div>

      <div class="col-lg-8 col-md-6">
        <div class="gallery-item position-relative overflow-hidden rounded shadow-lg" data-aos="zoom-in" data-aos-delay="150">
          <img src="images/gallery2.jpg" class="w-100 h-100 object-fit-cover" alt="Gallery Image">
          <div class="gallery-overlay d-flex align-items-center justify-content-center">
            <h5 class="text-warning fw-bold">Events</h5>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6">
        <div class="gallery-item position-relative overflow-hidden rounded shadow-lg" data-aos="zoom-in" data-aos-delay="200">
          <img src="images/gallery3.jpg" class="w-100 h-100 object-fit-cover" alt="Gallery Image">
          <div class="gallery-overlay d-flex align-items-center justify-content-center">
            <h5 class="text-warning fw-bold">Celebrations</h5>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6">
        <div class="gallery-item position-relative overflow-hidden rounded shadow-lg" data-aos="zoom-in" data-aos-delay="250">
          <img src="images/gallery4.jpg" class="w-100 h-100 object-fit-cover" alt="Gallery Image">
          <div class="gallery-overlay d-flex align-items-center justify-content-center">
            <h5 class="text-warning fw-bold">Team Bonding</h5>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="gallery-item position-relative overflow-hidden rounded shadow-lg" data-aos="zoom-in" data-aos-delay="300">
          <img src="images/gallery5.jpg" class="w-100 h-100 object-fit-cover" alt="Gallery Image">
          <div class="gallery-overlay d-flex align-items-center justify-content-center">
            <h5 class="text-warning fw-bold">Memorable Journeys</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Lightbox Modal -->
<div class="modal fade" id="lightboxModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark border-0">
      <div class="modal-body p-0">
        <img src="" id="lightboxImage" class="img-fluid rounded-3" alt="Expanded">
      </div>
    </div>
  </div>
</div>

<?php include './code/footer.php'; ?>

<!-- Gallery CSS -->
<style>
  .gallery-item {
    height: 100%;
    min-height: 250px;
    cursor: pointer;
    transition: transform 0.4s ease;
  }
  .gallery-item img {
    transition: transform 0.5s ease;
  }
  .gallery-item:hover img {
    transform: scale(1.1);
  }
  .gallery-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.6);
    opacity: 0;
    transition: opacity 0.4s ease;
  }
  .gallery-item:hover .gallery-overlay {
    opacity: 1;
  }
</style>
<style>
  .gallery-item img {
    transition: transform .4s ease, filter .4s ease;
    cursor: pointer;
  }
  .gallery-item:hover img {
    transform: scale(1.08);
    filter: brightness(80%);
  }
</style>

<!-- Gallery JS -->
<script>
  document.querySelectorAll('.gallery-item img').forEach(img => {
    img.addEventListener('click', () => {
      document.getElementById('lightboxImage').src = img.src;
      new bootstrap.Modal(document.getElementById('lightboxModal')).show();
    });
  });
</script>
