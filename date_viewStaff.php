<?php 
	include "inc/headerstaff.php"; 
	include "classes/Student.php"; 
	$stu = new Student();
?>

	<div class="container">
<?php 
	if (isset($insertattend)) {
		echo $insertattend;
	}
?>
		<div class="card">
		

			<div class="card-body" style="overflow-x:auto;">
				<form action="" method="post">
					<table class="table table-striped">
						<tr>
							<th width="30%">No</th>
							<th width="50%">Attendance Date</th>
							<th width="20%">Action</th>
						</tr>
<?php 
	$getdate = $stu->getDateList();
	if ($getdate) {
		$i = 0;
		while ($value = $getdate->fetch_assoc()) {
			$i++;
?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value['att_time']; ?></td>
							<td>
							<a class="btn btn-primary" href="student_viewStaff.php?dt=<?php echo $value['att_time']; ?>">View</a>
							</td>
						</tr>
<?php } } ?>
					</table>
				</form>
			</div>
		</div>
	</div>
	<br><br>
<?php include("inc/footer.php"); ?>