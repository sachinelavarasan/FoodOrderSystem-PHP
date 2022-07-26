var stateObj = {};
var htmlText2 = [];

//GET ALL EMPLOYEES FOR LIST VIEW

function getMultipleSelectValue(elementId)
{
	var valueArray = [];
	var selectElement = document.getElementById(elementId);
	if(elementId != "" && selectElement != null){
		for(var i=0;i<selectElement.selectedOptions.length;i++)
		{
			valueArray.push("'" + selectElement.selectedOptions[i].value + "'");
		}
	}
	return valueArray.toString();
}

function getEmployeesForListview()
{
	$("#go-btn").html("<i class='fa fa-spin fa-spinner'></i> Generating Report. . .");
	$("#go-btn").attr("disabled",true);
	var country = getMultipleSelectValue("country");
	//console.log($("#country").val());//jquery
	var state = getMultipleSelectValue("state");
	var employeeStatus = getMultipleSelectValue("employee-status");
	var params = "action=getEmployeesForListview" + "&employeestatus="+ employeeStatus + "&country="+ country + "&state=" + state;
	sendAJAXRequest("../../src/controller/EmployeeController.php",params,"responseGetEmployeesForListview"); 
}
function responseGetEmployeesForListview(responseText,isSuccess)
{
	if(isSuccess == true)
	{
		var responseObj = JSON.parse(responseText);
		populateEmployeeList(responseObj);
		$("#go-btn").html("<i class='fa fa-check'></i> Go");
		$("#go-btn").attr("disabled",false);
	}
	else
	{
		var responseObj = JSON.parse(responseText);
		alert(responseObj.error);
	}
}

function populateEmployeeList(responseObj){
	var employeeArray = responseObj.response;//responseObj.response is assigned to countryArray
	var employeeId = null;
	var employeeName = null;
	var i = 0;
	var htmlText = "";
	
	htmlText += "<table class='table table-bordered table-striped' id='example1'>" +
					"<thead class='bg-info text-white text-center'>" +
					"<tr><th></th>"+
					"<th>S.No.</th>" +
					"<th>Employee Names</th>"+
					"<th>Email</th>"+
					"<th>Gender</th>"+
					"<th>Date Of Birth</th>"+
					"<th>Mobile Number</th>"+
					"<th>Address</th>"+
					"<th>Country Name</th>"+
					"<th>State Name</th>"+
					"<th>Date Of Joining</th>"+
					"<th>Is Active</th></tr></thead><tbody>";
//	<th style='background-color:darkblue;color:white;'>Delete</th></tr>";
	if(employeeArray.length > 0)
	{
		for(i = 0;i < employeeArray.length;i++)//countryArray.length is the length of reponseObj
		{
			employeeId = employeeArray[i]['employeeid'];
			employeeName = decodeURIComponent(employeeArray[i]['employeename']);
			email = decodeURIComponent(employeeArray[i]['email']);
			gender = decodeURIComponent(employeeArray[i]['gender']);
			dob = employeeArray[i]['dob'];
			dobArray = dob.split("-");
			dob = dobArray[2] + "-" + dobArray[1] + "-" +dobArray[0];  
			mobile = decodeURIComponent(employeeArray[i]['mobile']);
			address = decodeURIComponent(employeeArray[i]['address']);
			country = decodeURIComponent(employeeArray[i]['countryname']);
			state = decodeURIComponent(employeeArray[i]['statename']);
			doj = employeeArray[i]['doj'];
			dojArray = doj.split("-");
			doj = dojArray[2] + "-" + dojArray[1] + "-" +dojArray[0]; 
			isactive = decodeURIComponent(employeeArray[i]['isactive']);
//			htmlText += "<tr><td onclick='getEmployee(\"" + employeeId + "\")'>";
			isactive = isactive == 1 ? "Yes" : "No";
			
			htmlText += "<tr>";
			htmlText += "<td><input type='checkbox' onchange='toggleRowColor(this,\"" + employeeId + "\")'></td>";
			htmlText += "<td class='text-right'>" + (i+1) + "</td>";
			htmlText += "<td>" + employeeName + "</td>";
			htmlText += "<td>" + email + "</td>";
			htmlText += "<td class='gender-cell'>" + gender + "</td>";
			htmlText += "<td>" + dob + "</td>";
			htmlText += "<td>" + mobile + "</td>";
			htmlText += "<td>" + address + "</td>";
			htmlText += "<td>" + country + "</td>";
			htmlText += "<td>" + state + "</td>";
			htmlText += "<td>" + doj + "</td>";
			htmlText += "<td>" + isactive + "</td></tr>";
			
		}
		
	}
	
	else
	{
		htmlText += "<tr><td colspan='11' class='text-center'>" + "No Data Available" + "</td></tr>";
	}

	htmlText += "</tbody></table><div><button class='btn btn-light' type='button' onclick='saveValue()'>Save</button></div>";
	document.getElementById("employeelist-table-div").innerHTML = htmlText;
	$('#example1').DataTable({
			 dom: "<'row'<'col-sm-12 text-right'B>><'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
			 "<'row'<'col-sm-12'tr>>" +
			 "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			 pageLength : 5,
			 lengthMenu :[[5,10,20],[5,10,20]],
		        buttons: [
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            {
		                extend: 'pdfHtml5',
		                orientation: 'landscape',
		                pageSize: 'LEGAL'
		            }
		        ]		
	});
	 
}

function toggleRowColor(element, employeeId){
	console.log(element);
	var trElement = element.parentElement.parentElement;
	
	console.log($(trElement).find(".gender-cell"));
	$(trElement).find(".gender-cell").first().html("<input type='text' name='gendertext' onblur='getValue(this,\"" + employeeId + "\")' >")
	
	
}

function getValue(element){
	console.log(element);
	
}
function saveValue(){
	
	var elements = $("[name='gendertext']");
	
	
	for(var i=0 ; i<elements.length; i++){
		htmlText2.push(elements[i].value);
	}
	display(htmlText2);
	$("input[type='text']").val("").hide();
}
function display(htmlText2)
{   
	var colarr = [];
	var asd = "";
	var htmlText1 = "<table id ='bill'><thead><tr><th>Food</th></tr></thead><tbody>";
	for(var i = 0;i< htmlText2.length;i++)
	{
		htmlText1 = htmlText1 + "<tr><td>"+htmlText2[i]+"</td></tr>";
	}
	htmlText1 = htmlText1 + "</tbody></table>";
	document.getElementById("employeelist-table-div1").innerHTML = htmlText1; 
	$('.selectpicker').selectpicker('refresh');
	//var x = document.getElementById("bill").
	//var collen = $("#bill").length;
	table = document.getElementById("bill");
	  tr = table.getElementsByTagName("tr");
	  for (i = 1; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    if (td) {
	      txtValue = td.textContent || td.innerText;
	      colarr.push(txtValue);
	    }       
	  }
	console.log(colarr);
}
//GET LOCATION INFO
function getLocationInfo()
{
	var params = "action=getLocationInfo";
	sendAJAXRequest("../../src/controller/MasterDataController.php",params,"responseLocationInfo");
}
function responseLocationInfo(responseText,isSuccess)
{
	if(isSuccess == true)
	  {
	  	var responseObj = JSON.parse(responseText);
//	  	console.log(responseObj);
	  	var countryArray = responseObj.response.country;
	    var stateList = responseObj.response.state;	  	
	  	var htmlText = "";
	  	var countryId;
	  	var countryName;
	  	htmlText = htmlText +  "<option data-hidden='true' value=''></option>";
	  	for(var i = 0;i< countryArray.length;i++)
	  	{
	  	    countryId = countryArray[i]["countryid"] ;
	  	    countryName = decodeURIComponent((countryArray[i]["countryname"]));

	  		htmlText = htmlText + "<option value = \"" + countryId + "\">"+countryName+"</option>";

	  	} 
	  
	  	document.getElementById("country").innerHTML = htmlText; 
      
	    htmlText =  "";
	  	for(var i = 0;i< stateList.length;i++)
	  	{
	  		countryId = stateList[i]["countryid"];
	  		if(stateObj[countryId] == undefined){
				stateObj[countryId] = [];
				htmlText = "<option  data-hidden='true' value=''></option>";
				stateObj[countryId].push(htmlText);
	  		}
	  	    stateId = stateList[i]["stateid"] ;
	  	    stateName = decodeURIComponent(stateList[i]["statename"]);

	  		htmlText = "<option value = \"" + stateId + "\">"+stateName+"</option>";
	  		stateObj[countryId][0] = stateObj[countryId][0] + htmlText;
      	}  
	  	$('.selectpicker').selectpicker('refresh');
	  }
	  else
	  {
	  	var responseObj = JSON.parse(responseText);
	  	alert(responseObj['error']);

	  }
}

//POPULATING STATE BY SELECTING COUNTRY
function populateState(){
	var countryElement = document.getElementById("country");
	var htmlText = "<option  data-hidden='true' value=''></option>";
//	console.log(stateObj);
	for(var i=0;i<countryElement.selectedOptions.length;i++)
	{
		countryId = countryElement.selectedOptions[i].value;
		countryName = countryElement.selectedOptions[i].text;
		htmlText += "<optgroup label=\"" +countryName+"\">";
		if(stateObj[countryId] != undefined){
			htmlText += stateObj[countryId];
//			console.log(stateObj[countryId]);
		}
		htmlText += "</optgroup>";
	}
	
	document.getElementById("state").innerHTML = htmlText;  
	$('.selectpicker').selectpicker('refresh');
}