<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
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
<div class="heading" style="background:url(images/header-bg-1.png) no-repeat">
    <h1>Contact Us</h1>
</div>
<section class="contact">

<h1 class="heading-title">Leave a Message</h1>
<p class="contact-p">WE WILL BE IN TOUCH WITH YOU SHORTLY</p>

<form action="contact_form.php" method="post" class="contact-form">

<div class="flex">
    <div class="inputBox">
        <span>name :</span>
        <input type="text" placeholder="enter your name" name="name">
    </div>

    <div class="inputBox">
        <span>email :</span>
        <input type="email" placeholder="enter your email" name="email">
    </div>

    <div class="inputBox">
        <span>phone :</span>
        <input type="number" placeholder="enter your number" name="phone">
    </div>

    <div class="inputBox">
        <span>address :</span>
        <input type="text" placeholder="enter your address" name="address">
    </div>

    <div class="inputBox">
        <span>order # :</span>
        <input type="number" placeholder="enter your order number" name="order_number">
    </div>

    <div class="inputBox">
        <span>Message :</span>
        <input type="text" placeholder="Write your message here" name="message">
    </div>
</div>

<input type="submit" value="submit" class="btn2" name="send">

</form>

<footer>

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