<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "team_0001";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login_btn'])) {
    $email = trim($_POST['email'] ?? '');
    $pass = trim($_POST['password'] ?? '');

    $stmt = $conn->prepare("SELECT admin_id, name, password FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_id, $admin_name, $db_password);
        $stmt->fetch();

        if ($pass === $db_password) {
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_email'] = $email;
            $_SESSION['admin_name'] = $admin_name;

            // ✅ Redirect to dashboard
            header("Location: ../dashboard/d.php");
            exit();
        } else {
            echo "<script>alert('Password is incorrect.'); window.location.href='../dashboard/login.php';</script>";
        }
    } else {
        echo "<script>alert('Email not found.'); window.location.href='../dashboard/login.php';</script>";
    }

    $stmt->close();
}
$conn->close();
?>
