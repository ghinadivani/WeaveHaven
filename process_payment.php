<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "";
$database = "shoppingcart";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit; // Handle connection error
}

// Function to generate a random order number
function generateOrderNumber() {
    return mt_rand(100000, 9999999); 
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $zip_code = $_POST["zip_code"];
    $country = $_POST["country"];
    $card_type = $_POST["card_type"];
    $card_number = $_POST["card_number"];
    $exp_date = $_POST["exp_date"];
    $cvv = $_POST["cvv"];
    $item_id = $_POST["item_id"];

    // Generate a random order number
    $order_number = generateOrderNumber();

    // Assuming you have passed the item_id via POST or retrieved it from a session
    if (isset($_POST['item_id'])) {
        $item_id = $_POST['item_id'];

        // Retrieve item details from the database using the item_id
        $stmt_item = $conn->prepare("SELECT name, description, price, img, estimated FROM pieces WHERE id = :item_id");
        $stmt_item->bindParam(':item_id', $item_id);
        $stmt_item->execute();

        if ($stmt_item->rowCount() > 0) {
            $item = $stmt_item->fetch();

            // Prepare SQL statement to insert order details into the database
            $sql = "INSERT INTO orders (order_number, name, email, phone, street, city, zip_code, country, card_type, card_number, exp_date, cvv, item_id)
                    VALUES (:order_number, :name, :email, :phone, :street, :city, :zip_code, :country, :card_type, :card_number, :exp_date, :cvv, :item_id)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':order_number', $order_number);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':street', $street);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':zip_code', $zip_code);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':card_type', $card_type);
            $stmt->bindParam(':card_number', $card_number);
            $stmt->bindParam(':exp_date', $exp_date);
            $stmt->bindParam(':cvv', $cvv);
            $stmt->bindParam(':item_id' , $item_id );


            // Execute the prepared statement
            if ($stmt->execute()) {
                // Order placed successfully, set the order number
                $_SESSION['order_number'] = $order_number;
                header("Location: order_confirmation.php");
                exit;
            } else {
                $error_message = "Error placing the order.";
            }
        } else {
            echo "ERROR 404 You have not selected an item, please retry again";
        }
    } else {
        echo "Item ID not provided.";
    }
} else {
    echo "Form submission error.";
}
?>

