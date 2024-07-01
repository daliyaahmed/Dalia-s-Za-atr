<?php
session_start();

include_once 'db_connection.php';

// Getting username and password from POST request
$username = $_POST['uname'];
$password = $_POST['psw'];

// Query to check if the provided credentials exist in the customers table
$sql = "SELECT * FROM customers WHERE (Customer_Email = '$username' OR Customer_Username  = '$username') AND Customer_pass = '$password'";

$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
    // If login is successful, redirect to the menu page
    $_SESSION['user_id'] = $row["Customer_id"];
    header("Location: menuPage.html");
    exit();
} else {
    // If login fails, set an error message in session
    $_SESSION['login_error'] = "Incorrect login details. Please try again.";
    // Redirect back to the login page
    header("Location: loginhtml.html");
    
}

$mysqli->close();
?>
