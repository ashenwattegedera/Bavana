<?php
    require_once '../backend/connect.php'; 
    $errMsg = '';
    $successMsg = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data and trim extra spaces
        $product_id = trim($_POST['product_id']);
        $product_name = trim($_POST['product_name']);
        $quantity = trim($_POST['quantity']);
        $order_status = 'pending';

        // Validate input fields
        if (empty($product_id) || empty($product_name) || empty($quantity)) {
            $errMsg = 'All fields are required.';
        } 
        else{

            // Check if product exists
            $checkProductSQL = "SELECT * FROM products WHERE product_id = '$product_id' AND product_name = '$product_name'";
            $checkProductResult = mysqli_query($conn, $checkProductSQL);

            if (mysqli_num_rows($checkProductResult) > 0) {
                // Product exists, add the order
                $sql = "INSERT INTO purchase_orders(product_id, product_name, quantity, order_status) 
                        VALUES ('$product_id', '$product_name', '$quantity', '$order_status')";
                $result = mysqli_query($conn, $sql);

                if ($result === TRUE) {
                    $successMsg = 'Order placed successfully!';
                } 
                
                else {
                    $errMsg = 'Error placing the order. Please try again.';
                }
            } 

            else {
                // Product does not exist
                $errMsg = 'Product does not exist in the database. Please check the Product ID and Name.';
            }
        }

        // Close the database connection
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Place Order</title>
    <link rel="stylesheet" href="../styles/form.css">
    <style>
        /* CSS for error and success messages */
        .errMsg {
            color: #ff4d4d; /* Red for error */
            background-color: #ffe6e6; /* Light red background */
            border: 1px solid #ff4d4d;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            font-size: 14px;
            font-weight: bold;
            display: none; /* Initially hidden */
        }

        .successMsg {
            color: #4CAF50; /* Green for success */
            background-color: #e6ffe6; /* Light green background */
            border: 1px solid #4CAF50;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            font-size: 14px;
            font-weight: bold;
            display: none; /* Initially hidden */
        }

        /* Show messages if they are not empty */
        .show {
            display: block;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Place Order</h2>

        <form action="place_order_form.php" method="POST">
            <label for="product_id">Product ID:</label>
            <input type="text" placeholder="Enter Product ID..." id="product_id" name="product_id" required>

            <label for="product_name">Product Name:</label>
            <input type="text" placeholder="Enter Product Name..." id="product_name" name="product_name" required>

            <label for="quantity">Quantity:</label>
            <input type="number" placeholder="Enter Quantity..." id="quantity" name="quantity" required>

            <input type="submit" value="Place Order">
        </form>

        <a href="place_order.php"><button>BACK</button></a>
        <br>

        <!-- Display error or success message if they exist -->
        <span class="errMsg <?php echo !empty($errMsg) ? 'show' : ''; ?>"><?php echo $errMsg; ?></span>
        <span class="successMsg <?php echo !empty($successMsg) ? 'show' : ''; ?>"><?php echo $successMsg; ?></span>
    </div>
</body>
</html>
