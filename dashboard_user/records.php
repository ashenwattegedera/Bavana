<?php
require_once("../backend/connect.php");

$sql = "SELECT * FROM purchase_orders";

$result=mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>purchase Order</title>
    <link rel="stylesheet" href="dashbrd.css"> 
<body>
    <div class="container">
<!-- SIDEBAR -->
<?php require_once "./side_bar_user.php"; ?>
<!-- MAIN CONTENT -->
<div class="card-container">
<div class="header">
    <h1>Records</h1>
</div>
<?php

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Order id</th><th>Product id</th><th>Quantity</th><th>Order Date</th><th>Order Status</th></tr>";
    
    while($row = mysqli_fetch_assoc($result)) 
    {
        echo "<tr><td>".$row['order_id']."</td><td>".$row['product_id']."</td><td>".$row['quantity']."</td><td>".$row['order_date']."</td><td>".$row['order_status']."</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}
?> 
</div>

</body>
</html>
