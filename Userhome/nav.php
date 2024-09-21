
<nav>
    <ul class="basic">
        <li><a href="index.php">Home</a></li>
        <li><a href="functions.php">Functionalities</a></li>
        <li><a href="help.php">Help</a></li>
        <li><a href="about.php">About</a></li>
        <?php
            session_start();
            if (isset($_SESSION['username'])) {
                require_once ('../backend/connect.php');
                $is_admin_sql = "SELECT is_admin
                                 FROM users
                                 WHERE username = '".$_SESSION['username']."';";
                $result = mysqli_query($conn, $is_admin_sql);
                $row = $result -> fetch_assoc();
                
                if ($row['is_admin'] == 0) {
                    echo '<li><a href="../dashboard_user/dashboard_user.php">Dashboard</a></li>';   
                }              
                elseif($row['is_admin'] == 1){
                    echo '<li><a href="../Dashboard_admin/dashboard.php">Dashboard</a></li>';                 
                }
            }
        ?>            
    </ul>
</nav>
