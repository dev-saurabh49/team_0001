<footer
  style="
        background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%);
        padding: 60px 0;
        color: #f8f9fa;
      ">
  <div class="container">
    <div class="row align-items-center mb-4">
      <!-- Logo / Name -->
      <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
        <h3 class="fw-bold text-warning">Team 0001</h3>
        <p class="mb-0 small">Brotherhood • Loyalty • Respect</p>
      </div>

      <!-- Quick Links -->
      <!-- Quick Links -->
      <div class="col-md-4 text-center mb-3 mb-md-0">
        <h6 class="text-warning fw-bold mb-2">Quick Links</h6>
        <ul class="list-unstyled">
          <li><a href="#hero" class="text-light text-decoration-none">Home</a></li>
          <li><a href="#about" class="text-light text-decoration-none">About</a></li>
          <li><a href="#gallery" class="text-light text-decoration-none">Gallery</a></li>
          <li><a href="#contact" class="text-light text-decoration-none">Contact</a></li>
          <?php if (!isset($_SESSION['admin_name'])): ?>
            <li class="nav-item"><a class="nav-link active text-light" href="../admin/dashboard/login.php">Admin Login</a></li>
          <?php endif; ?>
        </ul>
      </div>


      <!-- Social Media -->
      <div class="col-md-4 text-center text-md-end">
        <h6 class="text-warning fw-bold mb-2">Follow Us</h6>
        <a href="#" class="text-light fs-5 me-3"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-light fs-5 me-3"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-light fs-5 me-3"><i class="fab fa-instagram"></i></a>
        <a href="#" class="text-light fs-5"><i class="fab fa-linkedin-in"></i></a>

      </div>
    </div>

    <!-- Divider -->
    <hr style="border-color: #ffc10733" />

    <!-- Copyright -->
    <div class="row">
      <div class="col text-center">
        <p class="mb-0 small">
          &copy; <span id="currentYear"></span> Made with 🤍 by
          <a
            href="https://www.linkedin.com/in/saurabh-pandey-179695296"
            class="text-decoration-none text-warning">Us</a>
          😎. All rights reserved.
        </p>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  const togglePassword = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("password");
  togglePassword.addEventListener("click", function () {
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    this.querySelector("i").classList.toggle("fa-eye-slash");
  });
</script>

<script>
  const swiper = new Swiper(".mySwiper", {
    loop: true,
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    speed: 800,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  new Splide('#topMembersSplide', {
    type       : 'loop',
    perPage    : 1,
    focus      : 'center',
    autoplay   : true,
    interval   : 2500,
    pauseOnHover: false,
    arrows     : false,   // remove arrows
    pagination : false,   // remove dots
    padding    : '15%',
    gap        : '1rem',
    breakpoints: {
      576: { perPage: 1.1, padding: '5%', gap: '0.5rem' },
    },
  }).mount();
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  new Splide('#testimonialsSplide', {
    type       : 'loop',
    perPage    : 1,
    focus      : 'center',
    autoplay   : true,
    interval   : 3500,
    pauseOnHover: true,
    arrows     : false, // no arrows
    pagination : false, // no dots
    gap        : '1rem',
    padding    : '10%',
    breakpoints: {
      576: { perPage: 1.1, padding: '5%' }
    },
  }).mount();
});
</script>
<script>
// Counter animation
const counters = document.querySelectorAll('.counter');
counters.forEach(counter => {
  const updateCount = () => {
    const target = +counter.getAttribute('data-target');
    const count = +counter.innerText;
    const speed = 50; // lower = faster
    const increment = target / speed;

    if (count < target) {
      counter.innerText = Math.ceil(count + increment);
      setTimeout(updateCount, 30);
    } else {
      counter.innerText = target;
    }
  };

  // Trigger when visible (simple approach with IntersectionObserver)
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        updateCount();
        observer.unobserve(counter);
      }
    });
  }, { threshold: 0.5 });

  observer.observe(counter);
});
</script>

<script>
const stars = document.querySelectorAll('.star-rating .star');
let selectedRating = 0;

stars.forEach(star => {
  star.addEventListener('mouseover', () => {
    stars.forEach(s => s.classList.remove('hover'));
    for (let i = 0; i < star.dataset.value; i++) {
      stars[i].classList.add('hover');
    }
  });

  star.addEventListener('mouseout', () => {
    stars.forEach(s => s.classList.remove('hover'));
  });

  star.addEventListener('click', () => {
    selectedRating = star.dataset.value;
    stars.forEach(s => s.classList.remove('selected'));
    for (let i = 0; i < selectedRating; i++) {
      stars[i].classList.add('selected');
    }
  });
});

// Handle submit
document.getElementById('submitRating').addEventListener('click', () => {
  const comment = document.getElementById('ratingComment').value.trim();
  if (selectedRating === 0) {
    alert("Please select a star rating!");
    return;
  }

});
</script>



<!-- aos -->
 <script src="https://cdn.jsdelivr.net/npm/aos@3.0.0-beta.6/dist/aos.js"></script>
<script>
AOS.init({
  duration: 1000,
  easing: 'ease-in-out',
  once: true,
  offset: 50, // smaller offset triggers animation sooner
});


</script>

<script src="./script.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>