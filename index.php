<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/style_login.css">
	<link rel="icon" type="image/x-icon" href="images/favicon">
</head>
<body style="background-image: url('images/header-bg-1.png'); background-size: cover; height: 100vh; margin: 0;">
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) {?>
     		<p class="error"><?php echo $_GET['error'];?></p>
     	<?php }?>
     	<label>Username</label>
     	<input type="text" name="uname" placeholder="Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
</body>
</html>