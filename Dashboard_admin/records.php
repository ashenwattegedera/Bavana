


<!DOCTYPE html>
<html lang="en">
<head>
    <title>purchase Order</title>
    <link rel="stylesheet" href="../styles/dashbrd.css"> 
<body>
    <div class="container">

            <?php require_once "./side_bar.php"; ?>
        <div class="card-container">
                    <div class="header">
                        <h1>Records</h1>
                    </div>
                <?php
                    require_once("../backend/connect.php");

                    $sql = "SELECT * FROM purchase_orders";

                    $result=mysqli_query($conn, $sql);
                ?>
            <?php
                    if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Order id</th><th>Product id</th><th>Quantity</th><th>Order Date</th><th>Order Status</th></tr>";
                    
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        echo "<tr><td>".$row['order_id']."</td><td>".$row['product_id']."</td><td>".$row['quantity']."</td><td>".$row['order_date']."</td><td>".$row['order_status']."</td></tr>";
                    }

                    echo "</table>";
                } 
                else {
                    echo "<a class='no-add' href='add_product_form.php'>No Product Added !</a>";
                }
            ?>
        </div>     

    </div>

</body>
</html>
