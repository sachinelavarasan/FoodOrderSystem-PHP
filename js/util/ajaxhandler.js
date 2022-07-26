	function getXmlHTTPObject(){
			if (window.XMLHttpRequest){
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlHTTPObject = new XMLHttpRequest();
			}else if (window.ActiveXObject){
				// 	code for IE6, IE5
				xmlHTTPObject = new ActiveXObject("Microsoft.XMLHTTP");
			}else {
				alert("Your browser does not support XMLHTTP!");
			}
		return xmlHTTPObject;
	}
	
	function sendAJAXRequest(url,params,callbackMethod){
		var ajaxRequestObj = getXmlHTTPObject();
		
		if(ajaxRequestObj != null){
			ajaxRequestObj.open("POST", url, true);
			if(params != null)
				
				ajaxRequestObj.setRequestHeader("Content-length",params.length);
				ajaxRequestObj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				ajaxRequestObj.setRequestHeader("Connection","close");
				
				ajaxRequestObj.onreadystatechange = function() {
					if(ajaxRequestObj.readyState == 4){
						if(ajaxRequestObj.status == 200){
							var isSuccess = false;
							var responseText = ajaxRequestObj.responseText;
							if(responseText != null){
								try{
									
									var responseObj = JSON.parse(responseText);
							        if(responseObj.error == undefined){
										isSuccess = true;
									}else{
										isSuccess = false;
									}
							    }catch (e) {
							    	isSuccess = false;
							    }
							}
							var responseTextStr = trim(ajaxRequestObj.responseText);
							var fnParams = [responseTextStr,isSuccess];
							var fn = window[callbackMethod];
							if(typeof fn === "function"){
								fn.apply(null,fnParams);
							}
						}
					}
				};
			ajaxRequestObj.send(params);
		}
	}