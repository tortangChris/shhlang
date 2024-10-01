<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Crud Application</title>
</head>
<body>
    <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php

                include 'connect.php';

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td><a class='btn-delete' href='deletedata.php?id=" . $row['id'] . "'>Delete</a>  <a class='btn-update' href='updatedata.php?id=" . $row['id'] . "'>Update</a></td>";
                    echo "</tr>";
                }

                
            ?>
        </tbody>
    </table>

    <div class="button-container">
        <a href="createdata.php" class="btn-add">Add</a>
    </div>
    </div>

    
</body>
</html>

<script>
    const deleteButtons = document.querySelectorAll('.btn-delete');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const result = confirm("Are you sure you want to delete this item?");
            
            if (result) {
                window.location.href = this.getAttribute('href');
            }
        });
    });
</script>

