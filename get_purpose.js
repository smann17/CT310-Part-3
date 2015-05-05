// fieldID to insert into: "purpose_text"

function getPurpose(vurl){
	var prequest = new XMLHttpRequest();
	newurl = vurl.concat("/purpose.php");
	//newurl = "purpose.php"
	//alert(url);
	prequest.onreadystatechange = function(){
		if(prequest.readyState == 4 && prequest.status == 200){
			var results = JSON.parse(prequest.responseText);
			//alert(request.responseText);
			return parseResults(results);
		}else if(prequest.readyState == 4 && prequest.status != 200){
			alert("Error retrieving partner information");
		}else if(prequest.status == 404){
			alert("It really doesn't work");
		}
	}
	prequest.timeout = 5000;
	prequest.ontimeout = function() {
		return "Error :: Time Out";
	}
	prequest.open("GET", newurl, true);
	//request.setRequestHeader("Access-Control-Allow-Origin", "*");
	prequest.send();
	
	
}

function parseResults(arr){
		//for(i = 0; i < arr.length; i++){
			// handle if a single partner site is down
			return arr[0].purpose;
		//}
		
	}
