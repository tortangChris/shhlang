<?php
    include 'connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $product = $row['name'];
        $category = $row['category'];
        $price = $row['price'];
        $quantity = $row['quantity'];
    }

?>

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
        <input type="text" name="product" value="<?php echo $product; ?>">

        <label for="Category">Category:</label>
        <input type="text" name="category" value="<?php echo $category; ?>">

        <label for="Price">Price:</label>
        <input type="number" name="price" value="<?php echo $price; ?>">

        <label for="Quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $quantity; ?>">

        <input type="submit" value="Submit">    
    </form>

</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["product"]) && isset($_POST["category"]) && isset($_POST["price"]) && isset($_POST["quantity"])){
        $product = $_POST["product"];
        $category = $_POST["category"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        $sql = "UPDATE products SET name = ?, category = ?, price = ?, quantity = ? WHERE id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdi", $product, $category, $price, $quantity);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            header("Location: index.php?update_msg=You have successfully updated a product.");
            exit;
        }

    }
}

?>