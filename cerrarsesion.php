<?php
session_start();
session_destroy();
setcookie('_log_', '', time()-1);
header("location:login.php");
 ?>
