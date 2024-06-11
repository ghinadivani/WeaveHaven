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

$query = "SELECT * FROM pieces";
$stmt = $conn->prepare($query);
$stmt->execute();
$pieces = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon">
    <title>Manage Pieces</title>

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
</div>

<h2>MANAGE PIECES</h2>
<br><br>
<table class="pieces-table">
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Image</th>
    <th>Estimated Work</th>
    <th>Edit/Delete</th>
</tr>
<?php foreach ($pieces as $piece): ?>
    <tr>
        <td><?php echo $piece['id']; ?></td>
        <td><?php echo $piece['name']; ?></td>
        <td><?php echo $piece['description']; ?></td>
        <td><?php echo number_format($piece['price'], 0, ',', '.') . ' IDR'; ?></td>
        <td><img src="/images/<?php echo $piece['img']; ?>" alt="Piece Image" style="width: 5em; height: 5em;"></td>
        <td><?php echo $piece['estimated']; ?></td>
        <td>
            <a class="edit-button" href="edit_pieces.php?id=<?php echo $piece['id']; ?>">Edit</a>
            <form action="delete_pieces.php" method="post">
                <input type="hidden" name="id" value="<?php echo $piece['id']; ?>">
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<br><br>
<h2>ADD NEW PIECES</h2>
<form action="add_pieces.php" method="POST" enctype="multipart/form-data" class="add-piece-form">
    <label for="name" style="color: white;">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="description" style="color: white;">Description:</label>
    <textarea id="description" name="description" required></textarea><br>

    <label for="price" style="color: white;">Price:</label>
    <input type="text" id="price" name="price" required><br>

    <label for="estimated" style="color: white;">Estimated Work:</label>
    <input type="text" id="estimated" name="estimated" required><br>

    <label for="img" style="color: white;">Image:</label>
    <input type="file" id="img" name="img" accept="image/*" required><br>

    <style>
    input[type="file"] {
        font-size: 0.9em;
        padding: 10px 20px;
    }
    </style>
    
    <button type="submit">Add Piece</button>
</form>

<br><br>

</body>
</html>
