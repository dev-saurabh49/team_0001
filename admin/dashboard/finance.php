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

// Handle add financial record
if (isset($_POST['add_finance'])) {
    $type = $_POST['finance_type']; // Income or Expense
    $amount = floatval($_POST['amount']);
    $description = trim($_POST['finance_description']);
    $date = $_POST['finance_date'];

    if ($amount > 0 && $date) {
        $stmt = $conn->prepare("INSERT INTO financial_records (type, amount, description, record_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('sdss', $type, $amount, $description, $date);
        $stmt->execute();
        $stmt->close();

        $message = "Financial record added successfully!";
    } else {
        $message = "Please enter valid amount and date.";
    }
}

// Handle add inventory item
if (isset($_POST['add_inventory'])) {
    $item_name = trim($_POST['item_name']);
    $quantity = intval($_POST['quantity']);
    $location = trim($_POST['inventory_location']);

    if ($item_name && $quantity > 0) {
        $stmt = $conn->prepare("INSERT INTO inventory_items (item_name, quantity, location) VALUES (?, ?, ?)");
        $stmt->bind_param('sis', $item_name, $quantity, $location);
        $stmt->execute();
        $stmt->close();

        $message = "Inventory item added successfully!";
    } else {
        $message = "Please enter valid item name and quantity.";
    }
}

// Fetch financial records
$financialRecords = $conn->query("SELECT * FROM financial_records ORDER BY record_date DESC");

// Fetch inventory items
$inventoryItems = $conn->query("SELECT * FROM inventory_items ORDER BY item_name ASC");

?>

<div class="container my-5">
    <h2 class="mb-4">Financial and Inventory Management</h2>

    <?php if ($message): ?>
        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <div class="row g-4">
        <!-- Financial Records Management -->
        <div class="col-md-6">
            <div class="card shadow-sm rounded p-3">
                <h5>Add Financial Record</h5>
                <form method="POST" novalidate>
                    <div class="mb-3">
                        <label for="finance_type" class="form-label">Type</label>
                        <select name="finance_type" id="finance_type" class="form-select" required>
                            <option value="Income">Income</option>
                            <option value="Expense">Expense</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" step="0.01" name="amount" id="amount" class="form-control" placeholder="Enter amount" required>
                    </div>
                    <div class="mb-3">
                        <label for="finance_date" class="form-label">Date</label>
                        <input type="date" name="finance_date" id="finance_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="finance_description" class="form-label">Description</label>
                        <textarea name="finance_description" id="finance_description" rows="2" class="form-control" placeholder="Optional description"></textarea>
                    </div>
                    <button type="submit" name="add_finance" class="btn btn-primary">Add Record</button>
                </form>
            </div>
        </div>

        <!-- Inventory Management -->
        <div class="col-md-6">
            <div class="card shadow-sm rounded p-3">
                <h5>Add Inventory Item</h5>
                <form method="POST" novalidate>
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Enter item name" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Enter quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="inventory_location" class="form-label">Location</label>
                        <input type="text" name="inventory_location" id="inventory_location" class="form-control" placeholder="Optional location">
                    </div>
                    <button type="submit" name="add_inventory" class="btn btn-primary">Add Item</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Records List -->
    <div class="row mt-5">
        <div class="col-md-6">
            <h5>Financial Records</h5>
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($financialRecords->num_rows > 0): ?>
                        <?php while ($row = $financialRecords->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['type']) ?></td>
                                <td><?= number_format($row['amount'], 2) ?></td>
                                <td><?= htmlspecialchars($row['record_date']) ?></td>
                                <td><?= htmlspecialchars($row['description']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No financial records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h5>Inventory Items</h5>
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($inventoryItems->num_rows > 0): ?>
                        <?php while ($row = $inventoryItems->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['item_name']) ?></td>
                                <td><?= (int)$row['quantity'] ?></td>
                                <td><?= htmlspecialchars($row['location']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">No inventory items found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>