<div class="sidebar">

            <img src="../images_for dashbrd/Bavana_trans_long_white_large.png" alt="Logo" width="300px">

            <ul>
                <a href="dashboard.php">        <li><div>   Dashboard   </div></li></a>
                <a href="user.php">             <li><div>   Users      </div></li></a>
                <a href="products.php" >        <li><div>   Products   </div></li></a>
                <a href="place_order.php" >     <li><div>   Orders     </div></li></a>
                <a href="records.php" >         <li><div>   Records    </div></li></a>
                <a href="sale_record.php" >     <li><div>   Sales      </div></li></a>
                <a href="../Userhome/index.php"><li><div>   Home       </div></li></a>
                <a href="./inquiry.php" >       <li><div>   Inquiry    </div></li></a>
                <a href="../Userhome/help.php"> <li><div>   Help       </div></li></a>

            </ul>

            <div class="profile">
                    <?php
                        session_start();
                        $name = $_SESSION['username'];
                        require_once('../backend/connect.php');
                        $sql = "SELECT profile_image
                                FROM users
                                WHERE username = '".$name."';";
                        $result = mysqli_query($conn, $sql);
                        $row = $result -> fetch_assoc();
                        $profile_image = $row['profile_image'];
                        echo'<img class="admin" src="../images_for dashbrd/'.$profile_image.'" alt="Profile Image">'
                    ?>
                <h3>
                    <?php
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
