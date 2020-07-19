<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UPTA - Login</title>
	<link rel="stylesheet" href="style12.css">
</head>
<body>
	<div class="wrapper">
		<nav class="navbar">
			<img class="logo" src="image/logo.png">
			<ul>
				<li><a class="active" href="#">Main</a></li>
				<li><a href="#">About</a></li>
			</ul>
		</nav>
		<div class="center">
		<center><img src="image/fskm.png" style="width:90px;"></center>
			<br><h1>Welcome to FSKM UPTA System</h1><br>
			<h2>SKIM PEMBANTU PENGAJARAN PASCASISWAZAH UiTM<br>(UPTA)</h2>
			<br><br><br>
			<center>
			<div class="login" style="border:4px double white;padding-bottom:1px;padding-top:20px;">
			<h4 style="color:white;">Login as</h4>
			<div class="buttons">
				<button onclick="document.location='logstudent.php'" title="Login as student">
				Student</button>
				<button onclick="document.location='logstaff.php'" title="Login as staff member">
				Staff</button>
			</div>
			</div></center>
	</div>
</body>
</html>