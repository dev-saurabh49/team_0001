<?php
include "../../code/db_connection.php";
include "header.php";

$member_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($member_id <= 0) {
    echo '<div class="container py-5"><div class="alert alert-danger">Invalid member ID.</div></div>';
    include "footer.php";
    exit;
}

$stmt = $conn->prepare("SELECT id, team_id, name, email, phone, status, is_blocked, created_at FROM members WHERE id = ?");
$stmt->bind_param("i", $member_id);
$stmt->execute();
$result = $stmt->get_result();
$member = $result->fetch_assoc();

if (!$member) {
    echo '<div class="container py-5"><div class="alert alert-warning">Member not found.</div></div>';
    include "footer.php";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_member_btn'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $team_id = $_POST['team_id'] ?? '';
    $status = $_POST['status'] ?? 'inactive';
    $is_blocked = isset($_POST['is_blocked']) ? 1 : 0;

    // Basic validation (add more as needed)
    if (empty($name) || empty($email)) {
        $error = "Name and Email are required.";
    } else {
        $updateStmt = $conn->prepare("UPDATE members SET name=?, email=?, phone=?, team_id=?, status=?, is_blocked=? WHERE id=?");
        $updateStmt->bind_param("sssssii", $name, $email, $phone, $team_id, $status, $is_blocked, $member_id);
        if ($updateStmt->execute()) {
            $success = "Member updated successfully.";
            // Refresh member data
            $stmt->execute();
            $member = $stmt->get_result()->fetch_assoc();
        } else {
            $error = "Error updating member: " . $conn->error;
        }
    }
}
?>

<div class="container py-5">
    <h3>Edit Member</h3>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form action="edit_member.php?id=<?= $member['id'] ?>" method="post" class="mt-4 needs-validation" novalidate>
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="<?= htmlspecialchars($member['name']) ?>">
            <div class="invalid-feedback">Please enter full name.</div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control" id="email" name="email" required value="<?= htmlspecialchars($member['email']) ?>">
            <div class="invalid-feedback">Please enter a valid email.</div>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label fw-semibold">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($member['phone']) ?>">
        </div>

        <div class="mb-3">
            <label for="team_id" class="form-label fw-semibold">Team ID</label>
            <input type="text" class="form-control" id="team_id" name="team_id" value="<?= htmlspecialchars($member['team_id']) ?>">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label fw-semibold">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="active" <?= strtolower($member['status']) === 'active' ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= strtolower($member['status']) !== 'active' ? 'selected' : '' ?>>Inactive</option>
            </select>
        </div>

        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" value="1" id="is_blocked" name="is_blocked" <?= $member['is_blocked'] == 1 ? 'checked' : '' ?>>
            <label class="form-check-label fw-semibold" for="is_blocked">
                Blocked
            </label>
        </div>

        <button type="submit" name="update_member_btn" class="btn btn-primary fw-semibold rounded-pill px-4 py-2">Update Member</button>
        <a href="./members.php" class="btn btn-secondary ms-3 rounded-pill px-4 py-2">Cancel</a>
    </form>
</div>

<script>
    // Bootstrap 5 validation example
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<?php include "footer.php"; ?>