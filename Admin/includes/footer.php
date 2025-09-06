<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("active");
    }

        // Sidebar toggle
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("active");
        }

    // Theme toggle
    const themeToggle = document.getElementById("themeToggle");
    const body = document.body;

    // Load saved theme
    if (localStorage.getItem("theme")) {
        body.className = localStorage.getItem("theme");
        updateThemeButton();
    } else {
        body.className = "dark-theme"; // default
    }

    themeToggle.addEventListener("click", () => {
        body.classList.toggle("light-theme");
        body.classList.toggle("dark-theme");

        // Save preference
        localStorage.setItem("theme", body.className);

        updateThemeButton();
    });

    function updateThemeButton() {
        if (body.classList.contains("light-theme")) {
            themeToggle.innerHTML = '<i class="fa fa-sun"></i> Light';
        } else {
            themeToggle.innerHTML = '<i class="fa fa-moon"></i> Dark';
        }
    }


</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>