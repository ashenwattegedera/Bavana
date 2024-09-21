<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>

    <link rel="stylesheet" href="..\styles\loginstyle.css">
</head>
<body>
    <span class="top-span">
        <img src="../images_for dashbrd/Bavana_trans_long_white_large.png" alt="Bavana Inventory">
    </span>
    <div class="form-wrap">
    <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <form  method="post">
                <input style="float:left" type="text" name="username" id="username" placeholder="Enter Admin/User Username..." required>
                <input style="float:left" type="password" name="password" id="password" placeholder="Enter Password..." required>
                <input type="submit" name="submit" value="Log In" />
            </form>

            <?php
                if (isset($_POST['submit'])){
                    require_once('../backend/connect.php');
                    $name = $_POST['username'];
                    $pass = $_POST['password'];
                    
                    $sql = "SELECT user_password, is_admin
                            FROM users
                            WHERE username = '".$name."';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $row = $result -> fetch_assoc();
                        if ($row['user_password'] == $pass) {
                            session_start();
                            $_SESSION['username'] = $name;
                            if ($row['is_admin'] == 0) {
                                header('Location: ../dashboard_user/dashboard_user.php');
                            }
                            elseif($row['is_admin'] == 1){
                                header('Location: ../Dashboard_admin/dashboard.php');
                            }
                        }
                        else{
                            echo "<script>alert('Password is incorrect!');</script>";
                        }
                    }
                    else{
                        echo "<script>alert('You are not Registered!');</script>";
                    }
                }
            ?>

            <p class="message"><a href="../Guestpage/index.php">Login as a Guest</a></p>
        </div>
    </div>
         <div class="bottom">
        <p class="msg"> Need Some Help for Login? <a href="../Guestpage/help.php">Help</a></p>
    </div>
</div>

    <!-- <script src="script.js"></script> -->
</body>
</html>
