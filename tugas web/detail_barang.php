<?php
include 'C:\xampp\htdocs\PHP\tugas web\include/header.php';
include 'C:\xampp\htdocs\PHP\tugas web\config/database.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list_barang.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM barang WHERE id = ?");
$stmt->execute([$id]);
$barang = $stmt->fetch();

if (!$barang) {
    echo "Barang tidak ditemukan";
    exit();
}
?>

<h2>Detail Barang</h2>
<p>ID: <?= $barang['id'] ?></p>
<p>Nama: <?= htmlspecialchars($barang['nama']) ?></p>
<p>Harga: Rp <?= number_format($barang['harga'], 0, ',', '.') ?></p>
<p>Deskripsi: <?= htmlspecialchars($barang['deskripsi']) ?></p>

<a href="list_barang.php">Kembali ke List Barang</a>

<?php include 'C:\xampp\htdocs\PHP\tugas web\include/footer.php'; ?>