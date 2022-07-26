<?php 
    session_start();
   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Chef Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   <script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
	<style>
		*{
			margin:0px;
			padding: 0px;
		}
		body{
			background-image:url('img/chef.jpg');
		 background-size: cover;
     background-attachment: fixed;
		background-repeat:no-repeat;
    background-position: center; 
		}
		#login{
			padding-top: 30px;
			background-color: white;
			width: 350px;
			margin-left: 800px;
			margin-top: 50px;
			height: 600px;
			border-radius: 40px;
			opacity: 0.9;
		
		}
		.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
 
}
.avatar {
  width: 40%;
  border-radius: 50%;
}
#login:hover{
		box-shadow: 0 0 5px black,
                  0 0 10px black,
                  0 0 15px black,
                  0 0 20px black;
	}

	</style>
</head>
<body>
	<div class="container" id="login">
<form method="post" action="" class="form-group" >

  <div class="form-group">

<center>
      <h3 style="color:green;font-weight: bold;">Chef Login</h3>
      <div class="imgcontainer">
    <img src="img/avatar.jpg" alt="Avatar" class="avatar">
      </div>
      </center>
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="username" name="username" autocomplete="off" >
     </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="pass"  name="pass" onblur="valid();">
		<div id="text">
         </div>  
    </div>
    
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="remember">
    <label class="form-check-label" >Remember Me</label>
  </div>
  <div class="text-center my-4">
        <button class="btn btn-primary text-white btn-lg" type="submit" name="submit">Login</button>
      </div>
     
</form>
</div>
<script >
function valid(){
  var checking = document.getElementById("text").innerHTML = "";
  var  returnval = true;
    var input = document.getElementById("pass").value;
    var input1 = document.getElementById("username").value;
      if(input == "" || input1 == "")
      {         
        var checking = document.getElementById("text").innerHTML = "username and password cannot be empty";
            returnval = false;
      }    
     return  returnval;

  }

</script>
<?php 
    
        include_once("Db.php");
if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['pass'];

        $cekuser = mysqli_query($conn,"SELECT * FROM cheflogin WHERE username = '$username'");
        $ro= mysqli_num_rows($cekuser);
        
        if($ro>0) 
        {
          $check= "SELECT * FROM cheflogin WHERE username = '$username' and password = '$password'";
          $ro1=mysqli_query($conn,$check);
          if(mysqli_num_rows($ro1)==1)
          {
          $_SESSION["username"] = $username;
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-y h:i:s');
           $_SESSION["logtime"] = $date;

          if (isset($_SESSION["username"] ))
        {
              if(!empty($_POST["remember"]))
              {
              setcookie ("username",$username,time()+ (10 *24 * 60 * 60));
               setcookie ("pass",$password,time()+ (10 *24 * 60 * 60));
             }
 echo "<script>alert('Welcome $username you have logged in! '); window.location = 'chef.php'</script>";
}
}else{
  echo "<script>alert('invalid password'); window.location = 'index.php'</script>";
}          
 } 
   else{
          echo "<script>alert('invalid username or password'); window.location = 'index.php'</script>";
        }
      }
    ?>
</body>
</html>