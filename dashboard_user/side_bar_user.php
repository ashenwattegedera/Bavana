<div class="sidebar">
    <img src="../images_for dashbrd/Bavana_trans_long_white_large.png" alt="Logo" width="300px">
    <ul>
        <a href="dashboard_user.php"><li><div>Dashboard</div></li></a>
        <a href="products_user.php" >  <li><div>Products</div></li></a>
        <a href="order.php" ><li><div>Place Order</div></li></a>
        <a href="../Userhome/index.php" ><li><div>Home</div></li></a>
        <a href="../Userhome/help.php" ><li><div>Help</div></li></a>
    </ul>
        <div class="profile">
            <img src="../images_for dashbrd/user.png" alt="Profile Image">
            <h3>
                    <?php
                        session_start();
                        $name = $_SESSION['username'];
                        require_once('../backend/connect.php');
                        $sql = "SELECT display_name
                                FROM users
                                WHERE username = '".$name."';";
                        $result = mysqli_query($conn, $sql);
                        $row = $result -> fetch_assoc();
                        $display_name = $row['display_name'];
                        echo $display_name;
                    ?>
                </h3>
        </div>
    <ul >
    <li><center><button onclick="go('../backend/logout.php')" class="logout">LOGOUT</button></center></li>
    </ul>
</div>

<script>
    function go(link){
        window.location.href = link;
    }
</script>