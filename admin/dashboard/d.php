<?php include './header.php'; ?>
<?php
include "../../code/db_connection.php"; // Make sure $conn is your mysqli connection

// Fetch the 10 most recent activities
$activityQuery = "
    SELECT ma.*, m.name, m.email
    FROM member_activity ma
    JOIN members m ON ma.member_id = m.id
    ORDER BY ma.activity_time DESC
    LIMIT 10
";

$result = $conn->query($activityQuery);
?>
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
                        <h5 class="mb-0 fw-bold">38</h5>
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
                        <h5 class="mb-0 fw-bold">7</h5>
                        <small class="text-muted">Pending Tasks</small>
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
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <i class="bi bi-bell"></i> Recent Activities
        </div>
        <div class="card-body" style="max-height: 300px; overflow: hidden; position: relative;">
            <div class="recent-activity-marquee">
                <ul class="list-group list-group-flush">
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
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

                                    <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                                    (<?php echo htmlspecialchars($row['email']); ?>)
                                    <?php
                                    switch ($row['activity_type']) {
                                        case 'register':
                                            echo 'registered';
                                            break;
                                        case 'login':
                                            echo 'logged in';
                                            break;
                                        case 'logout':
                                            echo 'logged out';
                                            break;
                                        case 'approved':
                                            echo 'was approved';
                                            break;
                                        case 'blocked':
                                            echo 'was blocked';
                                            break;
                                        case 'unblocked':
                                            echo 'was unblocked';
                                            break;
                                    }
                                    ?>
                                </div>
                                <small class="text-muted"><?php echo date("d M Y H:i", strtotime($row['activity_time'])); ?></small>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li class="list-group-item text-center text-muted">No recent activity.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- CSS for scrolling effect -->
    <style>
        .recent-activity-marquee {
            display: block;
            animation: scroll-activities 15s linear infinite;
        }
        .recent-activity-marquee:hover {
    animation-play-state: paused; /* Pause on hover */
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

<?php include './footer.php' ?>