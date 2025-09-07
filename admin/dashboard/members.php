<?php
include '../../code/db_connection.php'; // Database connection
include './header.php';

// Fetch all members
$sql = "SELECT id, team_id, name, email, phone, profile_pic, status, is_blocked, created_at 
        FROM members 
        ORDER BY created_at DESC";

$result = $conn->query($sql);

// Debugging
if (!$result) {
    die("<div class='alert alert-danger'>Query Failed: " . $conn->error . "</div>");
}
?>

<div class="container py-5">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">All Members</h4>
            <!-- Button to Open Add Member Modal -->
            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                <i class="bi bi-plus-circle me-1"></i> Add Member
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <?php if ($result->num_rows > 0): ?>
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Team ID</th>
                                <th>Status</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td>
                                        <?php
                                        $default_avatar = "https://via.placeholder.com/40";
                                        $profile_path = !empty($row['profile_pic']) ? '../../code/' . $row['profile_pic'] : $default_avatar;
                                        ?>
                                        <img src="<?= $profile_path; ?>" alt="Profile" class="rounded-circle" width="40" height="40">
                                    </td>
                                    <td><?= htmlspecialchars($row['name']); ?></td>
                                    <td><?= htmlspecialchars($row['email']); ?></td>
                                    <td><?= htmlspecialchars($row['phone']); ?></td>
                                    <td><?= $row['team_id']; ?></td>
                                    <td>
                                        <?php if (strtolower($row['status']) === 'active'): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= date("d M Y", strtotime($row['created_at'])); ?></td>
                                    <td>
                                        <div class="d-flex flex-column flex-sm-row flex-wrap gap-1">
                                            <a href="view_member.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-info" title="View">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="edit_member.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="delete_member.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <?php if (strtolower($row['status']) !== 'active'): ?>
                                                <a href="approve_member.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-success" title="Approve">
                                                    <i class="bi bi-check-circle"></i>
                                                </a>
                                            <?php endif; ?>
                                            <?php if ($row['is_blocked'] == 1): ?>
                                                <a href="block_member.php?id=<?= $row['id']; ?>&action=unblock" class="btn btn-sm btn-success" title="Unblock">
                                                    <i class="bi bi-unlock"></i> Unblock
                                                </a>
                                            <?php else: ?>
                                                <a href="block_member.php?id=<?= $row['id']; ?>&action=block" class="btn btn-sm btn-danger" title="Block">
                                                    <i class="bi bi-lock"></i> Block
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>

                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-warning text-center">No members found. Please add some members.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<?php $conn->close(); ?>