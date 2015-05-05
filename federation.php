<?php
	$title = "Federation";
	
	include("inc/header.php");
	include("lib/files.php");
	include 'database.php';
	require_once("user.php");
	$util = new util();
?>
<div class="white"></div>
<div class="leftContent" style= "color :white;">
	<p style="font-size:20px;">Federation of Social Networking Sites</p><br>
	
</div>
<?php
	include_once("inc/rightContent.php");
	include("inc/footer.php");
?>