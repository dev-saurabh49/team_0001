<?php
session_start();
if (!isset($_SESSION['user_id']) || !$_SESSION['user_id']) {
    header('Location: ../index.php');
    exit();
}

include 'head.php';

// Database connection (if not in head.php)
$host = 'localhost';
$dbname = 'team_0001';
$user = 'your_db_user';
$pass = 'your_db_pass';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch meetings ordered by meeting_date and meeting_time ascending
$stmt = $pdo->prepare("SELECT * FROM meetings ORDER BY meeting_date ASC, meeting_time ASC");
$stmt->execute();
$meetings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container my-5 py-4 bg-white shadow rounded-4" style="max-width:880px;">
    <div class="text-center mb-4">
        <h1 class="fw-bold" style="color:#20b2aa;">Meetings &amp; Schedule</h1>
        <p class="text-secondary fs-5 mb-2">Your upcoming and scheduled meetings are listed below.</p>
        <hr style="border-top:2px solid #20b2aa; opacity:0.3;">
    </div>

    <?php if (count($meetings) > 0): ?>
        <div class="card card-body border-0 shadow-sm mb-4 rounded-3">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="bg-light">
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($meetings as $meeting): ?>
                        <tr>
                            <td><?= htmlspecialchars(date('M j, Y', strtotime($meeting['meeting_date']))) ?></td>
                            <td><?= htmlspecialchars(date('g:i A', strtotime($meeting['meeting_time']))) ?></td>
                            <td><?= htmlspecialchars($meeting['title']) ?></td>
                            <td><?= htmlspecialchars($meeting['description']) ?></td>
                            <td><?= htmlspecialchars($meeting['location']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            No meetings scheduled.
        </div>
    <?php endif; ?>
</div>

<?php include 'foot.php'; ?>