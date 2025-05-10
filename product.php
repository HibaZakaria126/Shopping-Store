<?php
ob_start();
include 'config.php';

$product = null;

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM products WHERE id=$id");

    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= isset($product['product_name']) ? htmlspecialchars($product['product_name']) : 'Product Not Found' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, rgb(119, 216, 152), #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .product-card {
            max-width: 600px;
            margin: auto;
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .product-card img {
            object-fit: cover;
            height: 400px;
            width: 100%;
            border-bottom: 1px solid #ddd;
        }

        .product-card .card-body {
            padding: 2rem;
        }

        .product-card .card-title {
            color: #0d6efd;
            font-size: 1.75rem;
            font-weight: bold;
        }

        .product-card .card-text {
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .text-danger {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>

<body class="py-5">
    <div class="card product-card">
        <?php

        $imageFilename = isset($product['image']) ? basename($product['image']) : '';
        $imagePath = 'images/' . $imageFilename;

        if (!empty($imageFilename) && file_exists($imagePath)): ?>
            <img src="<?= htmlspecialchars($imagePath) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['product_name']) ?>">
        <?php else: ?>
            <div class="text-center p-4">
                <p class="text-danger">No image available for this product.</p>
            </div>
        <?php endif; ?>

        <div class="card-body">
            <?php if ($product): ?>
                <h3 class="card-title"><?= htmlspecialchars($product['product_name']) ?></h3>
                <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                <p class="card-text"><strong>Price: $<?= htmlspecialchars($product['price']) ?></strong></p>
            <?php else: ?>
                <p class="text-danger">Product not found.</p>
            <?php endif; ?>
            <a href="index.php" class="btn btn-primary mt-3">Back to Products</a>
        </div>
    </div>
</body>

</html>