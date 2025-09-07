<?php
include "../../code/db_connection.php"; // Database connection
include "header.php";

// Query latest 10 activities with member info
$activityQuery = "
    SELECT ma.*, m.name, m.email
    FROM member_activity ma
    JOIN members m ON ma.member_id = m.id
    ORDER BY ma.activity_time DESC
    LIMIT 10
";

$result = $conn->query($activityQuery);

if ($result->num_rows > 0) {
    echo '<div class="container my-4">';
    echo '<div class="row g-3">';

    while($row = $result->fetch_assoc()){
        $time = date("d M Y, H:i", strtotime($row['activity_time']));
        echo '
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card bg-dark text-light shadow-lg border-0 rounded-4 p-3 h-100">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar bg-warning text-dark rounded-circle d-flex justify-content-center align-items-center me-3" style="width:50px; height:50px; font-weight:bold;">
                        '.strtoupper($row['name'][0]).'
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold text-warning">'.$row['name'].'</h6>
                        <small class="text-light">'.$row['email'].'</small>
                    </div>
                </div>
                <p class="mb-2">'.$row['activity_type'].'</p>
                <small class="text-info">'.$time.'</small>
            </div>
        </div>';
    }

    echo '</div>'; // row
    echo '</div>'; // container
} else {
    echo '<p class="text-warning text-center my-4">No recent activities found.</p>';
}

include "footer.php";
?>
