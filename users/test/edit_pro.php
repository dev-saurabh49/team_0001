<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../../code/db_connection.php";
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

$avatar = !empty($user_edit['profile_pic'])
    ? "../code/" . htmlspecialchars($user_edit['profile_pic'])
    : "https://i.pravatar.cc/80?img=5";
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
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], "../../code/" . $new_file)) {
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
        echo "<script>alert('Profile updated'); window.location.href='user_profile.php';</script>";
    } else {
        echo "<script>alert('Update failed'); window.location.href='user_profile.php';</script>";
    }
    $stmt->close();
}
?>

<?php include './new_head.php' ?>

<div class="container my-5">
    <div class="profile-card p-4 shadow-lg">
        <h2 class="section-title mb-4"><i class="bi bi-person-gear"></i> Edit Profile</h2>

        <form action="edit_pro.php" method="post" enctype="multipart/form-data">
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
                    <img src="<?= $avatar ?>" alt="Profile Picture" 
                         class="mt-3 rounded-circle border border-info shadow" 
                         width="90" height="90">
                <?php endif; ?>
            </div>

            <!-- Submit -->
            <div class="text-center mt-4">
                <button type="submit" name="upd_btn" class="btn btn-save px-4">
                    <i class="bi bi-save2"></i> Update Profile
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .profile-card {
        background: #121212;
        border-radius: 18px;
        border: 1px solid rgba(0, 229, 255, 0.25);
        max-width: 750px;
        margin: auto;
        box-shadow: 0 6px 26px rgba(0, 229, 255, 0.1);
        color: #e0e0e0;
    }

    .section-title {
        font-size: 1.6rem;
        font-weight: 700;
        text-align: center;
        color: #00E5FF;
        text-shadow: 0 0 6px rgba(0, 229, 255, 0.6),
                     0 0 14px rgba(0, 229, 255, 0.4);
    }

    label {
        font-weight: 600;
        color: #ccc;
    }

    .form-control {
        background: #1e1e1e;
        border: 1px solid #333;
        color: #fff;
        border-radius: 10px;
        transition: 0.3s;
    }

    .form-control:focus {
        background: #1e1e1e;
        border-color: #00E5FF;
        box-shadow: 0 0 8px rgba(0, 229, 255, 0.5);
        color: #fff;
    }

    .btn-save {
        background: linear-gradient(135deg, #00E5FF, #00838F);
        border: none;
        border-radius: 30px;
        padding: 10px 28px;
        font-weight: 600;
        color: #fff;
        box-shadow: 0 4px 15px rgba(0, 229, 255, 0.4);
        transition: all 0.3s ease;
    }

    .btn-save:hover {
        background: linear-gradient(135deg, #00B8D4, #006064);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 229, 255, 0.5);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .profile-card {
            padding: 1.2rem;
            max-width: 100%;
            border-radius: 14px;
        }
        .section-title {
            font-size: 1.3rem;
        }
        .btn-save {
            width: 100%;
        }
        img {
            width: 70px;
            height: 70px;
        }
    }
</style>

<?php include './foot.php' ?>
