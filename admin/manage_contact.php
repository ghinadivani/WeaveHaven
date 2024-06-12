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

$query = "SELECT * FROM contact";
$stmt = $conn->prepare($query);
$stmt->execute();
$contacts = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon">
    <title>Manage Contact</title>

    <style>
        body {
            background: url('../images/header-bg-1.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        table {
            background-color: white;
            padding: 20px;
            margin: 0 auto;
            width: 100%;
            max-width: 1200px;
            font-size: 1.5em;
        }

        h2 {
            text-align: center;
            font-size: 4em;
            color: white;
            margin-top: 50px;
            text-shadow:0 1.5rem 3rem white;
        }
    </style>

</head>
<body>
<div>
<header>
    <section class="header">
        <a href="home.php" class="logo">Weave Haven</a>
        <nav class="navbar">
            <a href="manage_orders.php">Manage Orders</a>
            <a href="manage_pieces.php">Manage Pieces</a>
            <a href="manage_contact.php">Manage Contact</a>
            <a href="logout.php">Logout</a>
        </nav>
    </section>
</div>

    <h2>CONTACT FORMS</h2>
    <section class="pieces-table">
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Order #</th>
            <th>Message</th>
            
        </tr>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?php echo $contact['name']; ?></td>
                <td><?php echo $contact['email']; ?></td>
                <td><?php echo $contact['phone']; ?></td>
                <td><?php echo $contact['address']; ?></td>
                <td><?php echo $contact['order_number']; ?></td>
                <td><?php echo $contact['message']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </section>
</body>
</html>
