<?php include './header.php'; ?>

<style>
    .profile-card {
        border-radius: 1rem;
        padding: 2rem 2.5rem;
        box-shadow: 0 12px 24px rgba(13, 110, 253, 0.12);
        position: relative;
        background: var(--bs-body-bg);
        max-width: 720px;
        margin: auto;
    }

    .profile-avatar {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        border: 3px solid #0d6efd;
        box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
        object-fit: cover;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 1.75rem;
        flex-wrap: wrap;
    }

    .profile-header-info {
        flex-grow: 1;
        min-width: 190px;
    }

    .profile-header-info h1 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 2.3rem;
        margin-bottom: 0.25rem;
        color: #0d6efd;
    }

    .profile-header-info p.role {
        font-weight: 600;
        color: #6c757d;
        font-size: 1.05rem;
    }

    .btn-edit-profile {
        position: absolute;
        top: 1.5rem;
        right: 2.5rem;
        border-radius: 12px;
        padding: 0.5rem 1.25rem;
        font-weight: 600;
        transition: box-shadow 0.3s ease;
    }

    .btn-edit-profile:hover {
        box-shadow: 0 6px 16px rgba(13, 110, 253, 0.4);
    }

    .profile-info-grid {
        margin-top: 2.5rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.75rem 2.5rem;
        border-top: 1px solid #dee2e6;
        padding-top: 2rem;
    }

    .profile-info-item label {
        font-weight: 900;
        color: blue;
        font-size: 0.9rem;
        display: block;
        margin-bottom: 0.25rem;
    }

    .profile-info-item .value {
        font-weight: 700;
        color: lightseagreen;
        font-size: 1.1rem;
    }

    .bio-box {
        background-color: #f8f9fa;
        border-radius: 12px;
        padding: 1rem 1.25rem;
        font-size: 1rem;
        font-weight: 500;
        color: #212529;
        max-width: 100%;
        word-wrap: break-word;
    }

    /* Responsive */
    @media (max-width: 576px) {
        .profile-header {
            justify-content: center;
        }

        .btn-edit-profile {
            position: static;
            margin-top: 1.25rem;
            width: 100%;
        }
    }
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "team_0001";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../dashboard/login.php");
    exit;
}

$admin_id = $_SESSION['admin_id'];

// Fetch admin data including last_login
$stmt = $conn->prepare("SELECT name, email, bio, avatar, status, last_login FROM admins WHERE admin_id = ?");
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$stmt->bind_result($name, $email, $bio, $avatar, $status, $last_login);
$stmt->fetch();
$stmt->close();

$conn->close();
?>

<div class="profile-card">
    <button type="button" class="btn btn-primary btn-edit-profile">
        <i class="bi bi-pencil me-1"></i> Edit Profile
    </button>

    <div class="profile-header">
        <img
            src="../admin_img/rishabh.png"
            alt="Admin Avatar"
            class="profile-avatar"
            loading="lazy" />
        <div class="profile-header-info">
            <h1 class="text-center"><?php echo htmlspecialchars($name); ?></h1>
            <p class="role text-center"><?php echo htmlspecialchars($status); ?></p>
        </div>
    </div>

    <section class="profile-info-grid mt-4" aria-label="Profile information">
        <div class="profile-info-item">
            <label for="email">Email Address</label>
            <div class="value" id="email"><?php echo htmlspecialchars($email); ?></div>
        </div>
        <div class="profile-info-item">
            <label for="fullname">Full Name</label>
            <div class="value" id="fullname"><?php echo htmlspecialchars($name); ?></div>
        </div>
        <div class="profile-info-item">
            <label for="role-info">Role</label>
            <div class="value" id="role-info"><?php echo htmlspecialchars($status); ?></div>
        </div>
        <?php if ($status === 'Active' && !empty($last_login)) : ?>
            <div class="profile-info-item">
                <label for="last-login">Last Login</label>
                <div class="value" id="last-login">
                    <?php echo date("d M Y, h:i A", strtotime($last_login)); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="profile-info-item">
            <label for="bio">Bio</label>
            <div class="bio-box" id="bio">
                <?php echo !empty($bio) ? htmlspecialchars($bio) : "No bio provided."; ?>
            </div>
        </div>

        
    </section>
</div>



<?php include './footer.php'; ?>