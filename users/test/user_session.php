<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . "/../../code/db_connection.php"; // adjust path

$member_id = $_SESSION['user_id'] ?? 0;
$user_global = null;

if ($member_id > 0) {
    $stmt = $conn->prepare("SELECT id, name, email, profile_pic, team_id FROM members WHERE id = ?");
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_global = $result->fetch_assoc();
    $stmt->close();
}

// Fallbacks
$name_global   = $user_global['name']  ?? "Guest User";
$email_global  = $user_global['email'] ?? "Not Provided";
$avatar = !empty($user_global['profile_pic'])
    ? "../../code/" . htmlspecialchars($user_global['profile_pic'])
    : "https://i.pravatar.cc/150?img=8";
