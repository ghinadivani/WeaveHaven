<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon">
</head>
<body>
<header>

<section class="header">
    <a href="home.php" class="logo">Weave Haven</a>

    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="about.php">about</a>
        <a href="gallery.php">gallery</a>
        <a href="contact.php">contact</a>
        <a href="logout.php">Logout</a>
    </nav>

</section>
</header>
<h1 class="inquiry">Your knitted items inquiry</h1>
<p class="inquiry-p">Thank you for your interest in our knitted items. Due to high demand and complexity, we use a pre-order and queue system. After you submit your order form, we will review it and email you about availability and next steps. We appreciate your patience and understanding. For urgent questions, please contact us directly.</p>
<?php

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

if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];
    $sql = "SELECT name, description, price, img, estimated FROM pieces WHERE id = :item_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':item_id', $item_id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $item = $stmt->fetch();

    } else {
        echo "Item not found";
    }
} else {
    echo '<div class="centered-message">Please select your art piece from the gallery</div>';
}

?>
<section class="order-form">
<h2>Contact Information</h2>
<form action="process_payment.php" method="POST">
    <input type="hidden" id="item_id" name="item_id" value="<?php echo htmlspecialchars($_GET['item_id'] ?? ''); ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone">Phone Number:</label>
    <input type="text" id="phone" name="phone" required><br><br>

    <label for="street">Street Address:</label>
    <input type="text" id="street" name="street" required><br><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" required><br><br>

    <label for="zip_code">Zip Code:</label>
    <input type="text" id="zip_code" name="zip_code" required><br><br>

    <label for="country">Country:</label>
    <input type="text" id="country" name="country" required><br><br>
<h2>Card Information</h2>
    <label for="card_type">Card Type:</label>
    <select id="card_type" name="card_type">
    <option value="visa">Visa</option>
    <option value="mastercard">Mastercard</option>
    <option value="gpn">GPN</option>
    </select>
    <br>
    <label for="card_number">Card Number:</label>
    <input type="text" id="card_number" name="card_number" placeholder="Enter your card number" maxlength="16" required pattern="\d{15-16}">
    <br>
    <label for="exp_date">Expiration Date:</label>
    <input type="text" id="exp_date" name="exp_date" placeholder="MM/YYYY" pattern="^(0[1-9]|1[0-2])\/202[2-9]$" required>
    <br>
    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" maxlength="4" required pattern="\d{3,4}">
    <br>
    <input type="submit" value="Submit Request">
</form>
</section>

<section class="footer">
    <div class="box-container" style="display: flex; justify-content: center;">
        <div class="box" style="text-align: center; margin: 0 20px;">
            <h3>contact info</h3>
            <a href="#">weavehaven@gmail.com</a>
            <a href="#">Manado, Indonesia</a>
        </div>

        <div class="box" style="text-align: center; margin: 0 20px;">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
        </div>
    </div>
</section>

</footer>

<script src="js/script.js"></script>
    
</body>
</html>