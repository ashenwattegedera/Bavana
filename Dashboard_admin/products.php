
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../styles/dashbrd.css"> 
    </head>
<body>
    
<div class="container">
    
    <!-- SIDEBAR -->
    <?php require_once "./side_bar.php"; ?>
    
    <!-- MAIN CONTENT -->
    <div class="card-container">
        <div class="header">
            <h1>PRODUCTS</h1>
            <a class="add-product" href="addproduct_form.php">Add Products</a>   
        </div>
        <?php
            require_once("../backend/connect.php");

            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);
        ?>

        <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Image</th><th>id</th><th>name</th><th>price<br>(Rs.)</th><th>quantity</th><th>Edit/Remove</th></tr>";
                
                while ($row = $result -> fetch_assoc()) {
                    echo "<tr>
                            <td><img width='60px' src='" . $row['product_image'] . "'/></td>
                            <td>" . $row['product_id'] . "</td>
                            <td>" . $row['product_name'] . "</td>
                            <td>" . $row['price'] . "</td>
                            <td>" . $row['quantity'] . "</td>
                            <td>
                                <a href='edit_product_form.php?id=". $row['product_id'] ."'>Edit</a>
                                <a href='../backend/delete_product.php?id=" . $row['product_id'] . "' onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</a>
                            </td>
                        </tr>";
                }

                    echo "</table>";
            }
            else {
                    echo "<a class='no-add' href='add_user_form.php'>No Order Placed !</a>";

            }
        ?>
    </div>
</div>
</body>
</html>
