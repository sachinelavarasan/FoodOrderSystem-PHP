function getItemByDate()
{
    $.ajax({
        type: "POST",
        url: "order.php",
        data: {
            action : "getalltodayitems",
        },
        cache: false,
        success: function(response) {
			responsegetItemByDate(response);
			            
        },
        error: function(xhr, status, error) {
            var responseObj = error;
		     alert(responseObj);
        }
    });
}
function responsegetItemByDate(response)
{
	if(response)
	{
		var responseObj = response;
		console.log(responseObj);
		foodArray = responseObj;
		var food = null;
		var htmlText = "";
		htmlText += "<table class='table table-bordered table-hover text-center'><tr><th style='background-color:salmon;color:white;'>Food Names</th>";
//		<th style='background-color:darkblue;color:white;'>Delete</th></tr>";
		for(i = 0;i < foodArray.length;i++)//countryArray.length is the length of reponseObj
		{
			food = decodeURIComponent(foodArray[i]['food']);
			htmlText += "<tr><th>"+food+"</th></tr>";
		}
		htmlText += "</table>";
		document.getElementById("state-table-div").innerHTML = htmlText;
	}
	
}



 
