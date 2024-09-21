<!DOCTYPE html>
<html lang="en">
<head>
    <title>Help</title>
    <link rel="stylesheet" href="../styles/help.css">
</head>
<body>
    <header>
        <?php require_once "./nav.php" ?>
        <link rel="stylesheet" href= "../styles/nav.css">

        <div class="header-content">
            <h1>Need Help on Using Bavana Inventory?</h1>
        </div>
    </header>

    <div class="container">
        <section class= "bodybox">

       
            <h2> Frequently Asked Questions</h2>
            
    <div class="qa-section">
                    <button class="question">1. How do I log in to the Bhavana Inventory management system?</button>
                    <div class="answer">
                        <p>You can log in using the default credentials provided to you. 
                        Enter your username and password on the login page. 
                        If you are an admin, you will have access to additional management features.</p>
                    </div>
            
                    <button class="question">2. How do I manage stock as an admin?</button>
                    <div class="answer">
                        <p> As an admin, you can manage stock by adding, updating, or removing items in the inventory, setting stock levels, and tracking product availability in the Bhavana Inventory Management system.</p>
                    </div>
            
                    <button class="question">3. How can I use the system as a stock keeper?</button>
                    <div class="answer">
                        <p>You can use the system to track stock levels, update inventory, and manage stock in real-time by logging in and navigating to the stock management section.</p>
                    </div>
                    
                    <button class="question">4. How can I check my current stock levels? </button>
                    <div class="answer">
                        <p>You can check your current stock levels by logging into Bhavana Inventory Management and navigating to the "Products Table" section.</p>
                    </div>

                    <button class="question">5. Can I add new stock categories? </button>
                    <div class="answer">
                        <p>You can log in using the default credentials provided to you. 
                        Enter your username and password on the login page. 
                        If you are an admin, you will have access to additional management features.</p>
                    </div>

                    <button class="question">6. Can I view previous stock requests? </button>
                    <div class="answer">
                        <p>Yes, you can view your previous stock requests by navigating to the “Stock Requests” section under your account. Here, you’ll see a list of all requests you have made, along with their approval status.</p>
                    </div>

                    <button class="question">7. How do I log out of the website?</button>
                    <div class="answer">
                        <p>To log out, click on the “Logout” button located at the top-right corner of the page. This will end your session and redirect you to the login page.</p>
                    </div>

                    
                </div>
            
                <script src="script.js"></script>
        

        </section>

    </div>
    <div class="container1">
        <h1>Reach Out for Further Inquiries</h1>
        <form action="help.php" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name.." required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email.." required>

            <label for="inquiry">Inquiry</label>
            <textarea id="inquiry" name="inquiry" placeholder="Your inquiry.." required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
    <footer>
        <p>&copy Group 23 Module : IWT IS1207 </p>
    </footer>
</body>
</html>

<?php
require_once '../backend/connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['inquiry'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $inquiry = mysqli_real_escape_string($conn, $_POST['inquiry']);
        
        // Create SQL query
        $sql = "INSERT INTO inquires (name, email, inquiry) VALUES ('$name', '$email', '$inquiry')";
        
        // Execute the query and handle success or failure
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("Location: help.php");
            exit(); // Make sure no further code is executed after redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Form data is incomplete.";
    }
}

// Close the connection
$conn->close();
?>


