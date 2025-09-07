<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "team_0001";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login_btn'])) {
    $email = trim($_POST['email'] ?? '');
    $pass = trim($_POST['password'] ?? '');

    if (empty($email) || empty($pass)) {
        echo "<script>alert('Please enter email and password.');</script>";
        exit;
    }

    // ✅ Correct table name and fetch properly
    $stmt = $conn->prepare("SELECT admin_id, name, password FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_id, $admin_name, $db_password);
        $stmt->fetch();

        // ⚠️ Plaintext check (for now)
        if ($pass === $db_password) {
            // ✅ Update last login
            $update = $conn->prepare("UPDATE admins SET last_login = NOW() WHERE admin_id = ?");
            $update->bind_param("i", $admin_id);
            $update->execute();
            $update->close();

            // ✅ Store session
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_email'] = $email;
            $_SESSION['admin_name'] = $admin_name;

            header("Location: ../dashboard/d.php");
            exit;
        } else {
            echo "<script>alert('Password is incorrect.');</script>";
        }
    } else {
        echo "<script>alert('Email not found.');</script>";
    }

    $stmt->close();
} else {
    header("location:../dashboard/login.php");
}

$conn->close();
