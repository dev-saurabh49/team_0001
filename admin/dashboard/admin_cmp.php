<?php
session_start();
include '../../code/db_connection.php';


// Admin session check
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

$message = "";

if (isset($_GET['resolve']) && is_numeric($_GET['resolve'])) {
    $id = (int)$_GET['resolve'];
    $stmt = $conn->prepare("UPDATE complaints SET status = 'Resolved' WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    header("Location: ./admin_cmp.php");
    exit;
}

// Delete complaint
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM complaints WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    header("Location: ./admin_cmp.php");
    exit;
}

// Fetch complaints with member names
$complaints = $conn->query("SELECT c.*, m.name AS member_name FROM complaints c JOIN members m ON c.member_id = m.id ORDER BY c.created_at DESC");

include './header.php';
?>

<div class="container my-5">
    <h2 class="mb-4">Manage Member Complaints</h2>

    <?php if ($message): ?>
        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Complaint By</th>
                    <th>Complaint On</th>

                    <th>Subject</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Submitted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($complaints->num_rows > 0): ?>
                    <?php while ($row = $complaints->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['member_name']) ?></td>
                            <td><?= htmlspecialchars($row['submitted_by_name']) ?></td>
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
                            <td>
                                <?php if ($row['status'] !== 'Resolved'): ?>
                                    <a href="?resolve=<?= $row['id'] ?>" class="btn btn-sm btn-success" onclick="return confirm('Mark this complaint as resolved?')">Resolve</a>
                                <?php endif; ?>
                                <a href="?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this complaint?')">Delete</a>
                            </td>
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

<?php include './footer.php'; ?>