<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])){
	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	
	if (empty($uname)){
		header("Location: logstaff.php?error=Masukkan No Staff");
		exit();
	}
	else if(empty($pass)){
		header("Location: logstaff.php?error=Masukkan Kad Pengenalan");
		exit();
	}else{
		$sql = "SELECT * FROM details2 WHERE no_staff='$uname' AND no_kp='$pass'";
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result)=== 1){
			$row = mysqli_fetch_assoc($result);
			if ($row['no_staff'] === $uname && $row['no_kp'] === $pass) {
				$_SESSION['no_staff'] = $row['no_staff'];
				$_SESSION['nama'] = $row['nama'];
				$_SESSION['id'] = $row['id'];
				header("Location: homestaff.php");
				exit();
			}else{
				header("Location: logstaff.php?error=No Staff atau Kad Pengenalan salah");
				exit();
			}
		}else{
			header("Location: logstaff.php?error=No Staff atau Kad Pengenalan salah");
			exit();
			
		}
	}
	
	
}else{
	header("Location: logstaff.php");
	exit();
}