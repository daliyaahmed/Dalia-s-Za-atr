<?php

// Start the session
session_start();
// Include the database connection
include_once 'db_connection.php';

if (isset($_SESSION['user_id'])) {
    $customerId = $_SESSION['user_id'];
    if(isset($_POST['confirmationForm'])) {
        // Retrieve order details
        $orderDetails = $_POST['orderDetails'];
        // Split order details into individual items
        $items = explode(";", $orderDetails);
        // Remove the last empty item (due to trailing semicolon)
        array_pop($items);
        

        //delete records from orderdetails for this customer inorder to clear the cart 
        $queryDeleteCustomer = "DELETE FROM orderdetails WHERE Customer_id = ?";
        $stmtDeleteCustomer = $mysqli->prepare($queryDeleteCustomer);
        $stmtDeleteCustomer->bind_param("i", $customerId);
        if ($stmtDeleteCustomer->execute() === FALSE) {
            echo "Error deleting records: " . $mysqli->error;
        } else {
            echo "Records deleted successfully!";
        }
        $stmtDeleteCustomer->close();

        // Redirect to order history page
        // header("Location: /website/orderHistory.html");
        // exit(); // Don't forget to exit after a header redirect
    }
} else {
    echo "User not logged in.";
}

