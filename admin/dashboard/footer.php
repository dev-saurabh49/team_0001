 </div>
 <!-- Scripts (Bootstrap, Chart.js, etc.)-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.3/dist/chart.umd.min.js"></script>
 <script>
     // Mobile sidebar toggle open/close
     const mobileMenuBtn = document.getElementById('mobileMenuBtn');
     const sidebar = document.getElementById('sidebar');
     const sidebarCloseBtn = document.getElementById('sidebarCloseBtn');

     mobileMenuBtn.addEventListener('click', () => {
         sidebar.classList.toggle('open');
     });

     sidebarCloseBtn.addEventListener('click', () => {
         sidebar.classList.remove('open');
     });

     // Optional: Close sidebar clicking outside on mobile
     document.addEventListener('click', (e) => {
         if (
             sidebar.classList.contains('open') &&
             !sidebar.contains(e.target) &&
             !mobileMenuBtn.contains(e.target)
         ) {
             sidebar.classList.remove('open');
         }
     });

     // Dark/Light Mode Toggle
     let modeToggle = document.getElementById('modeToggle');
     modeToggle.onclick = function() {
         let html = document.documentElement;
         let current = html.getAttribute('data-bs-theme');
         html.setAttribute('data-bs-theme', current === 'dark' ? 'light' : 'dark');
         modeToggle.innerHTML =
             current === 'dark' ? '<i class="bi bi-moon"></i>' : '<i class="bi bi-sun"></i>';
     };

     // Chart.js Example: Task Progress
     const ctx = document.getElementById('tasksChart').getContext('2d');
     new Chart(ctx, {
         type: 'line',
         data: {
             labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
             datasets: [{
                 label: 'Tasks Completed',
                 data: [2, 5, 7, 8, 6, 9, 12],
                 borderColor: '#2563eb',
                 backgroundColor: 'rgba(37,99,235,0.13)',
                 tension: 0.35,
                 pointRadius: 4,
                 pointBackgroundColor: '#2563eb',
                 fill: true,
             }, ],
         },
         options: {
             responsive: true,
             plugins: {
                 legend: {
                     display: false,
                 },
                 tooltip: {
                     enabled: true,
                 },
             },
             scales: {
                 y: {
                     beginAtZero: true,
                     grid: {
                         color: '#eee',
                     },
                 },
                 x: {
                     grid: {
                         display: false,
                     },
                 },
             },
         },
     });
 </script>
 </body>

 </html>