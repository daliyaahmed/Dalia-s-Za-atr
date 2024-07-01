<?php
session_start();
// Include the database connection
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch data
    $result = $mysqli->query("SELECT * FROM productDetails");
    while($row = $result->fetch_assoc()) {
        echo "<div class='food-item'>";
        echo "<span>" . $row['product_name'] . "</span>";
        echo "<label class='switch'>";
        echo "<input type='checkbox' data-product='" . $row['product_id'] . "'" . ($row['product_availabilityStatus'] ? " checked" : "") . ">";
        echo "<span class='slider'></span>";
        echo "</label>";
        echo "</div>";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update data
    $productId = $_POST['id'];
    $available = $_POST['status'];
    $query = "UPDATE productdetails SET product_availabilityStatus = ? WHERE product_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ii', $available, $productId);
    $stmt->execute();
    $stmt->close();
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
}
?>