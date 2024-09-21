<?php
require_once("../connect.php");

// Check if the product ID is set in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch the current product details from the database
    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);

    // Check if the product exists
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Product not found!";
        exit();
    }
}

// Update the product if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Update query
    $update_sql = "UPDATE products SET 
                    product_name = '$product_name', 
                    price = '$price', 
                    quantity = '$quantity' 
                    WHERE product_id = $product_id";

    if (mysqli_query($conn, $update_sql)) {
        // Redirect back to the product list after the update
        header("Location: products.php");
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="dashbrd.css">
</head>
<body>

<div class="container">
    <!-- Edit Product Form -->
    <h1>Edit Product</h1>

    <form action="" method="POST">
        <div>
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>" required>
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>" required>
        </div>
        <button type="submit">Update Product</button>
    </form>
</div>

</body>
</html>
