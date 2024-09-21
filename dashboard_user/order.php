
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Orders</title>
    <link rel="stylesheet" href="../styles/dashbrd.css"> 
<body>

    <div class="container">
        <?php require_once "./side_bar_user.php"; ?>

            <div class="card-container">
                <div class="header">
                <h1>ORDERS</h1>
                <a class="add-product" href="place_order_form.php">Place Order</a>
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

                if($row['order_status']=='pending') {echo ' <td>
                
                    <a href="../backend/order_status.php?order_id='.$row['order_id'].'&status=complete" class="done">Done</a>
                    <a href="../backend/order_status.php?order_id='.$row['order_id'].'&status=incomplete" class="cancel">Cancel</a>

                </td>';}
                else{
                        echo "<td>".$row['order_status']."</td>";
                }

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
