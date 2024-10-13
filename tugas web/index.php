<?php
include 'C:\xampp\htdocs\PHP\tugas web\include/header.php';

if(isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}
?>

<h1>Welcome to Inventory System</h1>
<p>Please login or register to continue.</p>

<?php include 'C:\xampp\htdocs\PHP\tugas web\include/footer.php'; ?>