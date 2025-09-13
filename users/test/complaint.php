<?php
session_start();
include '../../code/db_connection.php';
include "./functions.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$message = "";

// Current logged-in user info
$submitter_id = $_SESSION['user_id'];
$submitter_name = $_SESSION['user_name'];

// Handle new complaint submission
if (isset($_POST['add_complaint'])) {
    $member_id = intval($_POST['member_id']);
    $subject = trim($_POST['subject']);
    $details = trim($_POST['details']);

    if ($member_id > 0 && $subject && $details) {
        // Insert complaint
        $stmt = $conn->prepare("INSERT INTO complaints (member_id, submitted_by, submitted_by_name, subject, details, status, created_at) VALUES (?, ?, ?, ?, ?, 'Pending', NOW())");
        $stmt->bind_param('iisss', $member_id, $submitter_id, $submitter_name, $subject, $details);
        $stmt->execute();
        $stmt->close();

        // Log activity dynamically
        $activity_text = "Submitted a complaint to member ID {$_SESSION['user_name']}: $subject";
        logActivity($conn, $submitter_id, $activity_text, 'complaint_submitted');

        $message = "Complaint submitted successfully.";
    } else {
        $message = "Please fill all fields.";
    }
}

// Mark complaint resolved
if (isset($_GET['resolve']) && is_numeric($_GET['resolve'])) {
    $id = (int)$_GET['resolve'];
    $stmt = $conn->prepare("UPDATE complaints SET status = 'Resolved' WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    header("Location: complaints.php");
    exit;
}

// Delete complaint
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM complaints WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    header("Location: complaints.php");
    exit;
}

// Fetch members for select dropdown
$members = $conn->query("SELECT id, name FROM members ORDER BY name ASC");

// Fetch complaints submitted by logged-in user
$stmt = $conn->prepare("
    SELECT c.*, m.name AS member_name 
    FROM complaints c 
    JOIN members m ON c.member_id = m.id 
    WHERE c.submitted_by = ? 
    ORDER BY c.created_at DESC
");
$stmt->bind_param("i", $submitter_id);
$stmt->execute();
$complaints = $stmt->get_result();
$stmt->close();
?>

<?php include './new_head.php'; ?>
<div class="container my-5">
    <h2 class="mb-4">Member Complaints</h2>

    <?php if ($message): ?>
        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <!-- Add Complaint Form -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Submit New Complaint</div>
        <div class="card-body">
            <form method="POST" novalidate>
                <input type="hidden" name="submitted_by" value="<?= htmlspecialchars($submitter_id) ?>">
                <input type="hidden" name="submitted_by_name" value="<?= htmlspecialchars($submitter_name) ?>">

                <div class="mb-3">
                    <label for="member_id" class="form-label">Select Member</label>
                    <select name="member_id" id="member_id" class="form-select" required>
                        <option value="">-- Select Member --</option>
                        <?php while ($row = $members->fetch_assoc()): ?>
                            <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" required placeholder="Enter complaint subject">
                </div>
                <div class="mb-3">
                    <label for="details" class="form-label">Details</label>
                    <textarea name="details" id="details" rows="4" class="form-control" required placeholder="Enter complaint details"></textarea>
                </div>
                <button type="submit" name="add_complaint" class="btn btn-primary">Submit Complaint</button>
            </form>
        </div>
    </div>

    <!-- Complaints List -->
    <h4>All Complaints You Submitted</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Member</th>
                    <th>Subject</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($complaints->num_rows > 0): ?>
                    <?php while ($row = $complaints->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['member_name']) ?></td>
                            <td><?= htmlspecialchars($row['subject']) ?></td>
                            <td><?= nl2br(htmlspecialchars($row['details'])) ?></td>
                            <td>
                                <?php if ($row['status'] === 'Resolved'): ?>
                                    <span class="badge bg-success">Resolved</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($row['created_at']) ?></td>

                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No complaints found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'foot.php'; ?>