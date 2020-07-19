<?php
session_start();
session_destroy();
echo '<br><center>You have been sucessfully logged out.
<br><a href="index.php">Go back</a></center>';
