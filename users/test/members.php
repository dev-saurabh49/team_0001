<?php
include "./user_session.php";
include "../../code/db_connection.php"; // adjust path if needed

// Pagination setup
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch members from DB
$query = "SELECT id, name, email, avatar FROM members LIMIT $start, $limit";
$result = mysqli_query($conn, $query);

// Count total members for pagination
$total_query = "SELECT COUNT(*) as total FROM members";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_members = $total_row['total'];
$total_pages = ceil($total_members / $limit);
?>
<?php include "./new_head.php"?>
    <h2 class="text-warning mb-4">Team Members</h2>

    <div class="list-group">
        <?php while($member = mysqli_fetch_assoc($result)): ?>
            <div class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center mb-2 rounded">
                <div class="d-flex align-items-center">
                    <img src="<?= $member['avatar'] ?: '../../assets/default-avatar.png' ?>" alt="Avatar" class="avatar me-3" style="width:50px; height:50px; border-radius:50%; object-fit:cover;">
                    <div>
                        <h5 class="mb-0 text-warning"><?= $member['name'] ?></h5>
                        <small class="text-muted"><?= $member['email'] ?></small>
                    </div>
                </div>
                <div>
                    <a href="./user_profile.php?id=<?= $member['id'] ?>" class="btn btn-sm btn-gold me-2"><i class="bi bi-eye"></i> View</a>
                    <a href="./messages.php?to=<?= $member['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="bi bi-chat-dots"></i> Contact</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination mt-4">
            <?php for($i=1; $i<=$total_pages; $i++): ?>
                <li class="page-item <?= ($i==$page) ? 'active' : '' ?>">
                    <a class="page-link bg-dark text-warning" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</main>

<style>
    .btn-gold { background-color: #d4af37; color: #111; }
    .btn-gold:hover { background-color: #f0e68c; color: #111; }
</style>
