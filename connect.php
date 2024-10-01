<?php

$servername = "localhost";
$username = "root";
$password = "Abadikoalam!123";
$dbname = "product_db";

$conn = new mysqli($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if (!($conn->query($sql) === TRUE)) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL
)";

if (!($conn->query($sql) === TRUE)) {
    die("Error creating table: " . $conn->error);
}

?>