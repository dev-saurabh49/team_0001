<?php
include "code/db_connection.php";

$response = ['status' => 'error', 'message' => 'Something went wrong'];

if (isset($_POST['call_btn'])) {
    $name  = isset($_POST['name']) ? trim($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

    if (!empty($name) && !empty($phone)) {
        $stmt = $conn->prepare("INSERT INTO callback_requests (name, phone) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $phone);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = '✅ Your request has been submitted! We will call you soon.';
        } else {
            $response['message'] = '❌ Database error: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        $response['message'] = '⚠️ Please fill all fields.';
    }
}

$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
