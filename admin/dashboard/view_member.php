<?php
include "../../code/db_connection.php";
include "header.php";

// Get member ID from query string and sanitize
$member_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($member_id <= 0) {
    echo '<div class="container py-5"><div class="alert alert-danger">Invalid member ID.</div></div>';
    include "footer.php";
    exit;
}

// Fetch member details securely
$stmt = $conn->prepare("SELECT id, team_id, name, email, phone, profile_pic, status, is_blocked, created_at FROM members WHERE id = ?");
$stmt->bind_param("i", $member_id);
$stmt->execute();
$result = $stmt->get_result();
$member = $result->fetch_assoc();

if (!$member) {
    echo '<div class="container py-5"><div class="alert alert-warning">Member not found.</div></div>';
    include "footer.php";
    exit;
}

$default_avatar = "https://via.placeholder.com/150";
$profile_path = !empty($member['profile_pic']) ? '../../code/' . $member['profile_pic'] : $default_avatar;


// task
// Fetch tasks assigned to this member
$tasks_stmt = $conn->prepare("SELECT * FROM tasks WHERE member_id = ? ORDER BY assigned_at DESC");
$tasks_stmt->bind_param("i", $member_id);
$tasks_stmt->execute();
$tasks_result = $tasks_stmt->get_result();
$tasks = $tasks_result->fetch_all(MYSQLI_ASSOC);
$tasks_stmt->close();
?>

<div class="container py-5">
    <div class="card shadow-sm rounded-4 p-4">
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <img src="<?= htmlspecialchars($profile_path) ?>" alt="Profile Picture" class=" img-fluid" style="width: 350px; height:350px; border-radius:50%; object-fit:cover;object-position:center;border:5px solid lightseagreen;">
                <h3 class="mt-3"><?= htmlspecialchars($member['name']) ?></h3>
                <span class="badge <?= strtolower($member['status']) === 'active' ? 'bg-success' : 'bg-secondary' ?>">
                    <?= ucfirst($member['status']) ?>
                </span>
                <?php if ($member['is_blocked'] == 1): ?>
                    <span class="badge bg-danger ms-2">Blocked</span>
                <?php endif; ?>
            </div>

            <div class="col-md-8">
                <h2>Member Details</h2>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row" style="width: 150px;">Email</th>
                            <td><?= htmlspecialchars($member['email']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td><?= htmlspecialchars($member['phone']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Team ID</th>
                            <td><?= htmlspecialchars($member['team_id']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Joined On</th>
                            <td><?= date('d M Y', strtotime($member['created_at'])) ?></td>
                        </tr>
                    </tbody>
                </table>
                <h3 class="mt-5">Assigned Tasks</h3>

                <?php if (count($tasks) > 0): ?>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Assigned On</th>
                                <th>Completed On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tasks as $task): ?>
                                <tr>
                                    <td><?= htmlspecialchars($task['task_title']) ?></td>
                                    <td><?= htmlspecialchars($task['task_description']) ?></td>
                                    <td><?= htmlspecialchars($task['priority']) ?></td>
                                    <td>
                                        <span class="badge 
                            <?php
                                if ($task['status'] == 'Pending') echo 'bg-secondary';
                                elseif ($task['status'] == 'In Progress') echo 'bg-primary';
                                else echo 'bg-success';
                            ?>
                        ">
                                            <?= htmlspecialchars($task['status']) ?>
                                        </span>
                                    </td>
                                    <td><?= date('d M Y', strtotime($task['assigned_at'])) ?></td>
                                    <td><?= $task['completed_at'] ? date('d M Y', strtotime($task['completed_at'])) : '-' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info mt-3">No tasks assigned to this member.</div>
                <?php endif; ?>


                <div class="mt-4 d-flex gap-3">
                    <a href="edit_member.php?id=<?= $member['id'] ?>" class="btn btn-warning">
                        <i class="bi bi-pencil-square me-1"></i> Edit Member
                    </a>
                    <a href="./members.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Back to Members
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>