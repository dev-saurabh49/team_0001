<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "team_0001";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get member ID and action from URL
$member_id = $_GET['id'] ?? 0;
$action = $_GET['action'] ?? '';

if ($member_id > 0 && in_array($action, ['block', 'unblock'])) {
    $is_blocked = ($action === 'block') ? 1 : 0;

    // Update members table
    $stmt = $conn->prepare("UPDATE members SET is_blocked=? WHERE id=?");
    $stmt->bind_param("ii", $is_blocked, $member_id);
    $stmt->execute();
    $stmt->close();

    // Track this activity in member_activity table
    $activity_type = ($action === 'block') ? "Blocked by Admin" : "Unblocked by Admin";
    $stmt2 = $conn->prepare("INSERT INTO member_activity (member_id, activity_type, activity_time) VALUES (?, ?, NOW())");
    $stmt2->bind_param("is", $member_id, $activity_type);
    $stmt2->execute();
    $stmt2->close();

    header("Location: members.php?updated=1");
    exit;
} else {
    header("Location: members.php?error=1");
    exit;
}
