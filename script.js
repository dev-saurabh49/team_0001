// Login form validation
document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault();

  let isValid = true;

  // Team ID validation
  const username = document.getElementById("username").value.trim();
  const usernameError = document.getElementById("usernameError");
  if (username === "") {
    usernameError.classList.remove("d-none");
    isValid = false;
  } else {
    usernameError.classList.add("d-none");
  }

  // Password validation
  const password = document.getElementById("password").value.trim();
  const passwordError = document.getElementById("passwordError");
  if (password.length < 6) {
    passwordError.classList.remove("d-none");
    isValid = false;
  } else {
    passwordError.classList.add("d-none");
  }

  // Checkbox validation
  const remember = document.getElementById("remember");
  const checkboxError = document.getElementById("checkboxError");
  if (!remember.checked) {
    checkboxError.classList.remove("d-none");
    isValid = false;
  } else {
    checkboxError.classList.add("d-none");
  }

  // Final check
  if (isValid) {
    alert("✅ Login Successful (Demo)");

    // Reset form and errors
    this.reset();
    usernameError.classList.add("d-none");
    passwordError.classList.add("d-none");
    checkboxError.classList.add("d-none");

    // Close modal
    const loginModal = bootstrap.Modal.getInstance(document.getElementById("loginModal"));
    if (loginModal) loginModal.hide();
  }
});

// Gallery modal listener (outside login form)
var galleryModal = document.getElementById("galleryModal");
galleryModal.addEventListener("show.bs.modal", function (event) {
  var button = event.relatedTarget;
  var imageSrc = button.getAttribute("data-bs-image");
  var modalImage = galleryModal.querySelector("#modalImage");
  modalImage.src = imageSrc;
});
document.getElementById("currentYear").textContent = new Date().getFullYear();


document.getElementById('callbackForm').addEventListener('submit', function(e) {
  e.preventDefault();

  // Show success message
  document.getElementById('callbackSuccess').classList.remove('d-none');

  // Reset form after 2 seconds
  setTimeout(() => {
    this.reset();
    document.getElementById('callbackSuccess').classList.add('d-none');
    // Close modal
    var modal = bootstrap.Modal.getInstance(document.getElementById('callbackModal'));
    modal.hide();
  }, 2000);
});

// Get the button
let scrollTopBtn = document.getElementById("scrollTopBtn");

// Show button when user scrolls down 100px
window.onscroll = function() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    scrollTopBtn.style.opacity = "1";
    scrollTopBtn.style.pointerEvents = "auto";
  } else {
    scrollTopBtn.style.opacity = "0";
    scrollTopBtn.style.pointerEvents = "none";
  }
};

// Scroll to top on click
scrollTopBtn.addEventListener("click", function() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});


