<?php include './header.php'; ?>
<?php include '../../code/db_connection.php'; ?>

<div class="container py-5">
    <h2 class="mb-4 text-warning">Add New Gallery Item</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $category = $_POST['category'];

        // File upload handling
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . time() . "_" . $fileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $stmt = $conn->prepare("INSERT INTO gallery (title, image, category) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $title, $targetFilePath, $category);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Image uploaded successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Database error: " . $stmt->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Failed to upload image.</div>";
        }
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data" class="bg-dark p-4 rounded shadow-lg">
        <div class="mb-3">
            <label class="form-label text-light">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Category</label>
            <select name="category" class="form-select" required>
                <option value="">-- Select Category --</option>
                <option value="birthday">Birthday</option>
                <option value="meetup">Meetup</option>
                <option value="celebration">Celebration</option>
                <option value="journey">Journey</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-warning">Upload</button>
    </form>
</div>

<?php include './footer.php'; ?>