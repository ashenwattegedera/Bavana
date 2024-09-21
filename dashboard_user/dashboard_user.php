<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/dashbrd.css"> 
<body>
    <div class="container">
        
<!-- SIDEBAR -->
    <?php require_once "./side_bar_user.php"; ?>
<!-- MAIN CONTENT -->
    <div class="card-container">
    <?php
        require_once "../backend/connect.php";

        $sql="SELECT count(*) FROM products";

        $result = mysqli_query($conn, $sql);
        $product_count = mysqli_fetch_array($result)[0];

        $sql = "SELECT count(*) FROM purchase_orders WHERE order_status != 'complete'";
        $result = mysqli_query($conn, $sql);
        $order_incomplete_count = mysqli_fetch_array($result)[0];

        $sql = "SELECT count(*) FROM purchase_orders WHERE order_status = 'complete'";
        $result = mysqli_query($conn, $sql);
        $order_complete_count = mysqli_fetch_array($result)[0];

    ?>

        <div class="header">
            <h1>Dashboard</h1>
            <!-- <button class="add-product">Add Products</button>    -->
        </div>
        <a class="change" href="products_user.php">
        <img src="../images_for dashbrd/product.png" alt="profile image">    
            <div class="card">
                <div>
                    <?php  echo $product_count;?>
                </div>
            </div>
        </a>
        <a class="change" href="order.php"> 
                <img src="../images_for dashbrd/order_complete.png" alt="profile image">
 
            <div class="card">
                        <?php  echo $order_incomplete_count + $order_complete_count;?>
            </div>
        </a>
              
    </div>
</body>
</html>
