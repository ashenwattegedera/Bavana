<?php
require_once("../backend/connect.php");

$sql = "SELECT * FROM products";

$result=mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/dashbrd.css"> 
<body>
    
<div class="container">

        <?php require_once "./side_bar_user.php"; ?>

            <div class="card-container">
                <div class="header">
                <h1>PLACE ORDER</h1>
                <a class="add-product" href="sell_form.php">Sell Product</a>
            </div>
            <?php
            require_once("../backend/connect.php");

            $sql = "SELECT * FROM products";

            $result=mysqli_query($conn, $sql);
        ?>

        <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Image</th><th>id</th><th>name</th><th>price</th><th>quantity</th></tr>";
            
                while($row = mysqli_fetch_assoc($result)) 
                {
                    echo "<tr><td><img src='".$row['product_image']."'/></td><td>".$row['product_id']."</td><td>".$row['product_name']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td>";
                    "</tr>";
                    
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
