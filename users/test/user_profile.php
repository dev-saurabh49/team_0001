<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../../code/db_connection.php";

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

$id         = $user['id'] ?? 0;
$name       = $user['name'] ?? "Unknown User";
$email      = $user['email'] ?? "Not Provided";
$phone      = $user['phone'] ?? "Not Provided";
$team_id    = $user['team_id'] ?? "I";
$status     = $user['status'] ?? "inactive";
$is_blocked = $user['is_blocked'] ?? 0;
$created_at = !empty($user['created_at']) ? date("F j, Y", strtotime($user['created_at'])) : "N/A";

$avatar = !empty($user['profile_pic'])
    ? "../../code/" . htmlspecialchars($user['profile_pic'])
    : "https://i.pravatar.cc/150?img=8";

?>

<?php include './new_head.php' ?>
<div class="container-fluid">
    <div class="profile-card text-center p-3 rounded animate-fade">
        <!-- Avatar -->
        <div class="profile-header mb-4">
            <img src="<?= $avatar ?>" alt="Profile Picture" class="profile-avatar mb-3 animate-scale">
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
            <div class="col-md-6 col-12">
                <div class="info-box">
                    <div class="info-label"><i class="bi bi-envelope"></i> Email</div>
                    <div class="info-value"><?= htmlspecialchars($email) ?></div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="info-box">
                    <div class="info-label"><i class="bi bi-telephone"></i> Phone</div>
                    <div class="info-value"><?= htmlspecialchars($phone) ?></div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="info-box">
                    <div class="info-label"><i class="bi bi-calendar3"></i> Joined On</div>
                    <div class="info-value"><?= $created_at ?></div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="info-box">
                    <div class="info-label"><i class="bi bi-person-badge"></i> Member ID</div>
                    <div class="info-value">#<?= htmlspecialchars($team_id) ?></div>
                </div>
            </div>
        </div>

        <!-- Edit Profile -->
        <div class="mt-5">
            <a href="edit_pro.php" class="btn btn-edit">
                <i class="bi bi-pencil-square"></i> Edit Profile
            </a>
        </div>
    </div>



</div>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

<style>
    body {
        background: #0b0b0b;
        font-family: 'Poppins', sans-serif;
        color: #eee;
    }



    /* For small screens (mobile devices) */
    @media (max-width: 767px) {
        main {
            margin-left: 0 !important;
            /* Sidebar hidden, full width */
            padding: 15px 10px;
            /* Reduce padding for mobiles */
        }
    }

    /* Card */
    .profile-card {
        border-radius: 20px;
        background: #121212;
        border: 1px solid rgba(255, 215, 0, 0.2);
        /* max-width: 890px; */
        width: 90%;
        /* margin: auto; */
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
        width: 100%;
    }

    /* Full width on mobile */
    @media (max-width: 767px) {
        .profile-card {
            border-radius: 0;
            max-width: 100%;
            margin: 0;
            padding: 1rem 1rem;
        }
    }

    /* Avatar */
    .profile-avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        border: 3px solid #FFD700;
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.4);
        transition: transform 0.3s ease;
    }

    .profile-avatar:hover {
        transform: scale(1.05);
    }

    /* Name & Team */
    .profile-name {
        font-size: 1.8rem;
        font-weight: 700;
        color: #00E5FF;
        /* Neon Cyan */
        text-shadow: 0 0 6px rgba(0, 229, 255, 0.6),
            0 0 14px rgba(0, 229, 255, 0.4);


    }

    .profile-team {
        font-size: 0.95rem;
        color: #aaa;
        margin-bottom: 0.5rem;
    }

    /* Status */
    .status-badge {
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
    }

    .status-active {
        background: rgba(16, 185, 129, 0.15);
        color: #10B981;
        border: 1px solid #10B981;
    }

    .status-blocked {
        background: rgba(239, 68, 68, 0.15);
        color: #EF4444;
        border: 1px solid #EF4444;
    }

    /* Divider */
    .profile-divider {
        margin: 2rem auto;
        width: 60%;
        border-top: 2px solid #1e1e1e;
    }

    /* Info */
    .section-title {
        color: #ffffff;
        text-shadow: 0 0 6px rgba(255, 255, 255, 0.6);


        font-weight: 600;
        text-align: center;
    }

    .info-box {
        background: #1e1e1e;
        border: 1px solid #2a2a2a;
        border-radius: 12px;
        padding: 1rem 1.2rem;
        transition: all 0.3s ease;
    }

    .info-box:hover {
        background: #242424;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.6);
        transform: translateY(-3px);
    }

    .info-label {
        font-weight: 600;
        color: #FFD700;
        margin-bottom: 4px;
    }

    .info-value {
        font-size: 0.95rem;
        color: #ddd;
    }

    /* Button */
    .btn-edit {
        background: #FFD700;
        color: #121212;
        border-radius: 30px;
        padding: 10px 28px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.4);
        transition: 0.3s ease;
    }

    .btn-edit:hover {
        background: #e6c200;
        transform: translateY(-2px);
    }

    /* Animations */
    .animate-fade {
        animation: fadeIn 0.8s ease;
    }

    .animate-scale {
        animation: scaleUp 0.8s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes scaleUp {
        from {
            opacity: 0;
            transform: scale(0.8);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>

<?php include './foot.php' ?>