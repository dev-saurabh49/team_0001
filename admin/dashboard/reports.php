<?php
include "../../code/db_connection.php";
include "header.php";

// Fetch total members count
$totalMembersResult = $conn->query("SELECT COUNT(*) as total FROM members");
$totalMembers = (int)($totalMembersResult->fetch_assoc()['total'] ?? 0);

// Fetch total tasks count
$totalTaskResult = $conn->query("SELECT COUNT(*) as total FROM tasks");
$totalTask = (int)($totalTaskResult->fetch_assoc()['total'] ?? 0);

// Fetch active members count
$activeMembersResult = $conn->query("SELECT COUNT(*) as total FROM members WHERE LOWER(status) = 'active'");
$activeMembers = (int)($activeMembersResult->fetch_assoc()['total'] ?? 0);

// Fetch blocked members count
$blockedMembersResult = $conn->query("SELECT COUNT(*) as total FROM members WHERE is_blocked = 1");
$blockedMembers = (int)($blockedMembersResult->fetch_assoc()['total'] ?? 0);

// Calculate inactive members count
$inactiveMembers = $totalMembers - $activeMembers;

// Fetch recent 5 member activities
$activitiesQuery = "
    SELECT ma.*, m.name, m.email
    FROM member_activity ma
    JOIN members m ON ma.member_id = m.id
    ORDER BY ma.activity_time DESC
    LIMIT 5
";
$activitiesResult = $conn->query($activitiesQuery);

// Aggregate activity types for chart
$activityTypes = [];
while ($row = $activitiesResult->fetch_assoc()) {
    $type = strtolower($row['activity_type']);
    if (!isset($activityTypes[$type])) {
        $activityTypes[$type] = 0;
    }
    $activityTypes[$type]++;
}

?>

<!-- Include Bootstrap CSS and Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container py-5">
    <h2 class="mb-4">Admin Dashboard Report</h2>

    <!-- Summary Cards -->
    <div class="row g-4 mb-5">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center text-center">
                    <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-people-fill fs-3 me-3"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold"><?= $totalMembers ?></h5>
                        <small class="text-muted">Total Members</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center text-center">
                    <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-check-fill fs-3 me-3"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold"><?= $activeMembers ?></h5>
                        <small class="text-muted">Active Members</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center text-center">
                    <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-x-fill fs-3 me-3"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold"><?= $inactiveMembers ?></h5>
                        <small class="text-muted">Inactive Members</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center text-center">
                    <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-slash fs-3 me-3"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold"><?= $blockedMembers ?></h5>
                        <small class="text-muted">Blocked Members</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center text-center">
                    <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-list-task fs-3 me-3"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold"><?= $totalTask ?></h5>
                        <small class="text-muted">Total Tasks</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm p-3 rounded">
                <h5 class="mb-3">Members Status Distribution</h5>
                <canvas id="memberStatusChart" height="250"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm p-3 rounded">
                <h5 class="mb-3">Blocked vs Other Members</h5>
                <canvas id="blockedMembersChart" height="250"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm p-3 rounded mt-4 mt-md-0">
                <h5 class="mb-3">Total Tasks</h5>
                <canvas id="totalTasksChart" height="250"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm p-3 rounded mt-4 mt-md-0">
                <h5 class="mb-3">Recent Member Activities</h5>
                <canvas id="recentActivitiesChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
// Data from PHP to JS
const totalMembers = <?= $totalMembers ?>;
const activeMembers = <?= $activeMembers ?>;
const inactiveMembers = <?= $inactiveMembers ?>;
const blockedMembers = <?= $blockedMembers ?>;
const totalTasks = <?= $totalTask ?>;

const recentActivities = <?= json_encode($activityTypes); ?>;

// Members Status Chart
const memberStatusCtx = document.getElementById('memberStatusChart').getContext('2d');
const memberStatusChart = new Chart(memberStatusCtx, {
    type: 'doughnut',
    data: {
        labels: ['Active', 'Inactive'],
        datasets: [{
            data: [activeMembers, inactiveMembers],
            backgroundColor: ['#198754', '#dc3545'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {legend: {position: 'bottom'}},
        cutout: '70%'
    }
});

// Blocked Members Chart
const blockedMembersCtx = document.getElementById('blockedMembersChart').getContext('2d');
const blockedMembersChart = new Chart(blockedMembersCtx, {
    type: 'doughnut',
    data: {
        labels: ['Blocked', 'Others'],
        datasets: [{
            data: [blockedMembers, totalMembers - blockedMembers],
            backgroundColor: ['#dc3545', '#0d6efd'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {legend: {position: 'bottom'}},
        cutout: '70%'
    }
});

// Total Tasks Chart (Single number display as bar)
const totalTasksCtx = document.getElementById('totalTasksChart').getContext('2d');
const totalTasksChart = new Chart(totalTasksCtx, {
    type: 'bar',
    data: {
        labels: ['Total Tasks'],
        datasets: [{
            label: 'Tasks',
            data: [totalTasks],
            backgroundColor: ['#0d6efd']
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {beginAtZero: true}
        },
        plugins: {legend: {display: false}}
    }
});

// Recent Member Activities Chart (bar)
const recentActivitiesCtx = document.getElementById('recentActivitiesChart').getContext('2d');
const recentActivitiesChart = new Chart(recentActivitiesCtx, {
    type: 'bar',
    data: {
        labels: Object.keys(recentActivities).map(label => label.charAt(0).toUpperCase() + label.slice(1)),
        datasets: [{
            label: 'Activities',
            data: Object.values(recentActivities),
            backgroundColor: '#198754'
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {beginAtZero: true}
        },
        plugins: {legend: {display: false}}
    }
});
</script>

<?php include "footer.php"; ?>
