<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../code/db_connection.php"; // adjust if needed

$member_id = $_SESSION['user_id'] ?? 0;
$user = null;

if ($member_id > 0) {
    $stmt = $conn->prepare("SELECT id, team_id, name, email, phone, profile_pic, status, is_blocked, created_at 
                            FROM members WHERE id = ?");
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}

if (!$user) {
    echo "<script>alert('⚠️ User not found or data missing!'); window.location.href='login.php';</script>";
    exit();
}

// Safe values with defaults
$id         = $user['id'] ?? 0;
$name       = $user['name'] ?? "Unknown User";
$email      = $user['email'] ?? "Not Provided";
$phone      = $user['phone'] ?? "Not Provided";
$team_id    = $user['team_id'] ?? "I";
$status     = $user['status'] ?? "inactive";
$is_blocked = $user['is_blocked'] ?? 0;
$created_at = !empty($user['created_at']) ? date("F j, Y", strtotime($user['created_at'])) : "N/A";

$avatar = !empty($user['profile_pic'])
    ? "../code/" . htmlspecialchars($user['profile_pic'])
    : "https://i.pravatar.cc/150?img=8";
?>

<?php include './head.php' ?>
<div class="container my-5">
    <div class="profile-card text-center p-4 shadow-lg">
        <!-- Avatar -->
        <div class="profile-header mb-3">
            <img src="<?= $avatar ?>" alt="Profile Picture" class="profile-avatar mb-3">
            <h2 class="profile-name"><?= htmlspecialchars($name) ?></h2>
            <p class="profile-team">Team <?= htmlspecialchars($team_id) ?></p>
            <span class="status-badge <?= $is_blocked ? 'status-blocked' : 'status-active' ?>">
                <?= $is_blocked ? 'Blocked' : ucfirst($status) ?>
            </span>
        </div>

        <!-- Divider -->
        <hr class="profile-divider">

        <!-- Profile Info -->
        <h4 class="section-title mb-4"><i class="bi bi-person-lines-fill"></i> Profile Information</h4>
        <div class="row text-start g-4">
            <div class="col-md-6">
                <div class="info-box">
                    <div class="info-label"><i class="bi bi-envelope"></i> Email</div>
                    <div class="info-value"><?= htmlspecialchars($email) ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <div class="info-label"><i class="bi bi-telephone"></i> Phone</div>
                    <div class="info-value"><?= htmlspecialchars($phone) ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <div class="info-label"><i class="bi bi-calendar3"></i> Joined On</div>
                    <div class="info-value"><?= $created_at ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <div class="info-label"><i class="bi bi-person-badge"></i> Member ID</div>
                    <div class="info-value ms-3">#<?= htmlspecialchars($team_id) ?></div>
                </div>
            </div>
        </div>

        <!-- Edit Profile -->
        <div class="mt-5">
            <a href="./profile_edit.php" class="btn btn-edit">
                <i class="bi bi-pencil-square"></i> Edit Profile
            </a>
        </div>
    </div>
</div>

<style>
    .profile-card {
        border-radius: 18px;
        background: #fff;
        max-width: 800px;
        margin: auto;
    }

    .profile-avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        border: 3px solid purple;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .profile-name {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0d47a1;
    }

    .profile-team {
        font-size: 0.95rem;
        color: #666;
        margin-bottom: 0.5rem;
    }

    .status-badge {
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
    }

    .status-active {
        background: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #a5d6a7;
    }

    .status-blocked {
        background: #fdecea;
        color: #c62828;
        border: 1px solid #ef9a9a;
    }

    .profile-divider {
        margin: 2rem auto;
        width: 60%;
        border-top: 2px solid #f1f1f1;
    }

    .section-title {
        color: crimson;
        font-weight: 600;
        text-align: center;
    }

    .info-box {
        background: #fafafa;
        border: 1px solid #eee;
        border-radius: 12px;
        padding: 1rem 1.2rem;
        transition: all 0.3s ease;
    }

    .info-box:hover {
        background: #fff;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    }

    .info-label {
        font-weight: 600;
        color: #0d47a1;
        margin-bottom: 4px;
    }

    .info-value {
        font-size: 0.95rem;
        color: #333;
    }

    .btn-edit {
        background: #0d47a1;
        color: #fff;
        border-radius: 30px;
        padding: 10px 28px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(13, 71, 161, 0.3);
        transition: 0.3s ease;
    }

    .btn-edit:hover {
        background: #08306b;
    }
</style>

<?php include './foot.php' ?>