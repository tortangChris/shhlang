<?php

include 'connect.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id = $id";
    $result = $conn->query($sql);

    if(!$result) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }else{
        header("Location: index.php?delete_msg=You have successfully deleted a product.");
        exit;
    }

}

?>
