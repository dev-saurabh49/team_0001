<?php
session_start();
include './db_connection.php'; // adjust path to your DB connection file

if (isset($_POST['admin_login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare query
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if admin exists
    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        // Verify password (make sure your DB password is hashed using password_hash)
        if ($password === $admin['password']) {
            // Set session variables
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['admin_name'] = $admin['name'];
            $_SESSION['admin_email'] = $admin['email'];

            // Redirect to admin dashboard
            echo "<script>alert('login_Successfully');";
            header("Location: ../dashboard.php");
            exit();
        } else {
            // Invalid password
            $_SESSION['error'] = "Invalid email or password.";
            echo "<script>alert('login_failed');window.location.href='../../index.php';</script>";
            exit();
        }
    } else {
        // Admin not found
        $_SESSION['error'] = "Invalid email or password.";
        // header("Location: ../../index.php");
        echo "<script>alert('login_failed admin not found');window.location.href='../../index.php';</script>";
        exit();
    }
} else {
    header("Location: ../../index.php");
    exit();
}
