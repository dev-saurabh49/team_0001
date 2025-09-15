<?php
session_start();
include "../code/db_connection.php"; // adjust path to your DB connection file

if (isset($_POST['c_btn'])) {
    $name  = mysqli_real_escape_string($conn, $_POST['c_name']);
    $email = mysqli_real_escape_string($conn, $_POST['c_email']);
    $msg   = mysqli_real_escape_string($conn, $_POST['c_msg']);

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$msg')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['alert'] = [
            'type' => 'success',
            'msg'  => 'Message sent successfully!'
        ];
    } else {
        $_SESSION['alert'] = [
            'type' => 'danger',
            'msg'  => 'Error: ' . mysqli_error($conn)
        ];
    }

    header("Location: ../contact.php");
    exit();
}else{
    header("Location: ../index.php");
}
