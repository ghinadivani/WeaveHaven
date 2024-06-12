<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$database = "shoppingcart";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $order_number = $_POST["order_number"];
    $message = $_POST["message"];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO contact (name, email, phone, address, order_number, message) VALUES (:name, :email, :phone, :address, :order_number, :message)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":order_number", $order_number);
        $stmt->bindParam(":message", $message);

        $stmt->execute();

        // arahkan ke submit.php
       header("Location: submit.php");
       exit();
    } 
    }

?>
