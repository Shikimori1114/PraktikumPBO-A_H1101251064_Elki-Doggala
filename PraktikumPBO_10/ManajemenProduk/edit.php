<?php
require_once 'Product.php';

$id = $_GET['id'] ?? null;
$data = Product::findById($id);

if (!$data) {
    die("Data tidak ditemukan!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = new Product();
    $product->setNama($_POST['nama'])
            ->setHarga($_POST['harga'])
            ->setStok($_POST['stok'])
            ->update($id);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { max-width: 300px; }
        label { display: block; margin-top: 10px; margin-bottom: 5px; }
        input { width: 100%; padding: 5px; }
        .btn-group { margin-top: 15px; }
    </style>
</head>
<body>
    <h2>Edit Produk</h2>
    <form method="POST">
        <label>Nama Produk:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
        
        <label>Harga:</label>
        <input type="number" name="harga" value="<?= $data['harga'] ?>" required>
        
        <label>Stok:</label>
        <input type="number" name="stok" value="<?= $data['stok'] ?>" required>
        
        <div class="btn-group">
            <button type="submit">Update Data</button>
            <a href="index.php"><button type="button">Batal</button></a>
        </div>
    </form>
</body>
</html>