<?php
// NOTE: This is a simple placeholder. Replace with real DB authentication.
session_start();
if (!isset($_POST['admin_login'])) {
    header('Location: ../admin_login.php');
    exit();
}
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
// For demo only: accept admin@demo.com / demo123
if ($email === 'admin@demo.com' && $password === 'demo123') {
    $_SESSION['admin_id'] = 1;
    $_SESSION['admin_name'] = 'Demo Admin';
    header('Location: ../dashboard.php');
    exit();
} else {
    $_SESSION['error'] = 'Invalid credentials';
    header('Location: ../admin_login.php');
    exit();
}
?>