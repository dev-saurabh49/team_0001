<?php
session_start();
include '../../code/db_connection.php';
include './functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$message = "";

// Mark task as completed
if (isset($_GET['complete']) && is_numeric($_GET['complete'])) {
    $task_id = (int)$_GET['complete'];
    $stmt = $conn->prepare("UPDATE tasks SET status='Completed', completed_at=NOW() WHERE id=? AND member_id=?");
    $stmt->bind_param("ii", $task_id, $user_id);

    if ($stmt->execute()) {
        $message = "Task marked as completed.";

        // Log activity
        $activity_text = "Completed task ID $task_id";
        logActivity($conn, $user_id, $activity_text, 'task');
    }
    $stmt->close();
}

// Fetch tasks for logged-in user
$stmt = $conn->prepare("SELECT * FROM tasks WHERE member_id=? ORDER BY assigned_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$tasks = $stmt->get_result();
$stmt->close();
?>

<?php include './new_head.php'; ?>

<div class="container my-5">
    <h2 class="mb-4 text-warning">My Tasks</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <div class="row g-3">
        <?php if ($tasks->num_rows > 0): ?>
            <?php while ($row = $tasks->fetch_assoc()): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card  p-3 shadow-sm h-100">
                        <h5 class="mb-2"><?= htmlspecialchars($row['task_title']) ?></h5>
                        <p class="mb-1"><?= nl2br(htmlspecialchars($row['task_description'])) ?></p>
                        <p class="mb-1">
                            <strong>Priority:</strong>
                            <?php
                            switch ($row['priority']) {
                                case 'High':
                                    echo '<span class="badge bg-danger">High</span>';
                                    break;
                                case 'Medium':
                                    echo '<span class="badge bg-warning text-dark">Medium</span>';
                                    break;
                                default:
                                    echo '<span class="badge bg-secondary">Low</span>';
                            }
                            ?>
                        </p>
                        <p class="mb-1">
                            <strong>Status:</strong>
                            <?php if ($row['status'] === 'Completed'): ?>
                                <span class="badge bg-success">Completed</span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark">Pending</span>
                            <?php endif; ?>
                        </p>
                        <p class="mb-1"><strong>Assigned At:</strong> <?= $row['assigned_at'] ?></p>
                        <p class="mb-1"><strong>Completed At:</strong> <?= $row['completed_at'] ?? '-' ?></p>
                        <?php if ($row['status'] !== 'Completed'): ?>
                            <a href="task.php?complete=<?= $row['id'] ?>" class="btn btn-sm btn-success w-100 mt-2">Mark Completed</a>


                        <?php else: ?>
                            <button class="btn btn-sm btn-secondary mt-2 w-100" disabled>Completed</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12 text-center text-muted">No tasks assigned.</div>
        <?php endif; ?>
    </div>

</div>

<?php include './foot.php'; ?>