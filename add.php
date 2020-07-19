<?php 
	include "inc/header.php"; 
	include "classes/Student.php"; 
	$stu = new Student();
?>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$no_pelajar = $_POST['no_pelajar'];
		$kod_subjek = $_POST['kod_subjek'];
		$kumpulan = $_POST['kumpulan'];
		$nama_pengajar = $_POST['nama_pengajar'];
		$insertdata = $stu->insertStudent($name, $no_pelajar, $kod_subjek, $kumpulan, $nama_pengajar);
	}
?>

	<div class="container">
<?php
	if (isset($insertdata)) {
		echo $insertdata;
	}
?>
		<div class="card">
			<div class="card-header">
				<h2>
					<a class="btn btn-success" href="add.php">Add Student</a>
					<a class="btn btn-info float-right" href="indexAtt.php">Back</a>
				</h2>
			</div>

			<div class="card-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="name">NAMA PELAJAR</label>
						<input type="text" class="form-control" name="name" id="name" required="">
					</div>

					<div class="form-group">
						<label for="no_pelajar">NO PELAJAR</label>
						<input type="text" class="form-control" name="no_pelajar" id="no_pelajar" required="">
					</div>
					
					<div class="form-group">
						<label for="kod_subjek">KOD SUBJEK</label>
						<input type="text" class="form-control" name="kod_subjek" id="kod_subjek" required="">
					</div>

					<div class="form-group">
						<label for="kumpulan">KUMPULAN</label>
						<input type="text" class="form-control" name="kumpulan" id="kumpulan" required="">
					</div>
					
					<div class="form-group">
						<label for="nama_pengajar">NAMA PENGAJAR</label>
						<input type="text" class="form-control" name="nama_pengajar" id="nama_pengajar" required="">
					</div>
					<br>
					<div class="form-group text-center">
						<input type="submit" name="submit" class="btn btn-primary px-5" id="no_pelajar" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include("inc/footer.php"); ?>