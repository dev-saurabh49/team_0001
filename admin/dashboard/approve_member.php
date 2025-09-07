<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "team_0001";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$member_id = $_GET['id'] ?? 0;

// Initialize variables
$name = $email = $status = $team_id = '';
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $team_id = trim($_POST['team_id'] ?? '');

    if (!empty($team_id) && preg_match("/^[A-Za-z0-9_]+$/", $team_id)) {
        $update = $conn->prepare("UPDATE members SET status='Active', team_id=? WHERE id=?");
        $update->bind_param("si", $team_id, $member_id);

        if ($update->execute()) {
            $status = 'Active'; // immediately reflect the change

            // --- Log approval activity ---
            $activityStmt = $conn->prepare("INSERT INTO member_activity (member_id, activity_type) VALUES (?, 'approved')");
            $activityStmt->bind_param("i", $member_id);
            $activityStmt->execute();
            $activityStmt->close();
            // ----------------------------

        } else {
            $error = "⚠ Failed to update member.";
        }

        $update->close();
    } else {
        $error = "⚠ Please enter a valid Team ID (letters, numbers, underscores only).";
    }
}

// Fetch member details (after possible update)
$stmt = $conn->prepare("SELECT name, email, status FROM members WHERE id = ?");
$stmt->bind_param("i", $member_id);
$stmt->execute();
$stmt->bind_result($name, $email, $status);
$stmt->fetch();
$stmt->close();
?>

<?php include './header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-gradient bg-primary text-white text-center rounded-top-4">
                    <h4 class="mb-0"><i class="bi bi-check-circle me-2"></i> Approve Member</h4>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <p><strong class="text-primary">Name:</strong> <?php echo htmlspecialchars($name); ?></p>
                        <p><strong class="text-primary">Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                        <p>
                            <strong class="text-primary">Current Status:</strong>
                            <?php if (trim(strtolower($status)) === 'active'): ?>
                                <span class="badge bg-success">Active</span>
                            <?php else: ?>
                                <span class="badge bg-secondary"><?php echo htmlspecialchars($status); ?></span>
                            <?php endif; ?>
                        </p>
                    </div>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="team_id" class="form-label fw-bold">Assign Team ID</label>
                            <input type="text"
                                   class="form-control shadow-sm"
                                   id="team_id"
                                   name="team_id"
                                   placeholder="Enter Team ID (e.g., Member_01)"
                                   required
                                   pattern="[A-Za-z0-9_]+"
                                   title="Team ID can include letters, numbers, and underscores"
                                   value="<?php echo htmlspecialchars($team_id); ?>">

                            <div class="invalid-feedback">Team ID is required (letters, numbers, underscores only).</div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-success w-50">
                                <i class="bi bi-check-circle me-1"></i> Approve & Assign
                            </button>
                            <a href="members.php" class="btn btn-outline-secondary w-50">
                                <i class="bi bi-arrow-left me-1"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center small text-muted">
                    Approved members will be moved to their assigned team.
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>

<script>
    // Bootstrap form validation
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
    })();
</script>
