<?php
include "./db_connection.php";

$alert = ""; // Initialize alert variable

if (isset($_POST['register_btn'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $profile = $_FILES['profile']['name'];
    $profileTmp = $_FILES['profile']['tmp_name'];
    $profileFolder = "uploads/" . time() . "_" . basename($profile);

    if (!is_dir("uploads")) {
        mkdir("uploads", 0755, true);
    }

    if (!move_uploaded_file($profileTmp, $profileFolder)) {
        $profileFolder = NULL;
    }

    $stmt = $conn->prepare("SELECT id FROM members WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email Already Exists');window.location.href = '../index.php';</script>";
        $stmt->close();
    } else {
        $stmt->close();
        $insertStmt = $conn->prepare("INSERT INTO members (name, email, phone, password, profile_pic, status) VALUES (?, ?, ?, ?, ?, 'pending')");
        $insertStmt->bind_param("sssss", $name, $email, $phone, $hashedPassword, $profileFolder);

        if ($insertStmt->execute()) {

            // Get the new member ID
            $new_member_id = $insertStmt->insert_id;

            // Log the registration activity
            $activityStmt = $conn->prepare("INSERT INTO member_activity (member_id, activity_type) VALUES (?, 'register')");
            $activityStmt->bind_param("i", $new_member_id);
            $activityStmt->execute();
            $activityStmt->close();

            echo "<script>alert('Registration Success');window.location.href = '../index.php';</script>";
        } else {
            echo "<script>alert('Registration Failed');window.location.href = '../index.php';</script>";
        }

        $insertStmt->close();
    }
}
?>
