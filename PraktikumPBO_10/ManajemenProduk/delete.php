<?php
require_once 'Product.php';

$id = $_GET['id'] ?? null;
if ($id) {
    Product::delete($id);
}

header("Location: index.php");
exit;
?>