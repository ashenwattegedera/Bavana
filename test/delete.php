<?php
require_once("../connect.php");

// Check if 'id' is present in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // SQL query to delete the product by product_id
    $sql = "DELETE FROM products WHERE product_id = $product_id";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // After deletion, redirect back to the product list
        header("Location: products.php");
        exit(); // Ensure the script stops after redirection
    } else {
        // Show an error message if the deletion fails
        echo "Error deleting product: " . mysqli_error($conn);
    }
} else {
    // If 'id' is not provided in the URL
    echo "No product ID provided!";
}
?>
