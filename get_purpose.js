// fieldID to insert into: "purpose_text"

function getPurpose(url){
	var request = new XMLHttpRequest();
	newurl = url.concat("/purpose.php");
	//newurl = "purpose.php"
	//alert(url);
	request.onreadystatechange = function(){
		if(request.readyState == 4 && request.status == 200){
			var results = JSON.parse(request.responseText);
			//alert(request.responseText);
			return parseResults(results);
		}else if(request.readyState == 4 && request.status != 200){
			return "Error retrieving partner information";
		}else{
			return "It really doesn't work";
		}
	}
	request.timeout = 5000;
	request.ontimeout = function() {
		return "Error :: Time Out";
	}
	request.open("GET", newurl, true);
	//request.setRequestHeader("Access-Control-Allow-Origin", "*");
	request.send();
	
	
}

function parseResults(arr){
		var i;
		//for(i = 0; i < arr.length; i++){
			// handle if a single partner site is down
			return arr[0].purpose;
		//}
		
	}
