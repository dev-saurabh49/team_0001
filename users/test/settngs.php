<?php
session_start();
include '../../code/db_connection.php';
include './functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php'); // redirect if user not logged in
    exit;
}

$user_id = $_SESSION['user_id'];
$message = "";

// Fetch current user info
$stmt = $conn->prepare("SELECT * FROM members WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_global = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Handle profile update
if (isset($_POST['update_profile'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);


    $stmt = $conn->prepare("UPDATE members SET name=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $phone, $user_id);
    if ($stmt->execute()) {
        $message = "Profile updated successfully.";
        $_SESSION['user_name'] = $name; // update session
    } else {
        $message = "Failed to update profile.";
    }
    $stmt->close();
}

// Handle password change
if (isset($_POST['change_password'])) {
    $old_pass = $_POST['old_password'];
    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];

    if ($new_pass !== $confirm_pass) {
        $message = "New passwords do not match.";
    } elseif (!password_verify($old_pass, $user_global['password'])) {
        $message = "Old password is incorrect.";
    } else {
        $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE members SET password=? WHERE id=?");
        $stmt->bind_param("si", $hashed, $user_id);
        if ($stmt->execute()) {
            $message = "Password changed successfully.";
        } else {
            $message = "Failed to change password.";
        }
        $stmt->close();
    }
}



?>

<?php include './new_head.php'; ?>

<div class="container my-5">
    <h2 class="mb-4 text-center text-warning">Settings</h2>

    <?php if ($message): ?>
        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <ul class="nav nav-tabs mb-4" id="settingsTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab">Security</button>
        </li>
    </ul>

    <div class="tab-content" id="settingsTabContent">
        <!-- Profile Tab -->
        <div class="tab-pane fade show active" id="profile" role="tabpanel">
            <div class="card  p-4 shadow-sm">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user_global['name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user_global['email']) ?>" required>
                    </div>
                    <button type="submit" name="update_profile" class="btn btn-warning">Update Profile</button>
                </form>
            </div>
        </div>

        <!-- Security Tab -->
        <div class="tab-pane fade" id="security" role="tabpanel">
            <div class="card  p-4 shadow-sm">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input type="password" name="old_password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>
                    <button type="submit" name="change_password" class="btn btn-warning">Change Password</button>
                </form>
            </div>
        </div>


    </div>
</div>

<?php include './foot.php'; ?>

<style>
    .premium-card {
        border-radius: 1rem;
        transition: transform 0.2s;
    }

    .premium-card:hover {
        transform: translateY(-4px);
    }
</style>