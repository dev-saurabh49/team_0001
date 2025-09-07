<?php
session_start();
include '../../code/db_connection.php';

// Get selected poll ID from query string or default to latest poll
$poll_id = isset($_GET['poll_id']) ? (int) $_GET['poll_id'] : 0;
$message = "";

// Fetch all polls for dropdown
$allPollsResult = $conn->query("SELECT id, question FROM polls ORDER BY created_at DESC");
$allPolls = [];
while ($row = $allPollsResult->fetch_assoc()) {
    $allPolls[$row['id']] = $row['question'];
}

// If no poll selected, use most recent poll
if ($poll_id === 0 && count($allPolls) > 0) {
    $poll_id = array_key_first($allPolls);
}

// Handle vote submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['option_id']) && isset($_POST['poll_id'])) {
    $option_id = (int) $_POST['option_id'];
    $poll_id_post = (int) $_POST['poll_id'];

    $user_id = $_SESSION['member_id'] ?? null;  // logged-in member id or NULL for guests
    $voter_ip = $_SERVER['REMOTE_ADDR'];

    // Check if already voted by this user or IP on this poll
    if ($user_id !== null) {
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM poll_votes WHERE poll_id = ? AND user_id = ?");
        $checkStmt->bind_param('ii', $poll_id_post, $user_id);
    } else {
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM poll_votes WHERE poll_id = ? AND voter_ip = ?");
        $checkStmt->bind_param('is', $poll_id_post, $voter_ip);
    }

    $checkStmt->execute();
    $checkStmt->bind_result($voteCount);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($voteCount > 0) {
        $message = "You have already voted in this poll.";
    } else {
        // Proceed with vote insertion (same as before)
        $conn->begin_transaction();

        $stmt = $conn->prepare("UPDATE poll_options SET votes = votes + 1 WHERE id = ?");
        $stmt->bind_param('i', $option_id);

        if ($stmt->execute()) {
            $stmt->close();

            $insertStmt = $conn->prepare("INSERT INTO poll_votes (poll_id, option_id, user_id, voter_ip) VALUES (?, ?, ?, ?)");
            $insertStmt->bind_param('iiis', $poll_id_post, $option_id, $user_id, $voter_ip);

            if ($insertStmt->execute()) {
                $message = "Thank you for voting!";
                $conn->commit();
            } else {
                $message = "Failed to record your vote details. Please try again.";
                $conn->rollback();
            }
            $insertStmt->close();
        } else {
            $message = "Failed to record your vote. Please try again.";
            $conn->rollback();
        }
    }
}


// Fetch the selected poll question and options
$poll = null;
$options = [];

if (array_key_exists($poll_id, $allPolls)) {
    $poll = ['id' => $poll_id, 'question' => $allPolls[$poll_id]];
    $stmt = $conn->prepare("SELECT id, option_text FROM poll_options WHERE poll_id = ?");
    $stmt->bind_param('i', $poll_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($opt = $result->fetch_assoc()) {
        $options[] = $opt;
    }
    $stmt->close();
}
?>

<?php include "./header.php"; ?>
<div class="container my-5" style="max-width: 650px;">
    <h1 class="mb-4 text-primary fw-bold">Team 0001 Polls</h1>

    <?php if (empty($allPolls)): ?>
        <div class="alert alert-warning">No polls available at the moment.</div>
    <?php else: ?>
        <form method="GET" class="mb-4">
            <label for="pollSelect" class="form-label fw-semibold">Select Poll:</label>
            <select name="poll_id" id="pollSelect" class="form-select" onchange="this.form.submit()">
                <?php foreach ($allPolls as $id => $question): ?>
                    <option value="<?= $id ?>" <?= $id == $poll_id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($question) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <noscript><button type="submit" class="btn btn-primary mt-2">View Poll</button></noscript>
        </form>

        <?php if ($poll): ?>
            <h3 class="mb-3"><?= htmlspecialchars($poll['question']) ?></h3>

            <?php if ($message): ?>
                <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <?php if (empty($message)): ?>
                <form method="POST" class="bg-white p-4 rounded shadow-sm border">
                    <input type="hidden" name="poll_id" value="<?= $poll['id'] ?>">
                    <?php foreach ($options as $opt): ?>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="option_id" id="option_<?= $opt['id'] ?>" value="<?= $opt['id'] ?>" required />
                            <label class="form-check-label fs-5" for="option_<?= $opt['id'] ?>">
                                <?= htmlspecialchars($opt['option_text']) ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-gradient-primary w-100 fw-semibold fs-5">Vote</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>

<style>
    .btn-gradient-primary {
        background: linear-gradient(90deg, #1e3c72, #2a5298);
        border: none;
        color: white;
        transition: background 0.3s ease;
    }

    .btn-gradient-primary:hover,
    .btn-gradient-primary:focus {
        background: linear-gradient(90deg, #2a5298, #1e3c72);
        color: white;
    }
</style>

<?php include "./footer.php" ?>