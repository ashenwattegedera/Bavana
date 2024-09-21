<?php
    require_once '../backend/connect.php';

    $errMsg = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Sanitize input to prevent SQL injection
        $display_name = mysqli_real_escape_string($conn, $_POST['display_name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);  // Store plain text password

        $profile_image = 'usericon.png';

        // SQL query
        $sql = "INSERT INTO users(display_name, username, user_password, profile_image, is_admin) 
                VALUES ('$display_name', '$username', '$user_password', '$profile_image', 0)";

        
        // Execute the query
        if (mysqli_query($conn, $sql)) {
                    header('Location: add_user_form.php'); // You can redirect the user after success
            exit();
        } else {
            $errMsg = 'Error: Could not add user to the database.';
        }

        // Close the database connection
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Add User</title>
        <link rel="stylesheet" href="../styles/form.css">
    </head>

    <body>
        <div class="form-container">
            <!-- TOPIC -->
            <h2>Add User</h2>
            <!-- <span class="errMsg"><?php echo htmlspecialchars($errMsg); ?></span> -->

            <!-- FORM -->
            <form id="addUserForm" action="add_user_form.php" method="POST" onsubmit="return validateForm()">
                <!-- NAME BOX -->
                <label for="display_name">Name:</label>
                <input type="text" placeholder="Enter name..." id="display_name" name="display_name" required>
                <!-- USERNAME BOX -->
                <label for="username">Username:</label>
                <input type="text" placeholder="Enter Username..." id="username" name="username" required>
                <span class="error" id="error-message" style="color:red;"></span>
                <!-- PASSWORD BOX -->
                <label for="user_password">Password:</label>
                <input type="password" placeholder="Enter Password..." id="user_password" name="user_password" required>
                <input type="submit" value="Add User">
            </form>
            <!-- BACK BUTTON -->
            <a href="user.php"><button>BACK</button></a>
        </div>

        <!-- Include the external validation script -->
        <script src="../login/scripts.js"></script> <!-- Update the path accordingly -->
    </body>
</html>

