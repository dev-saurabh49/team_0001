<?php
include "../../code/db_connection.php";
include "header.php";

$activityQuery = "
    SELECT ma.*, m.name, m.email
    FROM member_activity ma
    JOIN members m ON ma.member_id = m.id
    ORDER BY ma.activity_time DESC
";
$result = $conn->query($activityQuery);

function activityInfo($type)
{
    switch ($type) {
        case 'register':
            return ['bg-success', 'bi-person-plus-fill', 'Registered'];
        case 'login':
            return ['bg-primary', 'bi-box-arrow-in-right', 'Login'];
        case 'logout':
            return ['bg-secondary', 'bi-box-arrow-right', 'Logout'];
        case 'approved':
            return ['bg-success', 'bi-check-circle-fill', 'Approved'];
        case 'blocked':
            return ['bg-danger', 'bi-lock-fill', 'Blocked'];
        case 'unblocked':
            return ['bg-warning text-dark', 'bi-unlock-fill', 'Unblocked'];
        default:
            return ['bg-info', 'bi-info-circle-fill', 'No activity found'];
    }
}
?>

<div class="container my-4">
    <h4 class="fw-bold mb-4">Recent Activities</h4>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Activity</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $serial = 1;
                if ($result && $result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                        [$badgeClass, $iconClass, $label] = activityInfo($row['activity_type']);
                        $time = date("d M Y, H:i", strtotime($row['activity_time']));
                ?>
                        <tr>
                            <td><?= $serial ?></td>
                            <td>
                                <span class="avatar bg-warning text-dark rounded-circle fw-bold d-inline-flex justify-content-center align-items-center me-2" style="width:35px; height:35px;">
                                    <?= strtoupper($row['name'][0]) ?>
                                </span>
                                <?= htmlspecialchars($row['name']) ?>
                            </td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td>
                                <span class="badge <?= $badgeClass ?>">
                                    <i class="<?= $iconClass ?> me-1"></i>
                                    <?= $label ?>
                                </span>
                            </td>
                            <td><?= $time ?></td>
                            <td>
                                <form action="delete_activity.php" method="post" onsubmit="return confirm('Delete this activity?')" class="d-inline">
                                    <input type="hidden" name="activity_id" value="<?= $row['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Activity">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        $serial++;
                    endwhile;
                else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-warning">No recent activities found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "footer.php"; ?>