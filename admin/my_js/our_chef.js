var chef = "";
function getallchef()
{
    $.ajax({
        type: "POST",
        url: "sub_ourchef.php",
        data: {
            action : "getallchef",
        },
        cache: false,
        success: function(response) {
          cardview(response);
            
        },
        error: function(xhr, status, error) {
            var responseObj = error;
		     alert(responseObj);
        }
    });
}
function cardview(response)
{
    if(response)
	{
		var responseObj = response;
		var foodArray = responseObj;
		var htmlText = "";		
		for(i = 0;i < foodArray.length;i++)
		{
			var id = foodArray[i]['id'];
			var name = foodArray[i]['name'];
			var gender = foodArray[i]['gender'];
			var ph = foodArray[i]['ph'];
			var address = foodArray[i]['address'];
			var username = foodArray[i]['username'];
            htmlText +="<div class='col-sm-3'><div class='card' style='width: 18rem'><div class='card-body'style='background-color:#fca311;text-align:center;'>" ;
			htmlText += "<h3 class='card-title'>"+name+"</h3><p class='card-text'>"+address+"</p></div>";
			htmlText +=  "<ul class='list-group list-group-flush'style='text-align:center;'><li class='list-group-item' style='background-color:#14213d;color:white;font-weight:bold;'>"+"Gender - "+gender+"</li><li class='list-group-item' style='background-color:#14213d;color:white;font-weight:bold;'>"+"Phone Number - "+ph+"</li><li class='list-group-item' style='background-color:#14213d;color:white;font-weight:bold;'>"+"Email - "+username+"</li></ul>";
            htmlText += "<div class='card-footer text-muted bg-dark'><button class='btn btn-success btn-xs mr-5' data-target='#staticBackdrop' id='update' data-toggle='modal' onclick='update(\"" + id + "\")'>Update</button><button class='btn btn-danger btn-xs' onclick='del(\"" + id + "\")'>Remove</button></div></div></div>";
		}
		document.getElementById("cardview").innerHTML = htmlText;
	}
}
function del(id)
{

    swal.fire({
		title: 'Are you sure? ',
		text: "It will Delete Your Chef ",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: '<i class="fa fa-times"></i>Cancel',
		confirmButtonText: 'Yes, Sure <i class="fa fa-thumbs-up"></i>',
	  }).then( result=> {
		if (result.value) {
            $.ajax({
                type: "POST",
                url: "sub_ourchef.php",
                data: {
                    action : "remove",
                    id : id
                },
                cache: false,
                success: function(response) {
                    success(response);
                    getallchef();			            
                },
                error: function(xhr, status, error) {
                    var responseObj = error;
                     alert(responseObj);
                }
            });		
	  }		
	  })	
}
function update(id)
{
    chef = id;
    $.ajax({
        type: "POST",
        url: "sub_ourchef.php",
        data: {
            action : "getchefbyid",
			id : chef,
        },
        cache: false,
        success: function(response) {
			populate(response);
        },
        error: function(xhr, status, error) {
            var responseObj = error;
		     alert(responseObj);
        }
    });

}
function populate(response)
{
     document.getElementById("uname").value = response["name"];
     document.getElementById("uphno").value = response["ph"];
     document.getElementById("ugender").selected = response["gender"];
     document.getElementById("uaddress").value = response["address"];
     document.getElementById("uemail").value = response["username"];
     document.getElementById("upassword").value = response["password"];
}
function update1()
{
   var uname = document.getElementById("uname").value;
   var uphno = document.getElementById("uphno").value;
   var ugender = document.getElementById("ugender").value;
   var uaddress = document.getElementById("uaddress").value;
   var uemail = document.getElementById("uemail").value;
   var upassword = document.getElementById("upassword").value;

    $.ajax({
        type: "POST",
        url: "sub_ourchef.php",
        data: {
            action : "update",
			id : chef,
            name :uname,
            phno :uphno,
            gender:ugender,
            address :uaddress,
            email :uemail,
            password :upassword
        },
        cache: false,
        success: function(response) {
			success(response);
            getallchef();	
            $('#staticBackdrop').modal('hide');
        },
        error: function(xhr, status, error) {
            var responseObj = error;
		     alert(responseObj);
        }
    });

}
function clearmodal()
{
     document.getElementById("uname").value="";
     document.getElementById("uphno").value="";
    document.getElementById("ugender").value="";
     document.getElementById("uaddress").value ="";
     document.getElementById("uemail").value="";
     document.getElementById("upassword").value="";

}


