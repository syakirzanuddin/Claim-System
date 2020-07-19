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
		header("Location: logstudent.php?error=Masukkan No Pelajar");
		exit();
	}
	else if(empty($pass)){
		header("Location: logstudent.php?error=Masukkan Kad Pengenalan");
		exit();
	}else{
		$sql = "SELECT * FROM details WHERE no_pelajar='$uname' AND no_kp='$pass'";
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result)=== 1){
			$row = mysqli_fetch_assoc($result);
			if ($row['no_pelajar'] === $uname && $row['no_kp'] === $pass) {
				$_SESSION['no_pelajar'] = $row['no_pelajar'];
				$_SESSION['nama'] = $row['nama'];
				$_SESSION['id'] = $row['id'];
				header("Location: home.php");
				exit();
			}else{
				header("Location: logstudent.php?error=No Pelajar atau Kad Pengenalan salah ");
				exit();
			}
		}else{
			header("Location: logstudent.php?error=No Pelajar atau Kad Pengenalan salah");
			exit();
			
		}
	}
	
	
}else{
	header("Location: logstudent.php");
	exit();
}