<?php
include './db_connection.php'; // mysqli connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $rating  = $_POST['rating'];
    $comment = $_POST['comment'];

    // Profile upload
    $profilePath = null;
    if (!empty($_FILES['profile']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $profilePath = $targetDir . time() . "_" . basename($_FILES["profile"]["name"]);
        move_uploaded_file($_FILES["profile"]["tmp_name"], $profilePath);
    }

    $stmt = $conn->prepare("INSERT INTO team_feedback (name, email, profile_photo, rating, comment) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $name, $email, $profilePath, $rating, $comment);

    if ($stmt->execute()) {
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='index.php#rate-us';</script>";
    }
}
