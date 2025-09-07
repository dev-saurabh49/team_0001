<?php
// session_start();
// include "./db_connection.php"; // your mysqli connection

// if (isset($_POST['login_btn'])) {

//     $email = trim($_POST['email']);
//     $password_input = $_POST['password'];

//     // Prepare statement to prevent SQL injection
//     $stmt = $conn->prepare("SELECT id, name, password, status, is_blocked FROM members WHERE email = ?");
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $stmt->store_result();
//     $stmt->bind_result($id, $name, $password_db, $status, $is_blocked);

//     if ($stmt->num_rows > 0) {
//         $stmt->fetch();

//         // Check if user is blocked
//         if ($is_blocked == 1) {
//             echo "<script>alert('⚠️ Your account is blocked! Contact admin.'); window.history.back();</script>";
//             exit();
//         }

//         // Check if account is active/approved
//         if (strtolower($status) != 'active') {
//             echo "<script>alert('⚠️ Your account is not approved yet!'); window.history.back();</script>";
//             exit();
//         }

//         // Verify password (assuming you store hashed passwords)
//         if (password_verify($password_input, $password_db)) {
//             // Set session
//             $_SESSION['user_email'] = $email;
//             $_SESSION['user_name'] = $name;
//             $_SESSION['user_id'] = $id;

//             echo "<script>alert('✅ Login successful!'); window.location.href='../../index.php';</script>";
//         } else {
//             echo "<script>alert('❌ Invalid Email or Password!'); window.history.back();</script>";
//         }
//     } else {
//         echo "<script>alert('❌ Invalid Email or Password!'); window.history.back();</script>";
//     }

//     $stmt->close();
// }

?>

<?php
session_start();
include "./db_connection.php"; // your mysqli connection

if (isset($_POST['login_btn'])) {

    $email = trim($_POST['email']);
    $password_input = $_POST['password'];

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, name, password, status, is_blocked FROM members WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $name, $password_db, $status, $is_blocked);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();

        // Check if user is blocked
        if ($is_blocked == 1) {
            echo "<script>alert('⚠️ Your account is blocked! Contact admin.'); window.history.back();</script>";
            exit();
        }

        // Check if account is active/approved
        if (strtolower($status) != 'active') {
            echo "<script>alert('⚠️ Your account is not approved yet!'); window.history.back();</script>";
            exit();
        }

        // Verify password
        if (password_verify($password_input, $password_db)) {
            // Set session
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $name;
            $_SESSION['user_id'] = $id;

            // **Log login activity**
            $activityStmt = $conn->prepare("INSERT INTO member_activity (member_id, activity_type) VALUES (?, 'login')");
            $activityStmt->bind_param("i", $id);
            $activityStmt->execute();
            $activityStmt->close();

            echo "<script>alert('✅ Login successful!'); window.location.href='../../index.php';</script>";
        } else {
            echo "<script>alert('❌ Invalid Email or Password!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('❌ Invalid Email or Password!'); window.history.back();</script>";
    }

    $stmt->close();
}
?>