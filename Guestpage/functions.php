<!DOCTYPE html>
<html lang="en">

<head>
   <title>functionalities</title>
    <link rel="stylesheet" href="../styles/functions.css">
</head>

<body>
    <header>
        <?php require_once "nav.php" ?>
        <link rel="stylesheet" href= "../styles/nav.css">
        
        <div class="header-content">
            <h1>Functionalities of Bavana Inventory Management System </h1>
        </div>
    </header>

    <div class="container">
    
            <section class="bodybox">
                <p>In this section we will introduce you to the functionalities
                    of our inventory management system. </p>
                    <ol type="I">
                    <li>Seperate login for stock managers and Stock keepers</li>
                        <ul type="circle">
                            <li>The login to bavana is seperately offered for admin(Stock Managers) and
                                user(Stock Keeper). Based on the login, there are different dashboard options
                                for the Stock Manager and Stock Keeper. 
                            </li>
                            
                        </ul><br>
                    <li>Guest user login</li>
                        <ul type="circle">
                            <li>Our website also allows a guest view, that shows only the basic pages, and not the 
                                abilities to actually manage the inventory of the syetem. 
                            </li>
                        </ul><br>
                    <li>Adding users(stock keepers) to the system</li>
                        <ul type="circle">
                            <li>Our system offers the ability to add new users to the system as Stock Keepers or even 
                                as an Admin. (Stock Manager) 
                        </ul><br>
                    <li>Adding orders to system</li>
                        <ul type="circle">
                            <li> Stock Keepers can add orders made to the system and keep it updated about orders.
                                The system records all orders and even offers the ability to mark the orders as completed or not. </li> 
                        </ul> <br>
                    <li>Updating the inventory with sales quantities</li>
                        <ul type="circle">
                            <li> Bavana Inventory can be updated with sales quantities so that it will be deducted from 
                                the total inventory available. 
                            </li> 
                        </ul> <br>
                        <li>Report generation based on orders recieved and completed</li>
                        <ul type="circle">
                            <li> Our system stores and records all orders completed and incompleted very clearly which makes it easy for 
                                stock managers and stock keepers to easily access every transaction related to inventory.
                        </ul><br>

                </ol>
            </section>

    </div>

    <footer>
        <p>&copy Group 23 Module : IWT IS1207 </p>
    </footer>
</body>

</html>
