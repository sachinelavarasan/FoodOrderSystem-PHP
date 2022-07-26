var attachmentRepeaterCount = 0;
var foodArray =[];
var foodie = {};
var items = [];
var prices = [];
var qtys = [];
var n = 0;

function validation()
{
    var result = "";
    var items = [];
	var qtys = [];
	var len = document.getElementsByName("item").length;
    var qty = document.getElementsByName("qty");
	var item = document.getElementsByName("item");
	for(var i = 0 ; i < len ; i++)
	{
		if((item[i].value) == "")
		{
            warning("Please select item");
           	result = 0;
		}
		else if((qty[i].value) == "")
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
		var price = null;
		var htmlText = "";
		htmlText += "<table class='table table-bordered'><tr><th style='background-color:darkblue;color:white;'>Food Names</th><th style='background-color:darkblue;color:white;'>Price (Rs)</th>";
//		<th style='background-color:darkblue;color:white;'>Delete</th></tr>";
		for(i = 0;i < foodArray.length;i++)//countryArray.length is the length of reponseObj
		{
			food = decodeURIComponent(foodArray[i]['food']);
			price = foodArray[i]['price'];
			htmlText += "<tr><td>"+food+"</td>";
			htmlText += "<td>" +price +"</td></tr>";	
		}
		htmlText += "</table>";
		document.getElementById("state-table-div").innerHTML = htmlText;
	}
	
	
}
	
function addAttachmentRow()
{
	var attachmentRowId = "attachment-row-" + attachmentRepeaterCount;
	var foodName ="";
    var htmlText = "<div class='input-group-append col-sm-9 mt-2 attachment-row'  id=\"" + attachmentRowId + "\">" + 
					"<select name='item' class='selectpicker form-control form-control-sm fixed-width mx-3' data-size='5' data-style='btn-info' title='Select Your Food' data-live-search='true'>";
				for(i = 0;i < foodArray.length;i++)//countryArray.length is the length of reponseObj
					{
						foodName = decodeURIComponent(foodArray[i]['food']);
						htmlText += "<option value=\""+foodName+"\">" + foodName + "</option>";		
					}
					htmlText += "</select>"+
					"<input type='number' class='form-control form-control-sm' name='qty' placeholder='Enter Food Qty' min='1'>" +
					"<button class='btn btn-danger btn-sm ml-3 attachment-removebtn' type='button' onclick='removeAttachmentRow(\"" + attachmentRowId + "\")'><span class='fa fa-times'></span></button>" +
					"<button class='btn btn-success btn-sm ml-3 attachment-addbtn' type='button' onclick='addAttachmentRow()'><span class='fa fa-plus'></span></button>" +
					"</div>";
	$("#attachment-div").append(htmlText);
	$('.selectpicker').selectpicker({
	    style: 'btn-info',
	    size: 15,
	    });
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
function add()
{
ite = "";
qt = 0;
value = 0;
var food =[];
var coun = [];
var len = document.getElementsByName("item").length;
if(validation() > 0)
{
var qty = document.getElementsByName("qty");
var item = document.getElementsByName("item");

for(var i = 0 ; i < len ; i++)
{
		qt=qty[i].value;
		ite = item[i].value;
		qtys.push(qty[i].value);
		items.push(item[i].value);
		coun.push(qty[i].value);
		food.push(item[i].value);

		if(foodie.hasOwnProperty(ite))
		{
			value = foodie[ite];
			foodie[ite] = parseInt(value)+parseInt(qt);			
		}
	  else{
		foodie[ite] = qt;
		}
}

var stritem = food.toString();
var strqty = coun.toString();

$.ajax({
	type: "POST",
	url: "order.php",
	data: {
		action : "order",
		items: stritem,
		qtys: strqty
	},
	cache: false,
	success: function(response) {
		success(response);
		bill();
		clearForm();
		   
	},
	error: function(xhr, status, error) {
		console.error(xhr);
	}
});

}

}
 

function bill()
{
	var x = Object.keys(foodie).length;
	var price ="";
	var htmlText = "";
	htmlText += "<table class='table table-bordered text-center' id='table'><tr><th style='background-color:darkblue;color:white;'>Food Names</th><th style='background-color:darkblue;color:white;'>Quantity</th><th style='background-color:darkblue;color:white;'>Price</th>";
	for(i = 0;i<x;i++)
	{		
	
			for(var j = 0;j<foodArray.length;j++)
              {
				if(Object.keys(foodie)[i] == foodArray[j]['food']) 
				 {
						price = Object.values(foodie)[i]*foodArray[j]['price'];
                        prices.splice(i, 1, price);
						htmlText += "<tr><td>"+Object.keys(foodie)[i]+"</td>";
			            htmlText += "<td>" +Object.values(foodie)[i] +"</td>";
						htmlText += "<td>" +price +"</td></tr>";
										
				 }  
			  }
		}
		
	htmlText += "</table>";
	document.getElementById("bill").innerHTML = htmlText;
}
function billmain()
{
	var tot = 0;
	for(var z = 0;z<prices.length;z++)
			{
				tot = tot+prices[z];
			}
	
	swal.fire({
		title: 'Are you sure? - Your Amount - ' + tot,
		text: "It will destroy Your order ",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: '<i class="fa fa-times"></i>Cancel',
		confirmButtonText: 'Yes, Send it! <i class="fa fa-thumbs-up"></i>',
	  }).then( result=> {
		if (result.value) {
		var fullbill = JSON.stringify(foodie);
		var mon = prices.toString();		
		$.ajax({
			type: "POST",
			url: "order.php",
			data: {
				action : "main",
				bill : fullbill,
				money : mon,
				total : tot
			},
			cache: false,
			success: function(response) {
				success("Thank you visit again");
				clearForm();
				window.location = "nextpage.php";
				   
			},
			error: function(xhr, status, error) {
				console.error(xhr);
			}
		});
	}
		
	  })	
	
}



