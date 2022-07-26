<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
	<title>Add Chef</title>
	<style type="text/css">
            #add_company
            {
              box-sizing: border-box;
              padding: 30px;
              width:500px;
              height: 200px;
              margin-top: 200px;
              margin-left: 450px;
              background-color: burlywood;
              text-align: center;
            }
	</style>
</head>
<body>
<?php
include_once('includes/header.php');
include_once('includes/scripts.php');
include_once('includes/menubar2.php');
?>
<div id="add_company" class="container">
<h1>
Add Chef
</h1>
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#statics">ADD CHEF&nbsp;<i class="fa fa-plus-circle"></i></button>
</div>

<div class="modal fade" id="statics" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Chef</h5>
      </div>
      <div class="modal-body">
  <form method="post" action="" >
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="name" required autocomplete="off">
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender">
    <option value="" disabled selected>select</option>
      <option value="Male">MALE</option>
      <option value="Female">FEMALE</option>
      <option value="Transgender">TRANSGENDER</option>
    </select>
  </div>
  <div class="form-group">
    <label for="phno">Phone number</label>
    <input type="tel" class="form-control" name="phno" id="phno" placeholder="xxxxxxxxxx" required autocomplete="off" maxlength="10">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" id="address" rows="3" name="address"></textarea>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
    <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
      <div class="valid-feedback">
        Looks good!
      </div>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
  </div>
  <input type="submit" class="btn btn-primary" value="ADD CHEF" name="submit">
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="fixed-bottom">
<?php
include_once('includes/footer.php');
?>
</div>
</body>
</html>

<?php

include_once("includes/Db.php");


if(isset($_POST['submit']))
{    
	$cname=$_POST['name'];
	$gen=$_POST['gender'];
  $addr=$_POST['address'];
  $phno=$_POST['phno'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
    
  $sql="INSERT INTO cheflogin(name,gender,phonenumber,address,username,password)VALUES('$cname','$gen','$phno','$addr','$email','$pass')";
 if(mysqli_query($conn,$sql))
 {
 		echo "<script>alert('chef added SuccessFully'); window.location = 'our_chef.php'</script>";
 } 
 else
 {
 	 	 	echo "<script>alert(); window.location = 'add_chef.php'</script>";
 }
}

?>

