<?php
    require_once("connect.php");

    if (isset($_GET['order_id']) ) {
        
        $order_id = $_GET['order_id'];
        $status = $_GET['status'];
        $sql = "UPDATE purchase_orders SET order_status = '$status' WHERE order_id = $order_id";

        if (mysqli_query($conn, $sql)) {
            // echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

    }

    if ($status == 'complete') {
    
        // Fetch the order details
        $sql_order = "SELECT * FROM purchase_orders WHERE order_id = $order_id";
        $result_order = mysqli_query($conn, $sql_order);
        $order = mysqli_fetch_assoc($result_order);

        // Fetch the current product quantity from the products table
        $product_id = $order['product_id'];
        $ordered_quantity = $order['quantity'];

        $sql_product = "SELECT quantity FROM products WHERE product_id = $product_id";
        $result_product = mysqli_query($conn, $sql_product);
        $product = mysqli_fetch_assoc($result_product);

        // Calculate the new quantity
        $new_quantity = $product['quantity'] + $ordered_quantity;

        if ($new_quantity >= 0) {
            // Update the product quantity in the products table
            $sql_update_product = "UPDATE products SET quantity = $new_quantity WHERE product_id = $product_id";
            mysqli_query($conn, $sql_update_product);

            // Update the order status to 'complete'
            $sql_update_order = "UPDATE purchase_orders SET order_status = 'complete' WHERE product_id = $product_id";
            mysqli_query($conn, $sql_update_order);

            echo "Order completed and product quantity updated!";
                header("Location: ../dashboard_user/order.php");
            exit();
        } 
        else {
            echo "Insufficient stock!";
        }
    } 
    elseif ($status == 'incomplete') {
        // Simply update the order status to 'incomplete'
        $sql_update_order = "UPDATE purchase_orders SET order_status = 'incomplete' WHERE order_id = $order_id";
        mysqli_query($conn, $sql_update_order);
        echo "Order marked as incomplete.";
        header("Location: ../dashboard_user/order.php");
    }

    mysqli_close($conn);
?>
