<?php

require_once ("../phpcrud/php/component.php");
require_once ("../phpcrud/php/operation.php");
require_once ("../phpcrud/php/db.php");

/* // Define variables and initialize with empty values
$nama = $kursus = $semester = $no_pelajar = $no_kp = $no_akaun = $bank = $bulan = $tahun = "";
$nama_err = $kursus_err = $semester_err = $nopelajar_err = $nokp_err = $noakaun_err = $bank_err = $bulan_err = $tahun_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_nama = trim($_POST["nama"]);
    if(empty($input_nama)){
        $nama_err = "Please enter a name.";
    } elseif(!filter_var($input_nama, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nama_err = "Please enter a valid name.";
    } else{
        $nama = $input_nama;
    }
    
    // Validate kursus 
    $input_kursus = trim($_POST["kursus"]);
    if(empty($input_kursus)){
        $kursus_err = "Please enter an kursus.";     
    } else{
        $kursus = $input_kursus;
    }
    
    // Validate semester
    $input_semester = trim($_POST["semester"]);
    if(empty($input_semester)){
        $semester_err = "Please enter the semester amount.";     
    } elseif(!ctype_digit($input_semester)){
        $semester_err = "Please enter a positive integer value.";
    } else{
        $semester = $input_semester;
    }
	
	// Validate tarikh 
    $input_tarikh = trim($_POST["tarikh"]);
    if(empty($input_tarikh)){
        $nopelajar_err = "Masukkan tarikh yang sah.";     
    } else{
        $tarikh = $input_tarikh;
    }
	
	// Validate tugas
    $input_tugas = trim($_POST["tugas"]);
    if(empty($input_tugas)){
        $nokp_err = "Pilih tugas anda.";     
    } else{
        $tugas = $input_tugas;
    }
	
	// Validate dari
    $input_dari = trim($_POST["dari"]);
    if(empty($input_dari)){
        $noakaun_err = "Dari jam?";     
    } elseif(!ctype_digit($input_dari)){
        $noakaun_err = "Please enter a positive integer value.";
    } else{
        $dari = $input_dari;
    }
	
	// Validate hingga
    $input_hingga = trim($_POST["hingga"]);
    if(empty($input_hingga)){
        $bank_err = "hingga jam?";     
    } elseif(!ctype_digit($input_hingga)){
        $bank_err = "Please enter a positive integer value.";
    } else{
        $hingga = $input_hingga;
    }
	
	// Validate jam
    $input_jam = trim($_POST["jam"]);
    if(empty($input_jam)){
        $bulan_err = "Bilangan jam";     
    } elseif(!ctype_digit($input_jam)){
        $bulan_err = "Please enter a positive integer value.";
    } else{
        $jam = $input_jam;
    }
	
    
    // Check input errors before inserting in database
    if(empty($nama_err) && empty($kursus_err) && empty($semester_err) && empty($nopelajar_err) && empty($nokp_err)
		&& empty($noakaun_err) && empty($bank_err) && empty($bulan_err)){
        // Prepare an update statement
        $sql = "UPDATE employees SET name=?, kursus=?, semester=?, tarikh=?, tugas=?, dari=?, hingga=?, jam=?, WHERE id=?";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssssssi", $param_name, $param_kursus, $param_semester, $param_tarikh, $param_tugas, $param_dari, $param_hingga, $param_jam, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_kursus = $kursus;
            $param_semester = $semester;
			$param_tarikh = $tarikh;
            $param_tugas = $tugas;
            $param_dari = $dari;
			$param_hingga = $hingga;
            $param_jam = $jam;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: formstudent.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE id = ?";
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $result = $stmt->get_result();
                
                if($result->num_rows == 1){
                    // Fetch result row as an associative array. Since the result set
                    //contains only one row, we don't need to use while loop 
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $kursus = $row["kursus"];
                    $semester = $row["semester"];
					$tarikh = $row["tarikh"];
                    $tugas = $row["tugas"];
                    $dari = $row["dari"];
					$hingga = $row["hingga"];
                    $jam = $row["jam"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
        
        // Close connection
        $mysqli->close();
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
} */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skim Pembantu Pengajaran Pascasiswazah UiTM (UPTA)</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<main>
    <div class="container text-center">
        <h2 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i>  PENYATA TUNTUTAN<BR>SKIM PEMBANTU PENGAJARAN PASCASISWAZAH UiTM (UPTA)<br></h2>
		
		<br>
	<center><div class="container" style="overflow-x:auto;"><br>
	<h4>Maklumat Pemohon Tuntutan UPTA</h4>
	<br><table style="text-align:center;border-collapse:collapse;" border=2 width=90%>
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
	<br><br><?php
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
    echo "";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
		<table class='table table-borderless' align='center' cellpadding = '10' style='width:90%;'>
		<tr><td><b>NAMA</b></td><td style='border: 1px solid black;border-collapse: collapse;'>" . $row["nama"]. "</td></tr>
		 
		<tr><td><b>KURSUS</b></td><td style='border: 1px solid black;border-collapse: collapse;'>" . $row["kursus"]. "</td>
		<td><b>SEMESTER</b></td><td style='border: 1px solid black;border-collapse: collapse;'>" . $row["semester"]. "</td>
		</tr>
		 
		<tr><td><b>NO. PELAJAR</b></td><td style='border: 1px solid black;border-collapse: collapse;'>" . $row["no_pelajar"]. "</td></tr>
		
		<tr><td><b>NO. K/P</b></td><td style='border: 1px solid black;border-collapse: collapse;'>" . $row["no_kp"]. "</td></tr>
		
		<tr><td><b>NO. AKAUN</b></td><td style='border: 1px solid black;border-collapse: collapse;'>" . $row["no_akaun"]. "</td>
		<td><b>BANK</b></td><td style='border: 1px solid black;border-collapse: collapse;'>" . $row["bank"]. "</td>
		</tr>
		
		<tr><td><b>BULAN</b></td><td style='border: 1px solid black;border-collapse: collapse;'>" . $row["bulan"]. "</td>
		<td><b>TAHUN</b></td><td style='border: 1px solid black;border-collapse: collapse;'>20" . $row["tahun"]. "</td>
		</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?><br>
		</form></div></center><hr><br>
		
        <div class="d-flex justify-content-center" style="overflow-x:auto;">
            <form action="" method="post" class="w-50">
               <div class="pt-2 <?php echo (!empty($status)) ? 'has-error' : ''; ?>">
                    <label><i class="far fa-clock"></i>&nbsp <b>STATUS</b>&nbsp</label>
					<select name="status">
						<option disabled selected>Current Status: PENDING </option>
						<option value="<b>APPROVE</b>" style="color:green;"> APPROVE </option>
						<option value="<b>REJECT</b>" style="color:red;"> REJECT </option>
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
						<option> AMALI</option>
						<option> MAKMAL</option>
						<option> STUDIO</option>
						<option> TUTORIAL</option>
					</select>
                </div>
				<br>
                <div class="row pt-2">
                    <div class="col" id="start">
                        <?php inputElement("<i class='fas fa-hourglass-start'></i>","View only", "dari",""); ?>
                    </div>
                    <div class="col" id="end">
                        <?php inputElement("<i class='fas fa-hourglass-end'></i>","View only", "hingga",""); ?>
                    </div>
					<div class="col" id="time">
                        <?php inputElement("<i class='fas fa-equals'></i>","View only", "jam_kerja",""); ?>
                    </div>
					
                </div><p style="font-size:13px;"><i>format masa:- </i>HH:MM:SS</p>
				<div class="d-flex justify-content-center">
                         <?php buttonElement("btn-read","btn btn-primary","<i class='fa fa-eye'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Lihat Rekod'"); ?>
                         <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-sync-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Kemaskini'"); ?>
                        
                </div>
            </form>
        </div>
		<br>
        <!-- Bootstrap table  -->
        <div class="d-flex table-data" style="overflow-x:auto;">
            <table class="table table-bordered">
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
	<br><br>
	<a href="homestaff.php" style="border:2px solid lightblue; " class="btn">Kembali</a>
		<br><br></div></center>
	<br>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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