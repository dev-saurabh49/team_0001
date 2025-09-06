<script>
function toggleSidebar() {
  document.getElementById('sidebar').classList.toggle('active');
}
// Theme toggle with localStorage
(function(){
  const btn = document.getElementById('themeToggle');
  const body = document.body;
  if (localStorage.getItem('theme')) {
    body.className = localStorage.getItem('theme');
  } else {
    body.className = 'dark-theme';
  }
  if (btn) {
    btn.addEventListener('click', function(){
      body.classList.toggle('light-theme');
      body.classList.toggle('dark-theme');
      localStorage.setItem('theme', body.className);
    });
  }
})();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
