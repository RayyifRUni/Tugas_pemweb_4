<?php
include 'C:\xampp\htdocs\PHP\tugas web\include/header.php';
include 'C:\xampp\htdocs\PHP\tugas web\config/database.php';

if(isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<h2>Login</h2>
<?php if (isset($error)) echo "<p>$error</p>"; ?>
<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<?php include 'C:\xampp\htdocs\PHP\tugas web\include/footer.php'; ?>