<?php
session_start();
require_once "../connect.php";

    // echo $_GET['username'];

if (isset($_GET['username'])) {
    $username = $_GET['username'];
        if (usernameprefix)

        $delete_query = "DELETE FROM users WHERE username = '$username'";
        if (mysqli_query($conn, $delete_query)) {
            header('Location: user.php');
            exit();
        } else {
            echo "Error deleting user: " . mysqli_error($conn);
        }
    } else {
        echo "User not found.";
    }


mysqli_close($conn);