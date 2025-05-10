<?php
$conn = new mysqli("localhost", "root", "", "shopping_store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

   
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $uploadDir = "uploads/";

        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imagePath = $uploadDir . basename($imageName);

       
        if (move_uploaded_file($imageTmp, $imagePath)) {
            
            $stmt = $conn->prepare("INSERT INTO products (product_name, price, description, image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sdss", $name, $price, $desc, $imagePath);
            $stmt->execute();
            $message = "<div class='alert alert-success'>Product added successfully.</div>";
        } else {
            $message = "<div class='alert alert-danger'>Failed to upload image.</div>";
        }
    } else {
        $message = "<div class='alert alert-danger'>No image uploaded or error occurred.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color:rgb(255, 255, 255); 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .form-container {
            max-width: 600px;
            margin: 80px auto;
            background-color:rgb(255, 208, 186);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #FF731D; 
        }

        .form-control:focus {
            border-color: #81E7AF; 
            box-shadow: 0 0 5px rgba(129, 231, 175, 0.5);
        }

        .btn-primary {
            background-color: #FF731D; 
            border: none;
            width: 100%;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #F7374F;
        }

        .alert-success {
            background-color: #81E7AF; 
            color: white;
        }

        .alert-danger {
            background-color: #F7374F; 
            color: white;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Add New Product</h2>

        <?= $message ?>

        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price ($)</label>
                <input type="number" name="price" step="0.01" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</body>

</html>
