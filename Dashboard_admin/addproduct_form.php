<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capture form data
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        // Image file upload handling
        $target_dir = "../images_for dashbrd/stockimg";  // Directory where images will be saved
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an actual image
        $check = getimagesize($_FILES["product_image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<div class='message error'>File is not an image.</div>";
            $uploadOk = 0;
        }

        // Check file size (optional - limits file size to 5MB)
        if ($_FILES["product_image"]["size"] > 5000000) {
            echo "<div class='message error'>Sorry, your file is too large.</div>";
            $uploadOk = 0;
        }

        // Allow only certain file formats (JPG, PNG, GIF)
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "<div class='message error'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 (due to an error)
        if ($uploadOk == 0) {
            echo "<div class='message error'>Sorry, your file was not uploaded.</div>";
        } else {
            // If everything is ok, try to upload the file
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {

                require_once "../backend/connect.php";


                // Prepare SQL query to insert product data
                $sql = "INSERT INTO products (product_image, product_name, price, quantity) 
                        VALUES ('$target_file', '$product_name', '$price', '$quantity')";

                // Execute the query
                if ($conn->query($sql) === TRUE) {
                    // echo "<div class='message success'>Product added successfully!</div>";
                } else {
                    echo "<div class='message error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                }

                // Close connection
                $conn->close();
            } else {
                echo "<div class='message error'>Sorry, there was an error uploading your file.</div>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="../styles/form.css"> 

</head>
<body>

    <div class="form-container">
        <h2>Add New Product</h2>

        <!-- FORM -->
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="product_image">Product Image:</label>
            <input type="file" id="product_image" name="product_image" accept="image/*" required>

            <label for="product_name">Product Name:</label>
            <input type="text" placeholder="Enter Product Name..." id="product_name" name="product_name" required>

            <label for="price">Price:</label>
            <input type="number" placeholder="Enter Price..." id="price" name="price" step="0.01" required>

            <label for="quantity">Quantity:</label>
            <input type="number" placeholder="Enter Quantity..."id="quantity" name="quantity" required>

            <input type="submit" value="Add Product">
        </form>
        
        <!-- BUTTON -->
        <a href="products.php"><button>BACK</button></a>

    </div>

</body>
</html>
