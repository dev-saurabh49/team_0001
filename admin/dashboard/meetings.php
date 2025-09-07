<?php
session_start();
include '../../code/db_connection.php'; // Your DB connection
include './header.php'; // Include header

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

$message = "";

// Handle add meeting form submission
if (isset($_POST['add_meeting'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = trim($_POST['location']);

    if ($title && $date && $time) {
        $stmt = $conn->prepare("INSERT INTO meetings (title, description, meeting_date, meeting_time, location) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $title, $description, $date, $time, $location);
        $stmt->execute();
        $stmt->close();

        $message = "Meeting added successfully!";
    } else {
        $message = "Please fill in all required fields (Title, Date, Time).";
    }
}

// Handle delete meeting
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $del_id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM meetings WHERE id = ?");
    $stmt->bind_param('i', $del_id);
    $stmt->execute();
    $stmt->close();
    header("Location: meetings.php");
    exit;
}

// Fetch all meetings ordered by date and time
$meetings = $conn->query("SELECT * FROM meetings ORDER BY meeting_date ASC, meeting_time ASC");
?>

<div class="container my-5">
    <h2 class="mb-4">Manage Meetings</h2>

    <?php if ($message): ?>
        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <!-- Add Meeting Form -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            Add New Meeting
        </div>
        <div class="card-body">
            <form method="POST" novalidate>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Meeting Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter meeting title" required>
                    </div>
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="time" class="form-label">Time <span class="text-danger">*</span></label>
                        <input type="time" name="time" id="time" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" id="location" class="form-control" placeholder="Enter location (optional)">
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control" placeholder="Enter meeting details (optional)"></textarea>
                    </div>
                </div>
                <button type="submit" name="add_meeting" class="btn btn-primary mt-3">Add Meeting</button>
            </form>
        </div>
    </div>

    <!-- Meetings List -->
    <h4>Upcoming Meetings</h4>
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>Title</th>
                <th>Date & Time</th>
                <th>Location</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($meetings->num_rows > 0): ?>
                <?php while ($row = $meetings->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars($row['meeting_date']) . ' ' . htmlspecialchars($row['meeting_time']) ?></td>
                        <td><?= htmlspecialchars($row['location']) ?></td>
                        <td><?= htmlspecialchars($row['description']) ?></td>
                        <td>
                            <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this meeting?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No meetings found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include './footer.php'; ?>