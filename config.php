<?php
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "shopping_store";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
