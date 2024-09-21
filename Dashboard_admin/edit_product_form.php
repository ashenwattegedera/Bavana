<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="../styles/form.css"> 
</head>
<body>

    <div class="form-container">
        <h2>Edit Product</h2>

        <form action="edit_product_form.php?id=<?php echo $_GET['id']; ?>" method="POST">

            <label for="product_name">Product Name:</label>
            <input type="text" placeholder="Enter Product Name..." id="product_name" name="product_name" required>

            <label for="price">Price:</label>
            <input type="text" placeholder="Enter Price..." id="price" name="price" required>

            <input type="submit" value="Edit Product" name="update">
        </form>

        <a href="products.php"><button>BACK</button></a>

        <?php
        // Connect to the database
        require_once "../backend/connect.php";

        // Get the product id from the URL
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];

            // Fetch product details from the database
            $sql = "SELECT * FROM products WHERE product_id = $product_id";
            $result = mysqli_query($conn, $sql);
            $product = mysqli_fetch_assoc($result);
        }

        if (isset($_POST['update'])) {
            // Retrieve updated form data
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];

            // Update the product details in the database
            $sql = "UPDATE products SET product_name = '$product_name', price = $price WHERE product_id = $product_id";
            if (mysqli_query($conn, $sql)) {
                echo "Product updated successfully!";
                header("Location: products.php"); // Redirect to the product list after updating
            } else {
                echo "Error updating product: " . mysqli_error($conn);
            }
        }
        ?>

    </div>

</body>
</html>
