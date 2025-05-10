<?php
session_start();
include 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
            exit;
        } else {
            $error = 'Incorrect password.';
        }
    } else {
        $error = 'User not found.';
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <style>
        body {
            background-color:rgb(255, 255, 255);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-wrap: wrap;
            gap: 30px;
        }

        .image-side {
            max-width: 400px;
        }

        .image-side img {
            width: 100%;
            height: auto;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background-color: #FBFFE4;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #FF731D;
            border: none;
        }

        .btn-primary:hover {
            background-color: #F7374F;
        }

        .form-control:focus {
            border-color: #81E7AF;
            box-shadow: 0 0 5px rgba(129, 231, 175, 0.6);
        }

        h2 {
            text-align: center;
            color: #FF731D;
            margin-bottom: 20px;
        }

        .text-center a {
            color: #81E7AF;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .alert-danger {
            font-size: 14px;
            color: #F7374F;
            background-color:rgb(255, 246, 247);
            border: none;
        }
        .input-group .input-group-text {
    background-color: transparent; 
    border-left: none;            
    border-radius: 0 0.375rem 0.375rem 0; 
    color: #FF731D;               
}

.input-group .form-control {
    border-right: none; 
    text-align: right;  
}

.input-group {
    direction: rtl; 
}

    </style>
</head>
<body>

<div class="main-container">
    <div class="image-side">
        <img src="images/Online shopping-bro.png" alt="Shopping Image">
    </div>

    <div class="login-container">
        <h2>Login</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
        </form>
        <div class="mt-3 text-center">
            <a href="register.php">Don't have an account? Register</a>
        </div>
    </div>
</div>

</body>
</html>
