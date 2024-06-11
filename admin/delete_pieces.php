<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoppingcart";

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the 'id' parameter is present in the POST request
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Prepare SQL statement to delete the piece
        $stmt = $conn->prepare("DELETE FROM pieces WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Redirect back to the manage pieces page after deletion
        header("Location: manage_pieces.php");
        exit;
    } else {
        // If 'id' is not present, redirect to an error page or handle appropriately
        header("Location: error.php");
        exit;
    }
} catch (PDOException $e) {
    // Handle database connection error
    echo "Connection failed: " . $e->getMessage();
}
?>
