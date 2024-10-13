<?php
include 'C:\xampp\htdocs\PHP\tugas web\include/header.php';
include 'C:\xampp\htdocs\PHP\tugas web\config/database.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM barang");
$barang = $stmt->fetchAll();
?>

<h2>List Barang</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Action</th>
    </tr>
    <?php foreach ($barang as $item): ?>
    <tr>
        <td><?= $item['id'] ?></td>
        <td><?= htmlspecialchars($item['nama']) ?></td>
        <td><?= number_format($item['harga'], 0, ',', '.') ?></td>
        <td><a href="detail_barang.php?id=<?= $item['id'] ?>">Detail</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include 'C:\xampp\htdocs\PHP\tugas web\include/footer.php'; ?>