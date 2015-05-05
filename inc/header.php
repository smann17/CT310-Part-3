<?php
	include_once("./lib/config.php");
	include_once("./lib/util.php");

	session_name( "Project_Part2");
	session_start();

	if (! isset ( $_SESSION ['startTime'])) {
				$_SESSION ['startTime'] = time();
			}
			if (! isset ( $_SESSION ['firstName'])) {
				$_SESSION ['firstName'] = "Guest";
			}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="UTF-8">
	 <meta name="author" content="" />
	 <meta name="description" content="" />
	 <meta name="keywords" content="" />
	 <link href="//www.cs.colostate.edu/~cs310/yr2015sp/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <title><?php echo $title ?> -  Social Network</title>
	 <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<header>
		<div id="page-logo">
			<a href="index.php">
				<div id="link-to-home">
					<h1>Group KEWL - Social Network<br/></h1>
					<h2><?php echo $title; ?></h2>
				</div>
			</a>
		</div>	
		<nav>
			<ul>
				<li><a id="home-nav" href="index.php">Home</a></li>
				<li><a id="search-page" href="search.php">Search Page</a></li>
				<li><a id="Profile" href="myProfile.php">My Profile</a></li>
				<li><a id="Federation" href="federation.php">Federation Sites</a></li>
				
			</ul>
		</nav>
	<!-- 	<div class="space"></div> -->
		
<!-- 		<div class="page-info">
			<h1><?php echo $title; ?></h1>
		</div> -->	

		
	</header>
	<main>
