<?php
session_start();
require_once "../connect.php";

    // echo $_GET['username'];

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

        // Delete the product from the database
        $delete_query = "DELETE FROM products WHERE product_id = '$product_id'";
        if (mysqli_query($conn, $delete_query)) {
            // Redirect to manage_stock.php after successful deletion
            header('Location: products.php');
            exit();
        } else {
            echo "Error deleting Product: " . mysqli_error($conn);
        }
    } else {
        echo "Product not found.";
    }


mysqli_close($conn);