<?php
session_start();
include "./db_connection.php"; // your mysqli connection

if(isset($_POST['login_btn'])){

    $email = $_POST['email'];
    $password_input = $_POST['password'];

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, name, password, status FROM members WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password_input);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $name, $password_db, $status);

    if($stmt->num_rows > 0){
        $stmt->fetch();

        if($status != 'active'){
            echo "<script>alert('⚠️ Your account is not approved yet!'); window.history.back();</script>";
            exit();
        }

        // Set session
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_id'] = $id;

        echo "<script>alert('✅ Login successful!'); window.location.href='../index.php';</script>";

    } else {
        echo "<script>alert('❌ Invalid Email or Password!'); window.history.back();</script>";
    }

    $stmt->close();
}
?>
