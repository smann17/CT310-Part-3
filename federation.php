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
	<div id="federation_display"></div>
	
	
</div>

<script type="text/javascript">
	var request = new XMLHttpRequest();
	var url = "http://www.cs.colostate.edu/~ct310/yr2015sp/project/roster.php?key=WQT3xKmVV7" ;
	
	request.onreadystatechange = function(){
		if(request.readyState == 4 && request.status == 200){
			var results = JSON.parse(request.responseText);
			//alert(request.responseText);
			parseResults(results);
		}else if(request.readyState == 4 && request.status != 200){
			document.getElementById("federation_display").innerHTML = "<p>Error retrieving partner sites</p>";
		}
	}
	request.timeout = 5000;
	request.ontimeout = function() {
		document.getElementById("federation_display").innerHTML = "<p>Error :: Time Out</p>";
	}
	request.open("GET", url, true);
	request.send();
	
	function parseResults(arr){
		//
		var out = "";
		var i;
		//alert(arr.length);
		for(i = 0; i < arr.length; i++){
			// handle if a single partner site is down
			out += '<a href="' + arr[i].url + '" title = "test">' + arr[i].name + '</a>' +'<br>';
		//	if(i % 3 == 0){
			//	out += '<br>';
		//	}
		}
		document.getElementById("federation_display").innerHTML = out;
	}
</script>

<?php
	include_once("inc/rightContent.php");
	include("inc/footer.php");
?>
