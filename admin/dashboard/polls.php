<?php
session_start();
include '../../code/db_connection.php';
include './header.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

$message = "";
$error = "";

// Handle poll creation form submission
if (isset($_POST['create_poll'])) {
    $question = trim($_POST['question']);
    // Filter and sanitize options, removing empty ones
    $options = array_filter(array_map('trim', $_POST['options'] ?? []));

    if ($question && count($options) >= 2) { // Require minimum 2 options
        $stmt = $conn->prepare("INSERT INTO polls (question) VALUES (?)");
        $stmt->bind_param('s', $question);
        if ($stmt->execute()) {
            $poll_id = $stmt->insert_id;
            $stmt->close();

            // Insert options
            $optionStmt = $conn->prepare("INSERT INTO poll_options (poll_id, option_text) VALUES (?, ?)");
            foreach ($options as $opt) {
                $optionStmt->bind_param('is', $poll_id, $opt);
                $optionStmt->execute();
            }
            $optionStmt->close();

            $message = "Poll created successfully.";
        } else {
            $error = "Failed to create poll. Please try again.";
        }
    } else {
        $error = "Please enter a question and at least two options.";
    }
}
?>

<div class="container my-5">
    <h2>Create New Poll</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" novalidate>
        <div class="mb-3">
            <label for="question" class="form-label">Poll Question</label>
            <input type="text" id="question" name="question" class="form-control" required placeholder="Enter poll question">
        </div>

        <label class="form-label">Options (at least 2):</label>
        <div id="options-container" class="mb-3">
            <input type="text" name="options[]" class="form-control mb-2" placeholder="Option 1" required>
            <input type="text" name="options[]" class="form-control mb-2" placeholder="Option 2" required>
        </div>

        <button id="add-option" type="button" class="btn btn-secondary mb-3">Add More Option</button>
        <br>

        <button type="submit" name="create_poll" class="btn btn-primary">Create Poll</button>
    </form>
</div>

<script>
    // Add new option input dynamically
    document.getElementById('add-option').addEventListener('click', function() {
        const container = document.getElementById('options-container');
        const optionCount = container.querySelectorAll('input[name="options[]"]').length + 1;

        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'options[]';
        input.className = 'form-control mb-2';
        input.placeholder = 'Option ' + optionCount;
        container.appendChild(input);
    });
</script>

<?php include './footer.php'; ?>