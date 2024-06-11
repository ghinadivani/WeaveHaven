<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon">
    <title>Manage Orders</title>

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
        <a href="home.php" class="logo">ECRU GALLERY</a>
        <nav class="navbar">
            <a href="manage_orders.php">Manage Orders</a>
            <a href="manage_pieces.php">Manage Pieces</a>
            <a href="manage_contact.php">Manage Contact</a>
            <a href="logout.php">Logout</a>
        </nav>
    </section>
</header>



</body>
</html>

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

$stmt = $conn->query("SELECT * FROM orders");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>MANAGE ORDERS</h2>";
echo "<br><br>";
echo "<table border='1' class='pieces-table'>";
echo "<tr>
<th>Order Number</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Street</th>
<th>City</th>
<th>ZipCode</th>
<th>Country</th>
<th>Item ID</th>
<th>Tracking Number</th>
<th>Actions</th></tr>";
foreach ($orders as $order) {
    echo "<tr>";
    echo "<td>{$order['order_number']}</td>";
    echo "<td>{$order['name']}</td>";
    echo "<td>{$order['email']}</td>";
    echo "<td>{$order['phone']}</td>";
    echo "<td>{$order['street']}</td>";
    echo "<td>{$order['city']}</td>";
    echo "<td>{$order['zip_code']}</td>";
    echo "<td>{$order['country']}</td>";
    echo "<td>{$order['item_id']}</td>";
    echo "<td>{$order['tracking_number']}</td>";
    echo "<td>
            <form action='update_order.php' method='post'>
                <input type='hidden' name='order_number' value='{$order['order_number']}'>
                <select name='status'>
                    <option value='Waiting for Fulfillment'>Waiting for Fulfillment</option>
                    <option value='Shipped'>Shipped</option>
                    <option value='Rejected'>Rejected</option>
                </select>
                <input type='text' name='tracking_number' placeholder='Tracking Number'>
                <button type='submit'>Update</button>
            </form>
          </td>";
    echo "</tr>";
}
echo "</table>";

$conn = null;
?>
