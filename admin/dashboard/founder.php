<?php
// founders.php
session_start();
include "./header.php";
include "./sidebar.php";
include "../../code/db_connection.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['name'] ?? '';
    $role     = $_POST['role'] ?? '';
    $bio      = $_POST['bio'] ?? '';
    $twitter  = $_POST['twitter'] ?? '';
    $linkedin = $_POST['linkedin'] ?? '';

    $photoPath = null;
    if (!empty($_FILES['photo']['name'])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['photo']['type'], $allowedTypes)) {
            $targetDir = "uploads/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

            $uniqueName = uniqid() . '-' . basename($_FILES["photo"]["name"]);
            $photoPath = $targetDir . $uniqueName;

            move_uploaded_file($_FILES["photo"]["tmp_name"], $photoPath);
        } else {
            echo "<div class='alert alert-danger'>Invalid file type. Only JPG, PNG, GIF allowed.</div>";
        }
    }

    // Example: insert into DB (adjust table/columns)
    if ($name && $role) {
        $stmt = $conn->prepare("INSERT INTO founders (name, role, bio, twitter, linkedin, photo) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $role, $bio, $twitter, $linkedin, $photoPath);
        $stmt->execute();
        $stmt->close();
        echo "<div class='alert alert-success'>Founder added successfully!</div>";
    }
}
?>

<!-- Main Content -->
<main class="flex-grow flex justify-center items-center p-6 bg-lightbg dark:bg-darkbg transition-colors">
    <form method="POST" enctype="multipart/form-data" class="w-full max-w-2xl bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gold p-8 space-y-6">
        <h2 class="text-3xl font-bold text-center text-gold mb-4">Add Founder</h2>

        <!-- Name -->
        <div>
            <label class="block text-lg font-semibold mb-2">Full Name</label>
            <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-gold dark:bg-gray-700" placeholder="Enter founder name">
        </div>

        <!-- Role -->
        <div>
            <label class="block text-lg font-semibold mb-2">Role/Title</label>
            <input type="text" name="role" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-gold dark:bg-gray-700" placeholder="e.g., CEO, Co-Founder">
        </div>

        <!-- Bio -->
        <div>
            <label class="block text-lg font-semibold mb-2">Short Bio</label>
            <textarea name="bio" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-gold dark:bg-gray-700" placeholder="Write a short bio..."></textarea>
        </div>

        <!-- Social Links -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-lg font-semibold mb-2">Twitter</label>
                <input type="url" name="twitter" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-gold dark:bg-gray-700" placeholder="https://twitter.com/username">
            </div>
            <div>
                <label class="block text-lg font-semibold mb-2">LinkedIn</label>
                <input type="url" name="linkedin" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-gold dark:bg-gray-700" placeholder="https://linkedin.com/in/username">
            </div>
        </div>

        <!-- Photo -->
        <div>
            <label class="block text-lg font-semibold mb-2">Upload Photo</label>
            <input type="file" name="photo" accept="image/*" class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-gold dark:bg-gray-700">
        </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit" class="px-6 py-3 bg-gold text-darkbg font-bold rounded-lg hover:bg-yellow-500 transition shadow-md">Save Founder</button>
        </div>
    </form>
</main>

<script>
    // Dark/Light Toggle
    const toggleBtn = document.getElementById('modeToggle');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        });
    }
</script>

<?php include "./footer.php"; ?>