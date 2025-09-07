<?php
include './db_connection.php'; // your mysqli connection

// Handle block/unblock actions
if (isset($_GET['id'], $_GET['action'])) {
    $member_id = intval($_GET['id']);
    $action = $_GET['action'];
    if (in_array($action, ['block', 'unblock'])) {
        $is_blocked = ($action === 'block') ? 1 : 0;
        $stmt = $conn->prepare("UPDATE members SET is_blocked=? WHERE id=?");
        $stmt->bind_param("ii", $is_blocked, $member_id);
        $stmt->execute();
        $stmt->close();
        header("Location: block_members.php"); // reload page
        exit;
    }
}

// Fetch all members
$sql = "SELECT id, name, email, is_blocked, status FROM members ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<?php include './header.php'; ?>

<div class="container py-5">
    <h3 class="mb-4">Block / Unblock Members</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Block Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($result && $result->num_rows > 0): ?>
                    <?php $count = 1; ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td>
                                <?php if(strtolower($row['status']) === 'active'): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary"><?php echo htmlspecialchars($row['status']); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($row['is_blocked']): ?>
                                    <span class="badge bg-danger">Blocked</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Not Blocked</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($row['is_blocked']): ?>
                                    <a href="block_members.php?id=<?php echo $row['id']; ?>&action=unblock" class="btn btn-success btn-sm">
                                        <i class="bi bi-unlock"></i> Unblock
                                    </a>
                                <?php else: ?>
                                    <a href="block_members.php?id=<?php echo $row['id']; ?>&action=block" class="btn btn-danger btn-sm">
                                        <i class="bi bi-lock"></i> Block
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No members found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include './footer.php'; ?>
<?php $conn->close(); ?>
