<?php
	header("Access-Control-Allow-Origin: *");
	header('Content-Type: text/json');
	$sitepurpose=array('purpose' => "This purpose of Group 4's site (which is Sean, Curtis, and Kyle) site is to give you a social media site where you can meet friends");
	echo json_encode($sitepurpose);
?>