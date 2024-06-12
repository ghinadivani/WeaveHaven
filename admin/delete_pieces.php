<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoppingcart";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM pieces WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: manage_pieces.php");
        exit;
    } else {
        header("Location: error.php");
        exit;
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
