<?php
require_once 'Product.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = new Product();
    $product->setNama($_POST['nama'])
            ->setHarga($_POST['harga'])
            ->setStok($_POST['stok'])
            ->save();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { max-width: 300px; }
        label { display: block; margin-top: 10px; margin-bottom: 5px; }
        input { width: 100%; padding: 5px; }
        .btn-group { margin-top: 15px; }
    </style>
</head>
<body>
    <h2>Tambah Produk</h2>
    <form method="POST">
        <label>Nama Produk:</label>
        <input type="text" name="nama" required>
        
        <label>Harga:</label>
        <input type="number" name="harga" required>
        
        <label>Stok:</label>
        <input type="number" name="stok" required>
        
        <div class="btn-group">
            <button type="submit">Simpan</button>
            <a href="index.php"><button type="button">Batal</button></a>
        </div>
    </form>
</body>
</html>