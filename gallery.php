<title>Team-0001 | Gallery</title>
<?php include './code/header.php'; ?>
<?php include './code/db_connection.php'; ?>

<section id="gallery" class="py-5 mt-5" style="background: linear-gradient(135deg,#0d1b2a,#1b263b);">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-down">
      <h2 class="fw-bold text-warning display-5">Our <span class="text-light gallery_span">Gallery</span></h2>
      <p class="text-light">Some beautiful memories & moments captured</p>
    </div>

    <!-- Gallery Filter Buttons -->
    <div class="text-center mb-4">
      <div class="d-flex flex-wrap justify-content-center gap-2">
        <button class="btn btn-warning filter-btn active" data-filter="all">All</button>
        <?php
        // Fetch unique categories from DB
        $catQuery = $conn->query("SELECT DISTINCT category FROM gallery");
        while ($cat = $catQuery->fetch_assoc()) {
          echo '<button class="btn btn-outline-light filter-btn" data-filter="' . htmlspecialchars($cat['category']) . '">'
            . ucfirst($cat['category']) . '</button>';
        }
        ?>
      </div>
    </div>

    <!-- Masonry Gallery -->
    <div class="row g-4" id="galleryGrid" data-aos="fade-up" data-aos-delay="100">
      <?php
      $result = $conn->query("SELECT * FROM gallery ORDER BY id DESC");
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()):
      ?>
          <div class="col-lg-4 col-md-6 gallery-item" data-category="<?= htmlspecialchars($row['category']) ?>">
            <div class="position-relative overflow-hidden rounded shadow-lg">
              <img src="./admin/dashboard/<?=htmlspecialchars($row['image']) ?>" class="w-100 h-100 object-fit-cover" alt="<?= htmlspecialchars($row['title']) ?>">
              <div class="gallery-overlay d-flex align-items-center justify-content-center">
                <h5 class="text-warning fw-bold"><?= htmlspecialchars($row['title']) ?></h5>
              </div>
            </div>
          </div>
      <?php
        endwhile;
      } else {
        echo "<p class='text-light text-center'>No gallery items available yet.</p>";
      }
      ?>
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

<script>
  // Lightbox
document.querySelectorAll('.gallery-item img').forEach(img => {
  img.addEventListener('click', () => {
    document.getElementById('lightboxImage').src = img.src;
    new bootstrap.Modal(document.getElementById('lightboxModal')).show();
  });
});

// Category Filter
const filterBtns = document.querySelectorAll('.filter-btn');
const items = document.querySelectorAll('.gallery-item');

filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    filterBtns.forEach(b => b.classList.remove('active', 'btn-warning'));
    filterBtns.forEach(b => b.classList.add('btn-outline-light'));

    btn.classList.add('active', 'btn-warning');
    btn.classList.remove('btn-outline-light');

    const category = btn.getAttribute('data-filter');
    items.forEach(item => {
      if (category === 'all' || item.getAttribute('data-category') === category) {
        item.style.display = 'block';
        item.classList.add('animate__animated','animate__fadeIn');
      } else {
        item.style.display = 'none';
      }
    });
  });
});

</script>