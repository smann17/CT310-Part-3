// fieldID to insert into: "purpose_text"

function getPurpose(vurl, loginVerif){
	var prequest = new XMLHttpRequest();
	newurl = vurl.concat("/purpose.php");
	//newurl = "purpose.php"
	//alert(url);
	prequest.onreadystatechange = function(){
		if(prequest.readyState == 4 && prequest.status == 200){
			var results = JSON.parse(prequest.responseText);
						//alert(request.responseText);
			parseResults(results, vurl, loginVerif);
			

		}else if(prequest.readyState == 4 && prequest.status != 200){
			//alert("Error retrieving partner information");
		} else if (prequest.status >= 400){
			if (loginVerif==1){
				$("a[href='" + vurl + "']").attr('title', 'No information available');
			}
			else {
				$("a[href='" + vurl + "']").attr('title', null);
			}
			$("a[href='" + vurl + "']").css('color', '#500000');
			$("a[href='" + vurl + "']").attr('href', null);
		} 

	}
	prequest.timeout = 5000;
	prequest.ontimeout = function() {
		alert("Error :: Time Out");
	}
	prequest.open("GET", newurl, true);
	prequest.send();
	
	
}

function parseResults(arr, vurl, loginVerif){
	if (loginVerif==1){
		if (Array.isArray(arr)){
			$("a[href='" + vurl + "']").attr('title', arr[0].purpose);
		}
		else {
			$("a[href='" + vurl + "']").attr('title', arr.purpose);
		}
	}
	else {
		$("a[href='" + vurl + "']").attr('title', null);
	}
	/*
	if(Array.isArray(arr)){
		return arr[0].purpose;
	}else{
		return arr.purpose;
	}*/
}
