

<?php include 'code/header.php'; ?>


<?php include "components/Hero.php";?>
<?php include "components/About.php";?>
<?php include "./founders.php" ?>
<?php include "./top_members.php"; ?>
<?php include "components/FunFacts.php"; ?>
<?php include "components/Events.php"; ?>
<?php include "components/Blog.php"; ?>
<?php include "components/Testimonials.php"; ?>
<?php include "components/Faq.php"; ?>
<div
  class="modal fade"
  id="callbackModal"
  tabindex="-1"
  aria-labelledby="callbackModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light rounded-4 shadow-lg">
      <div class="modal-header border-0">
        <h5 class="modal-title text-warning fw-bold" id="callbackModalLabel">
          Request a Call Back
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="callbackForm">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3" placeholder="Your Name" required />
          </div>
          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="tel" name="phone" class="form-control bg-secondary text-light border-0 rounded-3 py-2 px-3" placeholder="Your Phone Number" required />
          </div>
          <div class="d-grid">
            <button type="submit" name="call_btn" class="btn btn-warning fw-bold rounded-pill py-2">
              <i class="fas fa-paper-plane me-2"></i> Submit
            </button>
          </div>
        </form>

        <!-- Success / Error message -->
        <div id="callbackMessage" class="alert mt-3 d-none" role="alert"></div>
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById('callbackForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent page reload

    let formData = new FormData(this);
    let messageDiv = document.getElementById('callbackMessage');

    fetch('code/callback.php', {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        messageDiv.classList.remove('d-none', 'alert-success', 'alert-danger', 'alert-warning');
        if (data.status === 'success') {
          messageDiv.classList.add('alert', 'alert-success');
          this.reset(); // reset form
        } else {
          messageDiv.classList.add('alert', 'alert-warning');
        }
        messageDiv.innerHTML = data.message;
      })
      .catch(err => {
        messageDiv.classList.remove('d-none');
        messageDiv.classList.add('alert', 'alert-danger');
        messageDiv.innerHTML = 'Something went wrong. Please try again.';
        console.error(err);
      });
  });
</script>

<?php include "components/Contact.php"; ?>
<?php include "components/Rating.php"; ?>


<button id="scrollTopBtn" title="Go to top">
  <i class="fas fa-chevron-up"></i>
</button>



<a
  href="https://chat.whatsapp.com/GJ48c1MP4Zj4MXmHiEWsub"
  target="_blank"
  class="btn-whatsapp"
  title="Chat on WhatsApp">
  <i class="fab fa-whatsapp"></i>
</a>
<?php include 'code/footer.php'; ?>