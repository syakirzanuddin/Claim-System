<?php 
	include "inc/headerstaff.php"; 
	include "classes/Student.php"; 
	$stu = new Student();
?>
<?php 
	// error_reporting(0);
	$dt = $_GET['dt'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 $attend = $_POST['attend'];
		 $attattend = $stu->updateAttendance($dt, $attend);
	}
?>
	<div class="container">
<?php 
	if (isset($attattend)) {
		echo $attattend;
	}
?>
<div class='alert alert-danger' style="display: none;"><strong>Error !</strong> NO PELAJAR Missing !</div>
		<div class="card">
			<div class="card-header">
				<h2>
				<i style="font-size:16px;">View only</i>
					<a class="btn btn-info float-right" href="date_viewStaff.php">Back</a>
				</h2>
			</div>

			<div class="card-body" style="overflow-x:auto;">
				<div class="card bg-light text-center mb-3">
					<h4 class="m-0 py-3"><strong>Date</strong>: <?php echo $dt; ?></h4>
				</div>
				<form action="" method="post">
					<table class="table table-striped">
						<tr>
							<th width="5%">BIL</th>
							<th width="25%">NAMA PELAJAR</th>
							<th width="15%">NO PELAJAR</th>
							<th width="13%">KOD SUBJEK</th>
							<th width="12%">KUMPULAN</th>
							<th width="20%">NAMA PENGAJAR</th>
							<th width="10%">KEHADIRAN</th>
						</tr>
<?php 

	$getstudent = $stu->getAllData($dt);
	if ($getstudent) {
		$i = 0;
		while ($value = $getstudent->fetch_assoc()) {
			$i++;
?>
<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $value['name']; ?></td>
	<td><?php echo $value['no_pelajar']; ?></td>
	<td><?php echo $value['kod_subjek']; ?></td>
	<td><?php echo $value['kumpulan']; ?></td>
	<td><?php echo $value['nama_pengajar']; ?></td>
	<td data-id="<?php echo $value['no_pelajar']; ?>"><?php echo $value['attend']; ?></td>
		
</tr>
<?php } } ?>

					</table>
				</form>
			</div>
		</div>
	</div>
	<br><br>
<?php include("inc/footer.php"); ?>