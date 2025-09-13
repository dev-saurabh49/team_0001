<?php
session_start();
include '../../code/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php'); // redirect if user not logged in
    exit;
}

// Fetch all meetings
$stmt = $conn->prepare("SELECT * FROM meetings ORDER BY meeting_date DESC, meeting_time DESC");
$stmt->execute();
$meetings = $stmt->get_result();
$stmt->close();
?>

<?php include './new_head.php'; ?>

<div class="container my-5">
    <h2 class="mb-4 text-center text-warning">All Meetings</h2>

    <?php if ($meetings->num_rows > 0): ?>
        <div class="row g-3">
            <?php while ($row = $meetings->fetch_assoc()): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card premium-card shadow-sm p-3 h-100">
                        <h5 class="card-title mb-2"><?= htmlspecialchars($row['title']) ?></h5>
                        <p class="card-text mb-1"><?= nl2br(htmlspecialchars($row['description'])) ?></p>
                        <p class="mb-1"><strong>Date:</strong> <?= htmlspecialchars($row['meeting_date']) ?></p>
                        <p class="mb-1"><strong>Time:</strong> <?= htmlspecialchars($row['meeting_time']) ?></p>
                        <p class="mb-1"><strong>Location:</strong> <?= htmlspecialchars($row['location']) ?></p>
                        <p class="text-muted mb-0"><small>Created at: <?= htmlspecialchars($row['created_at']) ?></small></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="text-center text-muted">No meetings scheduled.</div>
    <?php endif; ?>
</div>

<?php include './foot.php'; ?>

<style>
    .premium-card {
        border-radius: 1rem;
        transition: transform 0.2s;
    }

    .premium-card:hover {
        transform: translateY(-4px);
    }
</style>