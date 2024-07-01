<?php
// Start the session
session_start();

// Include database connection
include_once 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}

// Get user ID from session
$userID = $_SESSION['user_id'];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    // Update user's profile information in the database
    $query = "UPDATE customers SET Customer_name=?, Customer_Email=?, Customer_pass=?, Customer_phone_num=?, Customer_ship_address=?, Customer_city=? WHERE Customer_id=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssssssi", $name, $email, $password, $phone, $address, $city, $userID);
    $stmt->execute();
    $stmt->close();

    echo "Profile updated successfully.";
    header("Location: loginhtml.html");
} else {
    echo "Invalid request.";
}

// Close database connection
$mysqli->close();
?>

