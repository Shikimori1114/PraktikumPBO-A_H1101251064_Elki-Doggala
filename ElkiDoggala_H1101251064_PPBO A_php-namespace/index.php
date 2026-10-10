<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Services\ProductService;

try {
    $productService = new ProductService();

    $product1 = $productService->createProduct("Laptop LOQ", 12500000);
    $product2 = $productService->createProduct("Mouse Wireless", 150000);

    echo $productService->displayProduct($product1) . "<br>";
    echo $productService->displayProduct($product2) . "<br>";
} catch (Throwable $e) {
    echo "Terjadi Error: " . $e->getMessage();
}