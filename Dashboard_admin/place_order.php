<!DOCTYPE html>
<html lang="en">
<head>
    <title>Place Order</title>
    <link rel="stylesheet" href="../styles/dashbrd.css"> 
<body>
    <div class="container">

        <?php require_once "./side_bar.php"; ?>

            <div class="card-container">
                <div class="header">
                <h1>ORDERS</h1>
            </div>
        <?php
            require_once("../backend/connect.php");

            $sql = "SELECT * FROM purchase_orders";

            $result=mysqli_query($conn, $sql);
        ?>
        <?php

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Order id</th><th>Product id</th><th>Product name</th><th>Quantity</th><th>Order Date</th><th>Order status</th></tr>";
            
            while($row = mysqli_fetch_assoc($result)) 
            {
            echo '<tr>
                <td>'.$row['order_id'].'</td>
                <td>'.$row['product_id'].'</td>
                <td>'.$row['product_name'].'</td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['order_date'].'</td>';
            echo"<td>".$row['order_status']."</td>";
            
            echo '</tr>';
            }

            echo "</table>";
        } else {
            echo "<a class='no-add' href='add_user_form.php'>No Order Placed !</a>";
        }
        ?> 
    </div>

</body>
</html>
