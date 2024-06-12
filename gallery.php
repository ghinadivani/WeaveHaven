<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon">
</head>
<body>
    <main>

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

<div class="heading" style="background:url(images/header-bg-2.jpg) no-repeat">
    <h1>products</h1>
</div>

<div class="heading-title">
    <h2>OUR LATEST PIECES</h2>
</div>

<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "shoppingcart"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id, name, description, price, img, estimated FROM pieces";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        // Output data tiap baris
        echo '<div class="gallery">';
        while ($row = $stmt->fetch()) {

            echo '<div class="pieces">';
            echo '<td><img src="/images/' . $row["img"] . '" alt="' . $row["name"] . '" style="width:100%; height: auto;"></td>';       
            echo '<p class="gallery-name" style="font-size: 13px;">' . $row["name"] . '</p>';
            echo '<p class="gallery-description">' . $row["description"] . '</p>';
            $price = number_format($row["price"], 0, ',', '.');
            echo '<p class="gallery-price">Price: ' . $price . ' IDR</p>';
            echo '<p class="gallery-artist">Estimated Work: ' . $row["estimated"] . '</p>';
            echo '<a href="order.php?item_id=' . $row["id"] . '" class="add-to-cart">Submit a Request</a>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }
}

?>

</main>

<footer>

<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>extra links</h3>
            <a href="our_team.php"></i>Our Team</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"></i> weavehaven@gmail.com </a>
            <a href="#"></i> Manado, Indonesia </a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"></i> facebook </a>
            <a href="#"></i> instagram </a>
        </div>
    </div>

</section>

</footer>

<script src="js/script.js"></script>
    
</body>
</html>