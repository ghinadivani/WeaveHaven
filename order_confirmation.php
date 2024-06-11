<?php
session_start(); 

if (isset($_SESSION['order_number'])) {
    $order_number = $_SESSION['order_number']; 
} else {
    header("Location: home.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you!</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon">
</head>
<body>
<header>

<section class="header">
    <a href="home.php" class="logo">ECRU GALLERY</a>

    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="about.php">about</a>
        <a href="gallery.php">gallery</a>
        <a href="contact.php">contact</a>
        <a href="logout.php">Logout</a>
    </nav>

    </section>
</header>

<main>
    <section class="contact-submit">
        <p>We appreciate your inquiry! Here is your confirmation number: <?php echo "#" , $order_number; ?></p>
        <a href="home.php" class="back-to-main">Back to main page</a>
    </section>
</main>

<footer>

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