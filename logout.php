<?php
	session_name( "Project_Part2");
	session_start();
$_SESSION =array();
session_unset();
session_destroy();
header("location:./login.php");
exit();
?>