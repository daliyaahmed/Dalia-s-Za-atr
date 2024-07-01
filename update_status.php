<?php
session_start();
// Include the database connection
include_once 'db_connection.php';

// Check if order_id and action are set
if(isset($_POST['order_id']) && isset($_POST['action'])) {
    // Get order ID and action from POST request
    $order_id = $_POST['order_id'];
    $action = $_POST['action'];

    // Prepare update statement
    $stmt = $mysqli->prepare("UPDATE restaurantorders SET orderStatus = ? WHERE order_id = ?");

    // Bind parameters
    $stmt->bind_param('ii', $action, $order_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Order status updated successfully";
    } else {
        echo "Error updating order status";
    }
} else {
    echo "Invalid request";
}
?>
