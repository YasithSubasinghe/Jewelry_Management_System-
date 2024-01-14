<!DOCTYPE html>
<html>
<head>
    <title>Opna Gems & Jewellery</title> <!--Title of the webpage-->
    <link rel="shortcut icon" href="./assests/index.ico" type="image/x-icon"> <!--index.ico is a header icon-->
	<link rel="stylesheet" type="text/css" href="log.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
</body>
</html>