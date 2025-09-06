// Login form validation



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


document.getElementById("profilePic").addEventListener("change", function() {
  const fileName = this.files[0] ? this.files[0].name : "No file chosen";
  document.getElementById("fileName").textContent = fileName;
});
