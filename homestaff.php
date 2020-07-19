<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang ke UPTA</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="style.css">
<style>
a{
	color: blue;
	
}
a:hover{
	color:navy;
	text-decoration:none;
}
</style>
</head>
<body>
<main>
    <div class="container text-center">
        <h2 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> SELAMAT DATANG <br>Ke<br>LAMAN RASMI UPTA<br></h2>
		<a href="logout.php">Keluar</a><br><br>
		
		<div class="page-header clearfix">
			<h4 class="pull-left">Maklumat Pemohon Tuntutan UPTA</h4>
		</div><hr><br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brgupta";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nama, kursus, semester, no_pelajar, no_kp, no_akaun,
bank, bulan, tahun FROM details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered' align='center' cellpadding = '10' style='width:90%;'><tr><th>NAMA</th><th>KURSUS</th><th>SEMESTER</th>
	<th>NO. PELAJAR</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nama"]. "</td><td>" . $row["kursus"]. "</td><td>" . $row["semester"]. "</td>
		<td>" . $row["no_pelajar"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<br><br>
<a href="formstaff.php" class="btn btn-success pull-right">Semak Permohonan</a>
<br><br>
<a href="date_viewstaff.php" class="btn btn-success pull-right">Semak Kehadiran Pelajar</a>
	<br><br>	
</div></main><br>
	<div class="container mt-3">
		<div class="card card-body bg-light text-center">
			<p style="font-size:12px;">
				created by &nbsp Muhammad Syakir &nbsp|&nbsp Nurkhamarina Ashiqin &nbsp|&nbsp Khadijah Aminah
				<br>CS2536A &nbsp 2020</p>
		</div>
	</div>
</body>
</html>