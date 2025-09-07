<?php
session_start();
include '../../code/db_connection.php';
include './header.php';

// Ensure admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ./dashboard/login.php');
    exit;
}

$admin_id = $_SESSION['admin_id'];
$message = "";
$error = "";

// Fetch admin info
$admin = $conn->query("SELECT * FROM admins WHERE admin_id = $admin_id LIMIT 1")->fetch_assoc();

// Fetch maintenance mode status from dedicated table
$siteSettings = $conn->query("SELECT is_active AS maintenance_mode FROM maintenance_mode WHERE id = 1")->fetch_assoc();

if (!$siteSettings) {
    die("Maintenance mode row missing. Please insert a row with id=1 in maintenance_mode table.");
}

// Profile update
if (isset($_POST['update_profile'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && $name) {
        $stmt = $conn->prepare("UPDATE admins SET name = ?, email = ? WHERE admin_id = ?");
        $stmt->bind_param('ssi', $name, $email, $admin_id);
        $stmt->execute();
        $stmt->close();
        $message = "Profile updated.";
        $admin['name'] = $name;
        $admin['email'] = $email;
    } else {
        $error = "Invalid Name or Email.";
    }
}

// Change password
if (isset($_POST['change_password'])) {
    $current = $_POST['current_password'];
    $newpass = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if ($newpass === $confirm && strlen($newpass) >= 6) {
        if (password_verify($current, $admin['password'])) {
            $hash = password_hash($newpass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE admins SET password = ? WHERE admin_id = ?");
            $stmt->bind_param('si', $hash, $admin_id);
            $stmt->execute();
            $stmt->close();
            $message = "Password changed.";
        } else {
            $error = "Current password incorrect.";
        }
    } else {
        $error = "Passwords do not match or too short.";
    }
}

// Toggle shutdown mode
if (isset($_POST['toggle_shutdown'])) {
    $shutdown = isset($_POST['shutdown']) ? 1 : 0;

    $stmt = $conn->prepare("UPDATE maintenance_mode SET is_active = ? WHERE id = 1");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param('i', $shutdown);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    $stmt->close();

    $siteSettings['maintenance_mode'] = $shutdown;
    $message = $shutdown ? "Maintenance mode enabled." : "Website live now.";
}
?>

<div class="container my-5">
    <h2>Settings</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <!-- Profile Update -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Update Profile</div>
        <div class="card-body">
            <form method="POST" novalidate>
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($admin['name']) ?>" required>

                <label class="form-label mt-3">Email</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($admin['email']) ?>" required>

                <button name="update_profile" type="submit" class="btn btn-primary mt-3">Update Profile</button>
            </form>
        </div>
    </div>

    <!-- Password Change -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Change Password</div>
        <div class="card-body">
            <form method="POST" novalidate>
                <label class="form-label">Current Password</label>
                <input type="password" name="current_password" class="form-control" required>

                <label class="form-label mt-3">New Password</label>
                <input type="password" name="new_password" class="form-control" required>

                <label class="form-label mt-3">Confirm New Password</label>
                <input type="password" name="confirm_password" class="form-control" required>

                <button name="change_password" type="submit" class="btn btn-warning mt-3">Change Password</button>
            </form>
        </div>
    </div>

    <!-- Maintenance Mode Toggle -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Maintenance Mode</div>
        <div class="card-body">
            <form method="POST" novalidate>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="shutdown" id="shutdown" <?= !empty($siteSettings['maintenance_mode']) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="shutdown">Enable Website Maintenance Mode (Shutdown)</label>
                </div>
                <button name="toggle_shutdown" type="submit" class="btn btn-danger mt-3">Save</button>
            </form>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>