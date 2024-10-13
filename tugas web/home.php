<?php
include 'C:\xampp\htdocs\PHP\tugas web\include/header.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Welcome to Your Inventory System</h2>
<p>Here you can manage your inventory and view product details.</p>

<?php include 'C:\xampp\htdocs\PHP\tugas web\include/footer.php'; ?>