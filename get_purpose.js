// fieldID to insert into: "purpose_text"

function getPurpose(url){
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
		if(request.readyState == 4 && request.status == 200){
			var results = JSON.parse(request.responseText);
			alert(request.responseText);
			parseResults(results);
		}else if(request.readyState == 4 && request.status != 200){
			return "Error retrieving partner information";
		}
	}
	request.timeout = 5000;
	request.ontimeout = function() {
		return "Error :: Time Out";
	}
	request.open("GET", url, true);
	request.send();
	
	function parseResults(arr){
		var i;
		for(i = 0; i < arr.length; i++){
			// handle if a single partner site is down
			return arr[i].purpose;
		}
		
	}
}
