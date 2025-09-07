<?php
session_start();
include '../../code/db_connection.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include './header.php';

// Admin authentication
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$message = "";

// Fetch members
$members = $conn->query("SELECT id, name, email FROM members ORDER BY name ASC");

// Handle task assignment
if (isset($_POST['assign_task'])) {
    $member_id = isset($_POST['member_id']) ? intval($_POST['member_id']) : 0;
    $task_title = trim($_POST['task_title']);
    $task_description = trim($_POST['task_description']);
    $priority = $_POST['priority'];
    $status = 'Pending';
    $assigned_at = date('Y-m-d H:i:s');

    if ($member_id <= 0) {
        $message = "Please select a valid member to assign the task.";
    } else {
        // Insert task
        $stmt = $conn->prepare("INSERT INTO tasks (member_id, task_title, task_description, priority, status, assigned_at) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $member_id, $task_title, $task_description, $priority, $status, $assigned_at);
        $stmt->execute();
        $stmt->close();

        // Log activity
        $activity_type = 'task_assigned';
        $activity_stmt = $conn->prepare("INSERT INTO member_activity (member_id, activity_type, activity_time) VALUES (?, ?, ?)");
        $activity_stmt->bind_param("iss", $member_id, $activity_type, $assigned_at);
        $activity_stmt->execute();
        $activity_stmt->close();

        $message = "Task assigned successfully!";
    }
}

// Fetch all tasks
$tasks = $conn->query("SELECT t.*, m.name FROM tasks t JOIN members m ON t.member_id = m.id ORDER BY t.assigned_at DESC");

// Fetch recent activities (last 10)
$activities = $conn->query("SELECT ma.*, m.name, m.email 
                            FROM member_activity ma
                            LEFT JOIN members m ON ma.member_id = m.id
                            ORDER BY ma.activity_time DESC 
                            LIMIT 10");
?>

<style>
body { font-family: 'Roboto', sans-serif; background: #f7f9fc; margin: 0; padding: 0; }
.container { width: 90%; max-width: 1200px; margin: 40px auto; }
h2 { text-align: center; color: #333; }
form { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 40px; }
input, select, textarea { width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc; }
button { padding: 12px 20px; background: #4CAF50; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
button:hover { background: #45a049; }
table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
table th, table td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
table th { background: #f4f4f4; }
.alert { padding: 10px; border-radius: 5px; margin-bottom: 20px; }
.alert-success { background: #dff0d8; color: #3c763d; }
.card { background: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px; }
.card-header { font-weight: bold; }
.list-group-item { display: flex; justify-content: space-between; align-items: center; }
</style>

<div class="container">
    <h2 class="mb-4">Assign Task to Members</h2>

    <?php if($message): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="member_id">Select Member:</label>
            <select name="member_id" id="member_id" class="form-select" required>
                <option value="">-- Choose Member --</option>
                <?php while ($row = $members->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?> (<?= htmlspecialchars($row['email']) ?>)</option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="task_title">Task Title:</label>
            <input type="text" name="task_title" id="task_title" class="form-control" placeholder="Enter task title" required>
        </div>

        <div class="mb-3">
            <label for="task_description">Task Description:</label>
            <textarea name="task_description" id="task_description" rows="4" class="form-control" placeholder="Enter task details" required></textarea>
        </div>

        <div class="mb-3">
            <label for="priority">Priority:</label>
            <select name="priority" id="priority" class="form-select" required>
                <option value="">-- Select Priority --</option>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
        </div>

        <button type="submit" name="assign_task" class="btn btn-success">Assign Task</button>
    </form>

    <h2 class="mt-5 mb-4">All Assigned Tasks</h2>
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Task Title</th>
                    <th>Member</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Assigned At</th>
                </tr>
            </thead>
            <tbody>
                <?php while($task = $tasks->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($task['task_title']) ?></td>
                        <td><?= htmlspecialchars($task['name']) ?></td>
                        <td><?= htmlspecialchars($task['task_description']) ?></td>
                        <td><?= htmlspecialchars($task['priority']) ?></td>
                        <td><?= htmlspecialchars($task['status']) ?></td>
                        <td><?= htmlspecialchars($task['assigned_at']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <h2 class="mb-4">Recent Activities</h2>
    <div class="card mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <span><i class="bi bi-bell"></i> Recent Activities</span>
            <span class="badge bg-light text-dark"><?= $activities->num_rows ?? 0 ?> records</span>
        </div>
        <div class="card-body" style="max-height: 300px; overflow-y: auto;">
            <ul class="list-group list-group-flush">
                <?php if($activities && $activities->num_rows > 0):
                    $sn = 1;
                    while($row = $activities->fetch_assoc()): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-secondary me-2"><?= $sn++ ?></span>
                                <strong><?= htmlspecialchars($row['name'] ?? 'Unknown') ?></strong>
                                (<?= htmlspecialchars($row['email'] ?? 'N/A') ?>)
                                <?= htmlspecialchars($row['activity_type'] ?? 'Not found') ?>
                            </div>
                            <small class="text-muted"><?= date("d M Y H:i", strtotime($row['activity_time'])) ?></small>
                        </li>
                    <?php endwhile;
                else: ?>
                    <li class="list-group-item text-center text-muted">No recent activity.</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
