<?php

require_once ("../phpcrud/php/component.php");
require_once ("../phpcrud/php/operation.php");
require_once ("../phpcrud/php/db.php");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skim Pembantu Pengajaran Pascasiswazah UiTM (UPTA)</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" 
	integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<main>
    <div class="container text-center">
        <h2 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i>  PENYATA TUNTUTAN<BR>SKIM PEMBANTU PENGAJARAN PASCASISWAZAH UiTM (UPTA)<br></h2>
		
		<br>
	<center><div class="container" style="overflow-x:auto;"><br>
	<table style="text-align:center;border-collapse:collapse;" border=2 width=90%>
	<tr>
		<th style="background-color:white;color:black;">PERINGATAN</th>
	</tr>
	<tr>
		<td style="background-color:white;color:black;text-align:left;">
		1. Tuntutan hendaklah diisi dengan tepat dan terang dan perlu dihantar ke Unit Kewangan Zon Fakulti selewat-lewatnya pada 10hb bulan berikutnya.
		<br>2. Tentukan No. Kad Pengenalan, No. Akaun Bank & No. Pelajar diisi dengan betul.
		<br>3. Membawa salinan bukti jam bekerja semasa tuntutan.
		</td>
	</tr>
	</table>
	<br><br><form method="POST" action="" autocomplete="on">
	<table class="table table-borderless" align="center" cellpadding = "10" style="width:90%;">
		 
		<!----- Nama ---------------------------------------------------------->
		<tr>
		<td>NAMA</td>
		<td><input type="text" class="nama" name="nama" maxlength="100" title="Sila masukkan nama anda." size="50"/>
		<!--(max 30 characters a-z and A-Z)-->
		</td>
		</tr>
		 
		<!----- Kursus ---------------------------------------------------------->
		<tr>
		<td>KURSUS</td>
		<td><input type="text" class="kursus" name="kursus" title="Sila masukkan kod kursus anda." maxlength="100"/></td>
		<td>SEMESTER</td>
		<td><input type="text" class="semester" name="semester" title="Sila masukkan nombor semester anda." maxlength="2"/></td>
		</tr>
		 
		<!----- No Pelajar ---------------------------------------------------------->
		<tr>
		<td>NO. PELAJAR</td>
		<td>
		<input type="text" class="no_pelajar" name="no_pelajar" title="Sila masukkan nombor pelajar anda." maxlength="10" />
		</td>
		</tr>
		 
		<!----- No kp ----------------------------------------------------------->
		<tr>
		<td>NO. K/P</td>
		<td><input type="text" class="no_kp" name="no_kp" title="Sila masukkan nombor kad pengenalan anda tanpa jarak."  maxlength="12" />
		<i style="font-size:14px;">(contoh: 000101005555)</i>
		</td>
		</tr>
		 
		<!----- No akaun ---------------------------------------------------------->
		<tr>
		<td>NO. AKAUN </td>
		<td><input type="text" class="no_akaun" name="no_akaun" title="Sila masukkan nombor akaun anda." maxlength="16" /></td>
		<td>BANK </td>
		<td><input type="text" class="bank" name="bank" /></td>
		</tr>
		 
		<!----- bulan tahun ---------------------------------------------------------->
		<tr>
		<td>BULAN</td>
		<td><input type="text" class="bulan" name="bulan" title="Sila masukkan nombor bulan." maxlength="2" />
		<td>TAHUN</td>
		<td>20 <input type="text" class="tahun" name="tahun" title="Sila masukkan tahun terkini." size="4" maxlength="2" />
		</td>
		</tr>
		</table><br>
		<input type="submit" class="btn btn-primary" value="Hantar">
		&nbsp<a href="home.php" class="btn btn-default">Kembali</a>
		<br><br>
		</form></div></center><br><hr><br>
		
        <div class="d-flex justify-content-center" style="overflow-x:auto;">
            <form action="" method="post" class="w-50">
                <div class="pt-2 <?php echo (!empty($status)) ? 'has-error' : ''; ?>">
                    <label><i class="far fa-clock"></i>&nbsp <b>STATUS</b>&nbsp</label>
					<select name="status">
						<option selected="selected" style="color:blue;" value="<i>PENDING</i>">Current Status: PENDING </option>
						
					</select>
					</div><br>
				<div class="pt-2">
                    <?php inputElement("<i class='fas fa-list'></i>","Bil", "book_id",setID()); ?>
                </div>
				<div class="pt-2">
                    <?php inputElement("<i class='far fa-calendar-alt'></i>","YYYY-MM-DD", "tarikh",""); ?>
                </div>
                <!--<div class="pt-2">
                    <?php inputElement("<i class='fas fa-chalkboard-teacher'></i>","Skop Tugas", "skop_tugas",""); ?>
                </div>-->
				
				<div class="pt-2 <?php echo (!empty($skoptugas)) ? 'has-error' : ''; ?>">
                    <label><i class="fas fa-chalkboard-teacher"></i> SKOP TUGAS </label>
					 
					<select name="skop_tugas">
						<option disabled selected>---Pilih yang berkenaan---</option>
						<option> AMALI </option>
						<option> MAKMAL </option>
						<option> STUDIO </option>
						<option> TUTORIAL </option>
					</select>
                </div>
			<br>
			<div class="row pt-2">
				<div class="col" id="start">
					<?php inputElement("<i class='fas fa-hourglass-start'></i>","Dari", "dari",""); ?>
				</div>
				<div class="col" id="end">
					<?php inputElement("<i class='fas fa-hourglass-end'></i>","Hingga", "hingga",""); ?>
				</div>
				<div class="col" id="time">
					<?php inputElement("<i class='fas fa-equals'></i>","Jam Bekerja", "jam_kerja",""); ?>
				</div>
				
			</div><p style="font-size:13px;"><i>format masa:- </i>HH:MM:SS</p>
			<div class="d-flex justify-content-center">
					<?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Tambah'"); ?>
					<?php buttonElement("btn-read","btn btn-primary","<i class='fa fa-eye'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Lihat'"); ?>
					<?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-sync-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Kemaskini'"); ?>
					<?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Padam'"); ?>
					<?php deleteBtn();?>
			</div>
            </form>
        </div>
		<br>
        <!-- Bootstrap table  -->
        <div class="d-flex table-data" style="overflow-x:auto;">
            <table class="table table-striped table-bordered">
                <thead class="thead">
                    <tr>
						<th>BIL</th>
                        <th>TARIKH</th>
                        <th>SKOP TUGAS</th>
                        <th>DARI</th>
                        <th>HINGGA</th>
                        <th>JAM BEKERJA</th>
						<th>STATUS</th>
						<th></th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   <?php


                   if(isset($_POST['read'])){
                       $result = getData();

                       if($result){

                           while ($row = mysqli_fetch_assoc($result)){ ?>

                               <tr>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['tarikh']; ?></td>
								   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['skop_tugas']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['dari']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['hingga']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['jam_kerja']; ?></td>
								   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></td>
                                   
                                   <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>" title="Ubah"></i></td>
								   
                               </tr>

                   <?php
                           }

                       }
                   }


                   ?>
                </tbody>
            </table>
        </div>
		<center><div class="container" style="overflow-x:auto;"><br>
	<br>
	<table style="text-align:left;border-collapse:collapse;" border=2 width=90%>
	<tr>
		<td><b>NOTA</b>
		<br>1. Maksimum bayaran jam bekerja adalah <b>6 jam seminggu bagi penerima Skim UPTA</b>
		<br>2. Bayaran elaun adalah <b>RM 25.00 per jam</b>
		</td>
	</tr>
	</table>
	<br><br></div></center>
	<br>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../phpcrud/php/main.js"></script>
	<div class="container mt-3">
		<div class="card card-body bg-light text-center">
			<p style="font-size:12px;">
				created by &nbsp Muhammad Syakir &nbsp|&nbsp Nurkhamarina Ashiqin &nbsp|&nbsp Khadijah Aminah
				<br>CS2536A &nbsp 2020</p>
		</div>
	</div>
</body>
</html>