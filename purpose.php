<?php
	header('Content-Type: text/json');
	$sitepurpose=array('{"purpose":"This purpose of the site is to give you a social 
		media site where you can meet friends"}');
	echo json_encode($sitepurpose);
?>