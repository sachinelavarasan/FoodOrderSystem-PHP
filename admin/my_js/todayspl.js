var attachmentRepeaterCount = 0;
function validation()
{
    var result = "";
  	var len = document.getElementsByName("item").length;
    var price = document.getElementsByName("price");
	var item = document.getElementsByName("item");
	for(var i = 0 ; i < len ; i++)
	{
		if((item[i].value) == "")
		{
            warning("Please select item");
           	result = 0;
		}
		else if((price[i].value) == "")
		{
            warning("Please enter qty");
            result = 0;
		}
		else
		{
			result = 1;
		}
	}
	return result;
}

function saved()
{
	var items = [];
    var prices = [];
	var space = "";
    
	    var len = document.getElementsByName("item").length;
    if(validation() > 0)
    {
	var price = document.getElementsByName("price");
	var item = document.getElementsByName("item");

	for(var i = 0 ; i < len ; i++)
	{
		   space=item[i].value;
		   space = space.replace(' ', '');
		   space = space.replace('()', ' ');
            prices.push(price[i].value);
			items.push(space);
	}
	
    $.ajax({
        type: "POST",
        url: "tospl.php",
        data: {
            action : "add",
            items: items,
            prices: prices
        },
        cache: false,
        success: function(response) {
			getItemByDate();
			clearForm(); 
            success(response);
			
			     
        },
        error: function(xhr, status, error) {
            console.error(status);
        }
    });

    }
   
}
function addAttachmentRow()
{
	var attachmentRowId = "attachment-row-" + attachmentRepeaterCount;
    var htmlText = "<div class='input-group-append col-sm-9 mt-2 attachment-row'  id=\"" + attachmentRowId + "\">" + 
                     "<input type='text' class='form-control form-control-sm mr-3' name='item' placeholder='Enter Food Name'>" +
					"<input type='number' class='form-control form-control-sm' name='price' placeholder='Enter Food Price' min ='1'>" +
					"<button class='btn btn-danger btn-sm ml-3 attachment-removebtn' type='button' onclick='removeAttachmentRow(\"" + attachmentRowId + "\")'><span class='fa fa-times'></span></button>" +
					"<button class='btn btn-success btn-sm ml-3 attachment-addbtn' type='button' onclick='addAttachmentRow()'><span class='fa fa-plus'></span></button>" +
					"</div>";
	$("#attachment-div").append(htmlText);
	attachmentRepeaterCount++;
	togglePlusAndMinus();
}

function removeAttachmentRow(attachmentRowId)
{
	$("#" + attachmentRowId).remove();
	togglePlusAndMinus();
}
function removeAllAttachmentRow()
{
	$(".attachment-row").remove();
}

function togglePlusAndMinus()
{
	var attachmentDivElement = document.getElementById("attachment-div");
	var childrenElement = attachmentDivElement.children;
	var lastIndex = (childrenElement.length)-1;
	var lastChildElement =  childrenElement[lastIndex];
	
	$(".attachment-addbtn").hide();//Hiding all add buttons 
	$("#" + lastChildElement.id + " .attachment-addbtn").show(); // displaying last elements add button only
	if(childrenElement.length == 1){
		$("#" + lastChildElement.id + " .attachment-removebtn").hide();//Hiding remove button if the child element is 1
	}else{
		$(".attachment-removebtn").show();
	}
}
function getItemByDate()
{
    $.ajax({
        type: "POST",
        url: "tospl.php",
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
		var foodArray = responseObj;
		var food = null;
		var price = null;
		var deleted = null;
		var htmlText = "";
		htmlText += "<table class='table table-bordered'><tr><th style='background-color:darkblue;color:white;'>Food Names</th><th style='background-color:darkblue;color:white;'>Price (Rs)</th><th style='background-color:darkblue;color:white;'>Status</th>";
//		<th style='background-color:darkblue;color:white;'>Delete</th></tr>";
		for(i = 0;i < foodArray.length;i++)//countryArray.length is the length of reponseObj
		{
			food = decodeURIComponent(foodArray[i]['food']);
			deleted = foodArray[i]['deleted'];
			price = foodArray[i]['price'];
			htmlText += "<tr><td>"+food+"</td>";
			htmlText += "<td>" +price +"</td>";
			if(deleted == 0)
			{
				htmlText += "<td style='color:green;font-weight:bold;'>Available</td></tr>";
			}	
			else
			{
				htmlText += "<td style='color:red;font-weight:bold;'>Not Available</td></tr>";
			}
		}
		htmlText += "</table>";
		document.getElementById("state-table-div").innerHTML = htmlText;
	}
	
}

		