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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Help</title>
    <link rel="stylesheet" href="../styles/help.css">
</head>
<body>
    <header>
        <?php require_once "nav.php" ?>
        <link rel="stylesheet" href= "../styles/nav.css">

        <div class="header-content">
            <h1>Help on Using Bavana Inventory Management System</h1>
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
                        <p> If you forget your password, please contact the website administrator to reset it. Only admins have the ability to reset user credentials.
                        </p>
                    </div>
            
                    <button class="question">3. How can I use the system as a stock keeper?</button>
                    <div class="answer">
                        <p>rgrdhytjyu,lk./bswjjdiewj</p>
                    </div>
                    
                    <button class="question">4. How can I check my current stock levels? </button>
                    <div class="answer">
                        <p></p>
                    </div>

                    <button class="question">5. Can I add new stock categories? </button>
                    <div class="answer">
                        <p>You can log in using the default credentials provided to you. 
                        Enter your username and password on the login page. 
                        If you are an admin, you will have access to additional management features.</p>
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
