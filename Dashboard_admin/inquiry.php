<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inquiries</title>
    <link rel="stylesheet" href="../styles/dashbrd.css"> 
<body>
    <div class="container">

            <?php require_once "./side_bar.php"; ?>
        <div class="card-container">
                    <div class="header">
                        <h1>Inquiries</h1>
                    </div>
                <?php
                    require_once("../backend/connect.php");

                    $sql = "SELECT * FROM inquires";

                    $result=mysqli_query($conn, $sql);
                ?>
            <?php
                    if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>inquiry_id</th><th>name</th><th>email</th><th>inquiry</th></tr>";
                    
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        echo "<tr><td>".$row['inquiry_id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['inquiry'];
                    }

                    echo "</table>";
                } 
                else {
                    echo "<a class='no-add' href='add_product_form.php'>No Product Added !</a>";
                }
            ?>
        </div>     
    </div>

</body>
</html>
