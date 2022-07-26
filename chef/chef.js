function getItemByDate()
{
    $.ajax({
        type: "POST",
        url: "chef_db.php",
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
		var id=0;
		var htmlText = "";
		htmlText += "<table class='table table-bordered table-hover text-center'><tr><th style='background-color:salmon;color:white;'>Food Names</th><th style='background-color:salmon;color:white;'>Status</th>";
//		<th style='background-color:darkblue;color:white;'>Delete</th></tr>";
		for(i = 0;i < foodArray.length;i++)//countryArray.length is the length of reponseObj
		{
			food = decodeURIComponent(foodArray[i]['food']);
			id = decodeURIComponent(foodArray[i]['id']);
			htmlText += "<tr><th>"+food+"</th>";
			htmlText += "<td><button class='btn btn-danger btn-sm' onclick='itemStatus(\"" + id + "\")'>Delete</button></td></tr>";
		}
		htmlText += "</table>";
		document.getElementById("state-table-div").innerHTML = htmlText;
	}
	
}
function getorderByDate()
{
    $.ajax({
        type: "POST",
        url: "chef_db.php",
        data: {
            action : "getalltodayorder",
        },
        cache: false,
        success: function(response) {
			responsegetorderByDate(response);
			            
        },
        error: function(xhr, status, error) {
            var responseObj = error;
		     alert(responseObj);
        }
    });
}
function responsegetorderByDate(response)
{
	if(response)
	{
		var responseObj = response;
		foodArray = responseObj;
		var tno = null;
		var food = null;
		var qty = null;
		var id = null;
		var htmlText = "";
		htmlText += "<table class='table table-bordered table-hover'><tr><th style='background-color:salmon;color:white;'>Table No</th><th style='background-color:salmon;color:white;'>Foods</th><th style='background-color:salmon;color:white;'>Quantity</th><th style='background-color:salmon;color:white;'>Food Status</th>";
//		<th style='background-color:darkblue;color:white;'>Delete</th></tr>";
		for(i = 0;i < foodArray.length;i++)
		{
			food = foodArray[i]['items'];
			food = food.replace(/[,]/g, '<br>');
			tno = foodArray[i]['tno'];
			qty = foodArray[i]['qty'];
			qty = qty.replace(/[,]/g, '<br>');
			id = foodArray[i]['id'];
			htmlText += "<tr><td>"+tno+"</td>";
			htmlText += "<td>"+food+"</td>";
			htmlText += "<td>"+qty+"</td>";
			htmlText += "<td><button class='btn btn-info btn-xs' onclick='orderStatus(\"" + id + "\")'>Order Status</button></td></tr>";
		}
		htmlText += "</table>";
		document.getElementById("todayorder").innerHTML = htmlText;
	}
	
}

function orderStatus(id)
{
	$.ajax({
        type: "POST",
        url: "chef_db.php",
        data: {
            action : "status",
			id : id
        },
        cache: false,
        success: function(response) {
			success(response);
			            
        },
        error: function(xhr, status, error) {
            var responseObj = error;
		     alert(responseObj);
        }
    });
	
}
function itemStatus(id)
{
	
	$.ajax({
        type: "POST",
        url: "chef_db.php",
        data: {
            action : "itemstatus",
			id : id
        },
        cache: false,
        success: function(response) {
			success(response);
			            
        },
        error: function(xhr, status, error) {
            var responseObj = error;
		     alert(responseObj);
        }
    });
	
}




 




 
