<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

?>

<?php include "includes/header.php" ?>
<?php include "../Admin/includes/sidebar.php" ?>

<div class="content">
    <h3 class="mb-4">Users Management</h3>
    <div class="d-flex justify-content-between mb-3">
        <input type="text" class="form-control w-50" placeholder="Search Users...">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="fa fa-plus"></i> Add User
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped text-light">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fetch users dynamically via PHP -->
                <tr>
                    <td>1</td>
                    <td>Rishabh Shukla</td>
                    <td>rishabh12@gmail.com</td>
                    <td>Admin</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td>
                        <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include "includes/footer.php"; ?>