<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../code/db_connection.php";

$member_id = $_SESSION['user_id'] ?? 0;
$user_edit = null;

if ($member_id > 0) {
    $stmt = $conn->prepare("SELECT * FROM members WHERE id = ?");
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_edit = $result->fetch_assoc();
    $stmt->close();
}

$avatar = !empty($user_edit_edit['profile_pic']) ? "../code/" . htmlspecialchars($user_edit['profile_pic']) : "https://i.pravatar.cc/80?img=5";


?>
<?php 
    // Handle form submission
if (isset($_POST['upd_btn'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $profile_pic = null;

    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $allowed_ext = ['jpg','jpeg','png','webp'];
        $file_ext = strtolower(pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION));
        if (in_array($file_ext, $allowed_ext)) {
            $new_file = "uploads/" . time() . "_" . uniqid() . "." . $file_ext;
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], "../code/" . $new_file)) {
                $profile_pic = $new_file;
            }
        }
    }
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $allowed_ext = ['jpg','jpeg','png','webp'];
        $file_ext = strtolower(pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION));
        if (in_array($file_ext, $allowed_ext)) {
            $new_file = "uploads/" . time() . "_" . uniqid() . "." . $file_ext;
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], "../code/" . $new_file)) {
                $profile_pic = $new_file;
            }
        }
    }

    if ($profile_pic) {
        $stmt = $conn->prepare("UPDATE members SET name=?, email=?, phone=?, profile_pic=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $email, $phone, $profile_pic, $member_id);
    } else {
        $stmt = $conn->prepare("UPDATE members SET name=?, email=?, phone=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $email, $phone, $member_id);
    }

    if ($stmt->execute()) {
        $_SESSION['user_name'] = $name;
        echo "<script>alert('✅ Profile updated'); window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('❌ Update failed'); window.history.back();</script>";
    }
    $stmt->close();

}
?>

<?php include './head.php' ?>

<div class="container my-5">
    <div class="profile-card p-4 shadow-sm rounded">
        <h2 class="text-primary mb-4">Edit Profile</h2>

        <form action="./profile_edit.php" method="post" enctype="multipart/form-data">
            <!-- Member ID (readonly) -->
            <div class="mb-3">
                <label for="member_id" class="form-label">Member ID</label>
                <input type="text" class="form-control" id="member_id" name="member_id"
                    value="<?= htmlspecialchars($user_edit['team_id'] ?? '') ?>" readonly>
            </div>

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="<?= htmlspecialchars($user_edit['name'] ?? '') ?>" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?= htmlspecialchars($user_edit['email'] ?? '') ?>" required>
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="<?= htmlspecialchars($user_edit['phone'] ?? '') ?>" required>
            </div>

            <!-- Profile Picture -->
            <div class="mb-3">
                <label for="profile_pic" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="profile_pic" name="profile_pic" accept="image/*">
                <?php if (!empty($user_edit['profile_pic'])): ?>
                    <img src="<?= $avatar ?>" alt="Profile Picture" class="mt-2 rounded-circle" width="80" height="80">
                <?php endif; ?>
            </div>

            <!-- Submit -->
            <div class="text-center">
                <button type="submit" name="upd_btn" class="btn btn-primary px-4">
                    <i class="bi bi-save"></i> Update Profile
                </button>
            </div>
        </form>
    </div>
</div>



<style>
    label{
        font-weight: bold;
    }
    .profile-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
    }

    .profile-card h2 {
        font-family: 'Cinzel Decorative', serif;
        letter-spacing: 1.2px;
    }

    .btn-primary {
        background: #0d47a1;
        border: none;
        box-shadow: 0 4px 12px rgba(13, 71, 161, 0.3);
    }

    .btn-primary:hover {
        background: #094083;
    }
</style>

<?php include './foot.php' ?>