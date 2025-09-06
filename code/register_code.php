<?php
include "./db_connection.php";

if (isset($_POST['register_btn'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Profile picture upload
    $profile = $_FILES['profile']['name'];
    $profileTmp = $_FILES['profile']['tmp_name'];
    $profileFolder = "uploads/" . time() . "_" . basename($profile);

    if (!is_dir("uploads")) {
        mkdir("uploads", 0755, true);
    }

    if (!move_uploaded_file($profileTmp, $profileFolder)) {
        $profileFolder = NULL;
    }

    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM members WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Email already registered!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        $stmt->close();
        exit();
    }
    $stmt->close();

    // Insert data
    $insertStmt = $conn->prepare("INSERT INTO members (name, email, phone, password, profile_pic, status) VALUES (?, ?, ?, ?, ?, 'pending')");
    $insertStmt->bind_param("sssss", $name, $email, $phone, $password, $profileFolder);

    if ($insertStmt->execute()) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Registration successful!</strong> Your account is pending approval.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Error:</strong> ' . $insertStmt->error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }

    $insertStmt->close();
}
