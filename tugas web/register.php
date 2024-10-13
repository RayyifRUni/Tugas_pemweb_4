<?php
include 'C:\xampp\htdocs\PHP\tugas web\include/header.php';
include 'C:\xampp\htdocs\PHP\tugas web\config/database.php';

if(isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $password])) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Registration failed";
    }
}
?>

<h2>Register</h2>
<?php if (isset($error)) echo "<p>$error</p>"; ?>
<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

<?php include 'C:\xampp\htdocs\PHP\tugas web\include/footer.php'; ?>