function receipt()
{
    $.ajax({
        type: "POST",
        url: "todaysub.php",
        data: {
            action : "getalltodaybills",
        },
        cache: false,
        success: function(response) {
			responsegetbillByDate(response);
			            
        },
        error: function(xhr, status, error) {
            var responseObj = error;
		     alert(responseObj);
        }
    });
}
function responsegetbillByDate(response)
{
	if(response)
	{
		var responseObj = response;
		foodArray = responseObj;
		var tno = null;
		var billno = null;
		var time = null;
		var total = null;
		var food = null;
		var qty = null;
		var id = null;
		var htmlText = "";
		htmlText += "<table class='table table-bordered table-hover'><tr><th style='background-color:salmon;color:white;'>Bill No</th><th style='background-color:salmon;color:white;'>Foods</th><th style='background-color:salmon;color:white;'>Prices</th><th style='background-color:salmon;color:white;'>Total</th><th style='background-color:salmon;color:white;'>Time</th><th style='background-color:salmon;color:white;'>Amount Payment</th>";
//		<th style='background-color:darkblue;color:white;'>Delete</th></tr>";
		for(i = 0;i < foodArray.length;i++)
		{
			food = foodArray[i]['item'];
			food = food.replace(/[{""}]/g, '');
			food = food.replace(/[:]/g, '&nbsp:&nbsp');
			food = food.replace(/[,]/g, '<br>');
			billno = foodArray[i]['billno'];
			qty = foodArray[i]['qty'];
			qty = qty.replace(/[,]/g, '<br>');
            total = foodArray[i]['total'];
			time = foodArray[i]['time'];
			id = foodArray[i]['id'];
			htmlText += "<tr><td>"+billno+"</td>";
			if(food == "")
			{
				htmlText += "<td>No Order for this Billno</td>";
				htmlText += "<td> 0 </td>";
			}
			else{
			htmlText += "<td>"+food+"</td>";
			htmlText += "<td>"+qty+"</td>";
			}
			htmlText += "<td>"+total+"</td>";
			htmlText += "<td>"+time+"</td>";
			htmlText += "<td><button class='btn btn-info btn-xs' onclick='deletePayment(\"" + id + "\")'>Payment</button></td></tr>";
			
		}
		htmlText += "</table>";
		document.getElementById("todayorder").innerHTML = htmlText;
	}
	
}
function deletePayment(id)
{
	$.ajax({
        type: "POST",
        url: "todaysub.php",
        data: {
            action : "payment",
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
