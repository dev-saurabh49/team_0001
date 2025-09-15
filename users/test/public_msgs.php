<?php
session_start();
include "../../code/db_connection.php";

// Agar login nahi hai to redirect
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

// $user_id = $_SESSION['user_id'];

// Sirf us user ke messages laao
$sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);
?>
<?php include "./new_head.php"; ?>

<div class="container my-5">
    <h2 class="mb-4 text-warning">Messages</h2>

    <div class="table-responsive">
        <table class="table table-dark table-hover table-bordered align-middle">
            <thead class="table-warning text-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['c_name']) ?></td>
                            <td><?= htmlspecialchars($row['c_email']) ?></td>
                            <td><?= nl2br(htmlspecialchars($row['c_msg'])) ?></td>
                            <td><?= $row['created_at'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No messages found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "./foot.php"; ?>