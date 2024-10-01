<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Create Data</title>
</head>
<body>
    
    <form class="form-container" method="post">
        <label for="Product">Product:</label>
        <input type="text" name="product">

        <label for="Category">Category:</label>
        <input type="text" name="category">

        <label for="Price">Price:</label>
        <input type="number" name="price">

        <label for="Quantity">Quantity:</label>
        <input type="number" name="quantity">

        <input type="submit" value="Submit">    
    </form>

</body>
</html>

<?php

include 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["product"]) && isset($_POST["category"]) && isset($_POST["price"]) && isset($_POST["quantity"])){
        $product = $_POST["product"];
        $category = $_POST["category"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        $sql = "INSERT into products (name, category, price, quantity) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdi", $product, $category, $price, $quantity);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            header("Location: index.php");
            exit;
        }

    }
}

?>