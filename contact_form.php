<?php
// Database connection parameters
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "shoppingcart"; // Change this to your MySQL database name

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $order_number = $_POST["order_number"];
    $message = $_POST["message"];

    try {
        // Create a new PDO instance
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO contact (name, email, phone, address, order_number, message) VALUES (:name, :email, :phone, :address, :order_number, :message)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":order_number", $order_number);
        $stmt->bindParam(":message", $message);

        // Execute the statement
        $stmt->execute();

        // Redirect to success page and display the success message
       header("Location: submit.php");
       exit();
    } catch (PDOException $e) {
        // Display error message if connection fails
        echo "Error 404, Please try again later or email us at Ecru@Gallery.com" . $e->getMessage();
    }
}
?>
