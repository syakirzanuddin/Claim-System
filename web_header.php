<?php require_once "web/header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">NAMA PELAJAR</label> <span
            id="nama-info" class="info"></span><br /> <input type="text"
            name="nama" id="nama" class="demoInputBox">
    </div>
    <div>
        <label>NO. PELAJAR</label> <span id="nopelajar-info"
            class="info"></span><br /> <input type="text"
            name="nopelajar" id="nopelajar" class="demoInputBox">
    </div>
    <div>
        <input type="tambah" name="Tambah" id="btnTambah" value="Add" />
    </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"
    type="text/javascript"></script>
<script>
function validate() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#nama").val()) {
        $("#nama-info").html("(*)");
        $("#nama").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#nopelajar").val()) {
        $("#nopelajar-info").html("(*)");
        $("#nopelajar").css('background-color','#FFFFDF');
        valid = false;
    }
    return valid;
}
</script>
</body>
</html>