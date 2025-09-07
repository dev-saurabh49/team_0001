<?php
session_start();
include '../../code/db_connection.php';
include './header.php';

// Check admin login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch vote records with poll question, option, user info
$query = "
    SELECT pv.id, pv.voted_at, pv.voter_ip,
       m.id AS member_id,
       m.name AS member_name,
       m.email AS member_email,
       p.question,
       o.option_text
FROM poll_votes pv
LEFT JOIN members m ON pv.user_id = m.id
JOIN polls p ON pv.poll_id = p.id
JOIN poll_options o ON pv.option_id = o.id
ORDER BY pv.voted_at DESC;

";

$result = $conn->query($query);
?>

<div class="container my-5" style="max-width: 900px;">
    <h2 class="mb-4 text-primary fw-bold">Poll Votes Log</h2>

    <?php if ($result->num_rows === 0): ?>
        <div class="alert alert-info">No votes have been cast yet.</div>
    <?php else: ?>
        <table class="table table-striped table-hover shadow-sm rounded">
            <thead class="table-primary">
                <tr>
                    <th>Vote ID</th>
                    <th>Voter Name</th>
                    <th>Voter IP</th>
                    <th>Poll Question</th>
                    <th>Selected Option</th>
                    <th>Voted At</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($vote = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $vote['id'] ?></td>
                        <td><?= htmlspecialchars($vote['user_name'] ?? 'Anonymous') ?></td>
                        <td><?= htmlspecialchars($vote['voter_ip']) ?></td>
                        <td><?= htmlspecialchars($vote['question']) ?></td>
                        <td><?= htmlspecialchars($vote['option_text']) ?></td>
                        <td><?= htmlspecialchars(date('Y-m-d H:i:s', strtotime($vote['voted_at']))) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<!-- Bootstrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />