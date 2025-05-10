<?php
include 'config.php';
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: rgb(255, 255, 255);
            color: #333;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #FF731D;
        }

        .navbar a {
            color: white !important;
            text-transform: uppercase;
            font-weight: bold;
        }

        .navbar a:hover {
            background-color: #e96210;
            color: white !important;
        }

        .navbar-brand {
            font-size: 2rem;
            font-family: 'Verdana', sans-serif;
            color: white !important;
        }

        .product-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #FBFFE4;
            color: #000;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .product-card .card-body {
            padding: 16px;
        }

        .product-card .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .product-card .card-text {
            font-size: 0.9rem;
            color: #666;
        }

        .product-card .price {
            font-size: 1.1rem;
            color: #81E7AF;
            font-weight: bold;
        }

        .product-card .btn {
            background-color: #FF731D;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            width: 100%;
            font-weight: bold;
            text-transform: uppercase;
        }

        .product-card .btn:hover {
            background-color: #e96210;
        }

        .container {
            margin-top: 40px;
        }

        .footer {
            background-color: #000;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <span class="navbar-brand">My Shop</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mb-4">Product List</h1>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card product-card">
                        <?php
                        $imagePath = !empty($row['image']) ? 'images/' . basename($row['image']) : '';
                        ?>
                        <?php if (!empty($imagePath) && file_exists($imagePath)): ?>
                            <img src="<?= $imagePath ?>" class="card-img-top" alt="<?= htmlspecialchars($row['product_name']) ?>">
                        <?php else: ?>
                            <img src="default.jpg" class="card-img-top" alt="No image available">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['product_name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
                            <p class="price">$<?= htmlspecialchars($row['price']) ?></p>
                            <a href="product.php?id=<?= $row['id'] ?>" class="btn">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 My Shop. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>