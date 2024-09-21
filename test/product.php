<?php
require_once("../connect.php");

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../Dashboard2\sidebar\dashbrd.css"> 
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <?php require_once "../Dashboard2\sidebar\side_bar.php"; ?>

    <!-- MAIN CONTENT -->
    <div class="card-container test">
        <div class="header">
            <h1>PRODUCTS</h1>
            <a class="add-product" href="addproduct_form.php">Add Products</a>   
        </div>

        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Image</th><th>id</th><th>name</th><th>price</th><th>quantity</th><th>Actions</th></tr>";
        
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><img width='60px' src='".$row['product_image']."'/></td>";
                echo "<td>".$row['product_id']."</td>";
                echo "<td>".$row['product_name']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['quantity']."</td>";
                // Edit and Delete buttons
                echo "<td>
                        <a href='edit.php?id=".$row['product_id']."'>Edit</a> | 
                        <a href='edit.php?id=".$row['product_id']."' onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</a>
                     </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "0 results";
        }
        ?> 
    </div>
</div>

</body>
</html>
