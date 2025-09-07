<?php
include "../../code/db_connection.php";
include "header.php";

// Fetch counts for members
$totalMembersResult = $conn->query("SELECT COUNT(*) as total FROM members");
$totalMembers = (int)($totalMembersResult->fetch_assoc()['total'] ?? 0);

$activeMembersResult = $conn->query("SELECT COUNT(*) as total FROM members WHERE LOWER(status) = 'active'");
$activeMembers = (int)($activeMembersResult->fetch_assoc()['total'] ?? 0);

$blockedMembersResult = $conn->query("SELECT COUNT(*) as total FROM members WHERE is_blocked = 1");
$blockedMembers = (int)($blockedMembersResult->fetch_assoc()['total'] ?? 0);

$inactiveMembers = $totalMembers - $activeMembers;

// Fetch total tasks
$totalTaskResult = $conn->query("SELECT COUNT(*) as total FROM tasks");
$totalTask = (int)($totalTaskResult->fetch_assoc()['total'] ?? 0);

// Fetch complaints counts
$totalComplaintsResult = $conn->query("SELECT COUNT(*) as total FROM complaints");
$totalComplaints = (int)($totalComplaintsResult->fetch_assoc()['total'] ?? 0);

$pendingComplaintsResult = $conn->query("SELECT COUNT(*) as total FROM complaints WHERE status = 'Pending'");
$pendingComplaints = (int)($pendingComplaintsResult->fetch_assoc()['total'] ?? 0);

$resolvedComplaintsResult = $conn->query("SELECT COUNT(*) as total FROM complaints WHERE status = 'Resolved'");
$resolvedComplaints = (int)($resolvedComplaintsResult->fetch_assoc()['total'] ?? 0);

// Fetch total meetings
$totalMeetingsResult = $conn->query("SELECT COUNT(*) as total FROM meetings");
$totalMeetings = (int)($totalMeetingsResult->fetch_assoc()['total'] ?? 0);

// Fetch recent activities for chart
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

<!-- Bootstrap & Icons CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    canvas {
        max-width: 290px;
        max-height: 280px;
        width: 100% !important;
        height: auto !important;
    }
</style>

<div class="container py-5">
    <h2 class="mb-4">Admin Dashboard Report</h2>

    <!-- Summary Cards -->
    <div class="row g-4 mb-5">
        <!-- Members -->
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

        <!-- Tasks -->
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

        <!-- Complaints -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center text-center">
                    <span class="bg-danger bg-opacity-10 text-danger rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-exclamation-circle"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold"><?= $totalComplaints ?></h5>
                        <small class="text-muted">Total Complaints</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center text-center">
                    <span class="bg-warning bg-opacity-10 text-warning rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-hourglass-split"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold"><?= $pendingComplaints ?></h5>
                        <small class="text-muted">Pending Complaints</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center text-center">
                    <span class="bg-success bg-opacity-10 text-success rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-check-circle"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold"><?= $resolvedComplaints ?></h5>
                        <small class="text-muted">Resolved Complaints</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Meetings -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center text-center">
                    <span class="bg-info bg-opacity-10 text-info rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-calendar-event"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold"><?= $totalMeetings ?></h5>
                        <small class="text-muted">Total Meetings</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row g-4">
        <!-- Member Status -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3 rounded">
                <h5 class="mb-3">Members Status Distribution</h5>
                <canvas id="memberStatusChart" height="250"></canvas>
            </div>
        </div>

        <!-- Blocked Members -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3 rounded">
                <h5 class="mb-3">Blocked vs Other Members</h5>
                <canvas id="blockedMembersChart" height="250"></canvas>
            </div>
        </div>

        <!-- Total Tasks -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3 rounded mt-4 mt-md-0">
                <h5 class="mb-3">Total Tasks</h5>
                <canvas id="totalTasksChart" height="250"></canvas>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3 rounded mt-4 mt-md-0">
                <h5 class="mb-3">Recent Member Activities</h5>
                <canvas id="recentActivitiesChart" height="250"></canvas>
            </div>
        </div>

        <!-- Complaints Status -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3 rounded mt-4 mt-md-0">
                <h5 class="mb-3">Complaints Status</h5>
                <canvas id="complaintsStatusChart" height="250"></canvas>
            </div>
        </div>

        <!-- Meetings Overview -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3 rounded mt-4 mt-md-0">
                <h5 class="mb-3">Meetings Overview</h5>
                <canvas id="meetingsChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>


<script>
    const totalMembers = <?= $totalMembers ?>;
    const activeMembers = <?= $activeMembers ?>;
    const inactiveMembers = <?= $inactiveMembers ?>;
    const blockedMembers = <?= $blockedMembers ?>;
    const totalTasks = <?= $totalTask ?>;

    const totalComplaints = <?= $totalComplaints ?>;
    const pendingComplaints = <?= $pendingComplaints ?>;
    const resolvedComplaints = <?= $resolvedComplaints ?>;
    const totalMeetings = <?= $totalMeetings ?>;

    const recentActivities = <?= json_encode($activityTypes); ?>;

    // Member Status Chart
    const memberStatusCtx = document.getElementById('memberStatusChart').getContext('2d');
    new Chart(memberStatusCtx, {
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
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            cutout: '70%'
        }
    });

    // Blocked Members Chart
    const blockedMembersCtx = document.getElementById('blockedMembersChart').getContext('2d');
    new Chart(blockedMembersCtx, {
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
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            cutout: '70%'
        }
    });

    // Total Tasks Chart
    const totalTasksCtx = document.getElementById('totalTasksChart').getContext('2d');
    new Chart(totalTasksCtx, {
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
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Recent Activities Chart
    const recentActivitiesCtx = document.getElementById('recentActivitiesChart').getContext('2d');
    new Chart(recentActivitiesCtx, {
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
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Complaints Status Chart
    const complaintsStatusCtx = document.getElementById('complaintsStatusChart').getContext('2d');
    new Chart(complaintsStatusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Resolved'],
            datasets: [{
                data: [pendingComplaints, resolvedComplaints],
                backgroundColor: ['#ffc107', '#198754']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            cutout: '70%'
        }
    });

    // Meetings Chart
    const meetingsCtx = document.getElementById('meetingsChart').getContext('2d');
    new Chart(meetingsCtx, {
        type: 'bar',
        data: {
            labels: ['Total Meetings'],
            datasets: [{
                label: 'Count',
                data: [totalMeetings],
                backgroundColor: ['#0dcaf0']
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

<?php include "footer.php"; ?>