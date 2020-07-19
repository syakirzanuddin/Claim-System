<?php require_once "web/header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
    <div>
        <input type="date" name="attendance_date" id="attendance_date" class="demoInputBox"> <span id="attendance_date-info" class="info"></span>
    </div>
    <div id="toys-grid">
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Student</strong></th>
                    <th><strong>Present</strong></th>
                    <th><strong>Absent</strong></th>

                </tr>
            </thead>
            <tbody>
                    <?php 
            if (! empty($studentResult)) {
                foreach ($studentResult as $k => $v) {
            ?>
          <tr>
                    <td><input type="hidden"
            name="nopelajar[]" id="nopelajar" value = "<?php echo $studentResult[$k]["id"]; ?>">
            <?php echo $studentResult[$k]["name"]; ?></td>
                    <td><input type="radio" name="attendance-<?php echo $studentResult[$k]["id"]; ?>" value="present" checked /></td>
                    <td><input type="radio" name="attendance-<?php echo $studentResult[$k]["id"]; ?>" value="absent" /></td>
                </tr>
                    <?php
                        }
                    }
                    ?>
            <tbody>
        
        </table>
        
    </div>
   <div>
        <input type="submit" name="add" id="btnSubmit" value="Add" />
    </div> 
</form>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"
    type="text/javascript"></script>
<script>
function validate() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#attendance_date").val()) {
        $("#attendance_date-info").html("(required)");
        $("#attendance_date").css('background-color','#FFFFDF');
        valid = false;
    } 
    return valid;
switch ($action) {
    
    ...
    
    case "attendance-add":
    if (isset($_POST['add'])) {
        $attendance = new Attendance();
        
        $attendance_timestamp = strtotime($_POST["attendance_date"]);
        $attendance_date = date("Y-m-d", $attendance_timestamp);
        
        if(!empty($_POST["nopelajar"])) {
            $attendance->deleteAttendanceByDate($attendance_date);
            foreach($_POST["nopelajar"] as $k=> $nopelajar) {
                $present = 0;
                $absent = 0;
                
                if($_POST["attendance-$nopelajar"] == "present") {
                    $present = 1;
                }
                else if($_POST["attendance-$nopelajar"] == "absent") {
                    $absent = 1;
                }
                
                $attendance->addAttendance($attendance_date, $nopelajar, $present, $absent);
            }
        }
        header("Location: index.php?action=attendance");
    }
    $student = new Student();
    $studentResult = $student->getAllStudent();
    require_once "web/attendance-add.php";
    break;

case "attendance-edit":
    $attendance_date = $_GET["date"];
    $attendance = new Attendance();
    if (isset($_POST['add'])) {
        $attendance->deleteAttendanceByDate($attendance_date);
        if(!empty($_POST["nopelajar"])) {
            foreach($_POST["nopelajar"] as $k=> $nopelajar) {
                $present = 0;
                $absent = 0;
                
                if($_POST["attendance-$nopelajar"] == "present") {
                    $present = 1;
                }
                else if($_POST["attendance-$nopelajar"] == "absent") {
                    $absent = 1;
                }
                
                $attendance->addAttendance($attendance_date, $nopelajar, $present, $absent);
            }
        }
        header("Location: index.php?action=attendance");
    }
    
    $result = $attendance->getAttendanceByDate($attendance_date);
    
    $student = new Student();
    $studentResult = $student->getAllStudent();
    require_once "web/attendance-edit.php";
    break;

case "attendance-delete":
    $attendance_date = $_GET["date"];
    $attendance = new Attendance();
    $attendance->deleteAttendanceByDate($attendance_date);
    
    $result = $attendance->getAttendance();
    require_once "web/attendance.php";
    break;

case "attendance":
    $attendance = new Attendance();
    $result = $attendance->getAttendance();
    require_once "web/attendance.php";
    break;
}


}
</script>
</body>
</html>