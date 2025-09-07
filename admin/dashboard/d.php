<?php
session_start();
// ✅ Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../dashboard/login.php");
    exit();
}

include "../../code/db_connection.php"; // ✅ DB connection

// ✅ Fetch the 10 most recent activities
$activityQuery = "
    SELECT ma.*, m.name, m.email
    FROM member_activity ma
    LEFT JOIN members m ON ma.member_id = m.id
    ORDER BY ma.activity_time DESC
    LIMIT 10
";

$result = $conn->query($activityQuery);

if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM member_activity WHERE id = $delete_id");
    header("Location: ./d.php"); // refresh page
    exit();
}
?>

<?php include './header.php'; ?>
<!-- MAIN GRID -->
<main class="container-fluid pt-4">
    <!-- Stats Cards -->
    <div class="row g-3 g-md-4 mb-4">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center">
                    <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold">12</h5>
                        <small class="text-muted">Teams</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center">
                    <span class="bg-success bg-opacity-10 text-success rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-check"></i>
                    </span>
                    <div>
                        <?php
                        $activeMembersQuery = "SELECT COUNT(*) AS active_count FROM members WHERE status = 'active'";
                        $activeMembersResult = $conn->query($activeMembersQuery);
                        $activeMembers = 0;

                        if ($activeMembersResult && $row = $activeMembersResult->fetch_assoc()) {
                            $activeMembers = $row['active_count'];
                        }
                        ?>
                        <h5 class="mb-0 fw-bold"><?php echo $activeMembers; ?></h5>
                        <small class="text-muted">Active Members</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center">
                    <span class="bg-warning bg-opacity-10 text-warning rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-clock-history"></i>
                    </span>
                    <div>
                        <?php
                        $activityMembersQuery = "SELECT COUNT(*) AS activity_count FROM member_activity ";
                        $activityMembersResult = $conn->query($activityMembersQuery);
                        $activityMembers = 0;

                        if ($activityMembersResult && $row = $activityMembersResult->fetch_assoc()) {
                            $activityMembers = $row['activity_count'];
                        }
                        ?>
                        <h5 class="mb-0 fw-bold"><?php echo $activityMembers; ?></h5>
                        <small class="text-muted">Recent Activities</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center">
                    <span class="bg-success bg-opacity-10 text-success rounded-circle p-3 me-3 fs-4 d-flex align-items-center justify-content-center">
                        <i class="bi bi-check-circle"></i>
                    </span>
                    <div>
                        <h5 class="mb-0 fw-bold">126</h5>
                        <small class="text-muted">Completed</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <!-- <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <i class="bi bi-bell"></i> Recent Activities
        </div>
        <div class="card-body" style="max-height: 300px; overflow: hidden; position: relative;">
            <div class="recent-activity-marquee">
                <ul class="list-group list-group-flush">
                   
                        <?php
                        if ($result && $result->num_rows > 0):
                            while ($row = $result->fetch_assoc()): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <?php
                                    // Assign icon based on activity type
                                    $icon = '';
                                    switch ($row['activity_type']) {
                                        case 'register':
                                            $icon = '<i class="bi bi-person-plus-fill text-success me-1"></i>';
                                            break;
                                        case 'login':
                                            $icon = '<i class="bi bi-box-arrow-in-right text-primary me-1"></i>';
                                            break;
                                        case 'logout':
                                            $icon = '<i class="bi bi-box-arrow-right text-secondary me-1"></i>';
                                            break;
                                        case 'approved':
                                            $icon = '<i class="bi bi-check-circle-fill text-success me-1"></i>';
                                            break;
                                        case 'blocked':
                                            $icon = '<i class="bi bi-lock-fill text-danger me-1"></i>';
                                            break;
                                        case 'unblocked':
                                            $icon = '<i class="bi bi-unlock-fill text-warning me-1"></i>';
                                            break;
                                        default:
                                            $icon = '<i class="bi bi-info-circle-fill me-1"></i>';
                                            break;
                                    }
                                    echo $icon;
                                    ?>

                                    <strong><?php echo htmlspecialchars($row['name'] ?? 'Unknown'); ?></strong>
                                    (<?php echo htmlspecialchars($row['email'] ?? 'N/A'); ?>)
                                    <?php
                                    switch ($row['activity_type']) {
                                        case 'register':
                                            echo ' registered';
                                            break;
                                        case 'login':
                                            echo ' logged in';
                                            break;
                                        case 'logout':
                                            echo ' logged out';
                                            break;
                                        case 'approved':
                                            echo ' was approved';
                                            break;
                                        case 'blocked':
                                            echo ' was blocked';
                                            break;
                                        case 'unblocked':
                                            echo ' was unblocked';
                                            break;
                                    }
                                    ?>
                                </div>
                                <small class="text-muted">
                                    <?php echo date("d M Y H:i", strtotime($row['activity_time'])); ?>
                                </small>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li class="list-group-item text-center text-muted">No recent activity.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div> -->

    <?php


    // ✅ Fetch activities
    $activityQuery = "
    SELECT ma.*, m.name, m.email
FROM member_activity ma
LEFT JOIN members m ON ma.member_id = m.id
ORDER BY ma.activity_time DESC
LIMIT 10;

";
    $result = $conn->query($activityQuery);
    ?>

    <div class="card mb-4 mt-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <span><i class="bi bi-bell"></i> Recent Activities</span>
            <span class="badge bg-light text-dark"><?php echo $result->num_rows ?? 0; ?> records</span>
        </div>
        <div class="card-body" style="max-height: 400px; overflow-y: auto;">
            <marquee behavior="" direction="up" height="300px" onmouseenter="this.stop()" onmouseleave="this.start()">
                <ul class="list-group list-group-flush">
                    <?php if ($result && $result->num_rows > 0):
                        $sn = 1;
                    ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-secondary me-2"><?php echo $sn++; ?></span>
                                    <?php
                                    // Activity icons

                                    switch (strtolower($row['activity_type'])) {
                                        case 'register':
                                            $icon = '<i class="bi bi-person-plus-fill text-success me-1"></i>';
                                            break;
                                        case 'login':
                                            $icon = '<i class="bi bi-box-arrow-in-right text-primary me-1"></i>';
                                            break;
                                        case 'logout':
                                            $icon = '<i class="bi bi-box-arrow-right text-secondary me-1"></i>';
                                            break;
                                        case 'approved':
                                            $icon = '<i class="bi bi-check-circle-fill text-success me-1"></i>';
                                            break;
                                        case 'blocked':
                                            $icon = '<i class="bi bi-lock-fill text-danger me-1"></i>';
                                            break;
                                        case 'unblocked':
                                            $icon = '<i class="bi bi-unlock-fill text-warning me-1"></i>';
                                            break;
                                        default:
                                            $icon = '<i class="bi bi-info-circle-fill me-1"></i>';
                                            break;
                                    }
                                    echo $icon;
                                    ?>

                                    <strong><?php echo htmlspecialchars($row['name'] ?? 'Unknown'); ?></strong>
                                    (<?php echo htmlspecialchars($row['email'] ?? 'N/A'); ?>)
                                    <?php echo htmlspecialchars($row['activity_type']); ?>
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <small class="text-muted">
                                        <?php echo date("d M Y H:i", strtotime($row['activity_time'])); ?>
                                    </small>
                                    <!-- Delete Button -->
                                    <a href="?delete_id=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete this activity?');"
                                        class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li class="list-group-item text-center text-muted">No recent activity.</li>
                    <?php endif; ?>
                </ul>
            </marquee>
        </div>
    </div>


    <!-- CSS for scrolling effect -->
    <style>
        .recent-activity-marquee {
            display: block;
            animation: scroll-activities 15s linear infinite;
        }

        .recent-activity-marquee:hover {
            animation-play-state: paused;
            /* Pause on hover */
        }

        @keyframes scroll-activities {
            0% {
                transform: translateY(100%);
            }

            100% {
                transform: translateY(-100%);
            }
        }

        .list-group-item {
            border: none;
        }
    </style>
</main>

<?php include './footer.php'; ?>