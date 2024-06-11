<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoppingcart";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $order_number = $_POST['order_number'];
    $tracking_number = $_POST['tracking_number'];

    // Prepare and execute SQL update statement
    $stmt = $conn->prepare("UPDATE orders SET tracking_number = :tracking_number WHERE order_number = :order_number");
    $stmt->bindParam(':tracking_number', $tracking_number);
    $stmt->bindParam(':order_number', $order_number);
    $stmt->execute();

    // Redirect back to manage_orders.php
    header("Location: manage_orders.php");
    exit;
} else {
    header("Location: error.php");
    exit;
}
?>
