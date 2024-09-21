<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales Record</title>
    <link rel="stylesheet" href="../styles/dashbrd.css"> 
<body>
    <div class="container">

            <?php require_once "./side_bar.php"; ?>
        <div class="card-container">
                    <div class="header">
                        <h1>Sales</h1>
                    </div>
                <?php
                    require_once("../backend/connect.php");

                    $sql = "SELECT * FROM sales";

                    $result=mysqli_query($conn, $sql);
                ?>
            <?php
                    if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Sales id</th><th>Product id</th><th>Quantity</th><th>Revenue</th><th>Sold On</th></tr>";
                    
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        echo "<tr><td>".$row['sale_id']."</td><td>".$row['product_id']."</td><td>".$row['quantity']."</td><td>".$row['revenue']."</td><td>".$row['sale_date']."</td></tr>";
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
