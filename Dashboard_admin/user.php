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
                    <h1>USERS</h1>
                    <a class="add-product" href="add_user_form.php">Add User</a>   
                </div>
        <?php
                require_once "../backend/connect.php";

                $sql = "SELECT * FROM users";

                $result=mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Image</th><th>username</th><th>name</th><th>Admin | User</th><th>DELETE</th></tr>";
                
                while($row = $result -> fetch_assoc()) {
                    echo "<tr>
                    <td><img width='60px' src='../images_for dashbrd\user.png'/></td>
                    <td>".$row['username']."</td>
                    <td>".$row['display_name']."</td>
                    <td>".($row['is_admin'] == 1 ? "Admin" : "User") . "</td>
                    <td>
                        <a href='../backend/delete_user.php?username=" . $row['username'] . "' onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</a>
                    </td>
                    </tr>";
                }
                echo "</table>";
            } 

            else {
                echo "<a class='no-add' href='add_user_form.php'>No User Added</a>";
            }
        ?> 
    </div>

</body>
</html>
