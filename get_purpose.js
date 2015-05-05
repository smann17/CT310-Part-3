// fieldID to insert into: "purpose_text"

function getPurpose(var url){
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
		if(request.readyState == 4 && request.status == 200){
			var results = JSON.parse(request.responseText);
			alert(request.responseText);
			parseResults(results);
		}else if(request.readyState == 4 && request.status != 200){
			document.getElementById("purpose_text").innerHTML = "<p>Error retrieving partner information</p>";
		}
	}
	request.timeout = 5000;
	request.ontimeout = function() {
		document.getElementById("purpose_text").innerHTML = "<p>Error :: Time Out</p>";
	}
	request.open("GET", url, true);
	request.send();
	
	function parseResults(arr){
		var i;
		for(i = 0; i < arr.length; i++){
			// handle if a single partner site is down
			document.getElementById("purpose_text").innerHTML = arr[i].purpose;
		}
		
	}
}