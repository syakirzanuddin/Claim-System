<!DOCTYPE html>
<html>
<head>
	<title>UPTA - Student Login</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<form action="login.php" method="post">
	<center><img src="image/uitm.png" width="150" height="60"></center>
		<h2>Student Login</h2>
		<?php if (isset($_GET['error'])){ ?>
		<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Username</label>
		<input type="text" name="uname" placeholder="Student ID"><br>
		<label>Password</label>
		<input type="password" name="password" placeholder="IC Number"><br>
		<button class="log" type="submit">Login</button>
		<a href="index.php">Back</a>
	</form>
</body>
</html>
