<?php
    require_once "../backend/connect.php";

    $sql="SELECT count(*) FROM users";

    $result = mysqli_query($conn, $sql);
    $user_count = mysqli_fetch_array($result)[0];

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
                    <h1>ADMIN Dashboard</h1>
                </div>

                <a class="change" href="user.php">
                    <img src="../images_for dashbrd/Users.png" alt="profile image">
                    <div class="card">
                        <div>
                            <?php  echo $user_count;?>
                        </div>
                    </div>
                </a>
                
                <a class="change" href="products.php">
                    <img src="../images_for dashbrd/product.png" alt="profile image">    
                    <div class="card">
                    <div>
                        <?php  echo $product_count;?>
                    </div>
                    </div>
                </a>>
                
                <a class="change" href="place_order.php">  
                    <img src="../images_for dashbrd/order_complete.png" alt="profile image">
                    <div class="card1">
                            <?php  echo $order_complete_count;?>
                    </div>  
                </a>

                <a class="change" href="place_order.php"> 
                    <img src="../images_for dashbrd/order_pending.png" alt="profile image">    
                    <div class="card2">
                        <?php  echo $order_incomplete_count;?>
                    </div>
                </a>

                <a class="change" href="records.php" >
                    <img src="../images_for dashbrd/reports.png" alt="profile image">
                    <div class="card">
                        <?php  echo $order_incomplete_count + $order_complete_count;?>
                    </div>
                </a>               
            </div>
        </div>    
    </body>
</html>
