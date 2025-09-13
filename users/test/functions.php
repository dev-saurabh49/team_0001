<?php
function logActivity($conn, $member_id, $activity_text, $activity_type = 'general') {
    $created_at = date('Y-m-d H:i:s');

    $stmt_activity = $conn->prepare(
        "INSERT INTO activities (member_id, activity_text, activity_type, created_at) VALUES (?, ?, ?, ?)"
    );
    if ($stmt_activity) {
        $stmt_activity->bind_param("isss", $member_id, $activity_text, $activity_type, $created_at);
        $stmt_activity->execute();
        $stmt_activity->close();
    } else {
        error_log("Activity logging failed: " . $conn->error);
    }
}
?>
