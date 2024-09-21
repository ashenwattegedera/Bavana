<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sell Item</title>
    <link rel="stylesheet" href="../styles/form.css"> 
</head>
<body>

    <div class="form-container">
        <h2>Sell Item</h2>

        <form action="" method="POST" enctype="multipart/form-data">
            <label for="product_id">Product ID:</label>
            <input type="text" placeholder="Enter Product ID..." id="product_id" name="product_id" required>

            <label for="quantity">Quantity:</label>
            <input type="number" placeholder="Enter Quantity..." id="quantity" name="quantity" required>

            <input type="submit" value="Sell Item">
        </form>

        <a href="products_user.php"><button>BACK</button></a>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Capture form data
                $product_id = (int) $_POST['product_id'];
                $quantity_sold = (int) $_POST['quantity'];

                require_once("../backend/connect.php");

                // Fetch the price of the product
                $sql_price = "SELECT price FROM products WHERE product_id = $product_id";
                $result_price = mysqli_query($conn, $sql_price);

                if ($result_price && mysqli_num_rows($result_price) > 0) {
                    $product = mysqli_fetch_assoc($result_price);
                    $price = $product['price'];

                    // Calculate revenue
                    $revenue = $price * $quantity_sold;

                    // Prepare SQL query to update product quantity
                    $sql_update = "UPDATE products SET quantity = quantity - $quantity_sold 
                                WHERE product_id = $product_id AND quantity >= $quantity_sold";
                    
                    // Execute the UPDATE query first
                    if ($conn->query($sql_update) === TRUE) {
                        // If successful, insert the sales record
                        $sql_insert_sale = "INSERT INTO sales (product_id, quantity, revenue) 
                                            VALUES ($product_id, $quantity_sold, $revenue)";
                        
                        if ($conn->query($sql_insert_sale) === TRUE) {
                            echo "<div class='message success'>Product sold successfully! Sale recorded.</div>";
                        } else {
                            echo "<div class='message error'>Error inserting sale record: " . $conn->error . "</div>";
                        }
                    } else {
                        echo "<div class='message error'>Error updating product quantity: " . $conn->error . "</div>";
                    }

                } else {
                    echo "<div class='message error'>Product not found!</div>";
                }

                // Close the connection
                $conn->close();
            }
        ?>

    </div>

</body>
</html>
