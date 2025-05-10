<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error_message = "Email already exists. Please use another.";
    } else {
        if ($password == $confirm_password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);
            if ($stmt->execute()) {
                header("Location: login.php");
                exit;
            } else {
                $error_message = "Error occurred while creating the account. Please try again.";
            }
        } else {
            $error_message = "Password and confirmation do not match.";
        }
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color:rgb(255, 252, 246);
        }

        .wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-box {
            background-color: #FBFFE4;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            width: 100%;
        }

        .side-image {
            margin-left: 40px;
        }

        .side-image img {
            max-width: 350px;
            height: auto;
        }

        h2 {
            color: #FF731D;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-label {
            color: #333;
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #FF731D;
            box-shadow: 0 0 0 0.2rem rgba(255, 115, 29, 0.25);
        }

        .btn-primary {
            background-color: #FF731D;
            border: none;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #F7374F;
        }

        .alert-danger {
            border-radius: 8px;
            font-size: 14px;
            background-color: #FFF5F5;
            color: #D32F2F;
            border: 1px solid #D32F2F;
        }

        .text-center a {
            text-decoration: none;
            color: #81E7AF;
            font-weight: bold;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
            }

            .side-image {
                margin-left: 0;
                margin-top: 30px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="form-box">
            <h2>Create New Account</h2>

            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>

            <form method="post" class="mt-4">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Create Account</button>
            </form>

            <div class="mt-4 text-center">
                <a href="login.php">Already have an account? Sign in</a>
            </div>
        </div>

        <div class="side-image">
            <img src="images/Login-bro.png" alt="Illustration">
        </div>
    </div>
</body>

</html>
