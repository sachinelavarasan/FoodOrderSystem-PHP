<?php 
    session_start();
   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="animate/animate.min.css" rel="stylesheet">
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
			background-image: url('img/login.jpg');
			background-attachment: scroll;
      background-size: cover;
			background-repeat:no-repeat;
		}
		#login{
			padding-top: 30px;
			background-color: white;
			width: 350px;
			margin-left: 750px;
			margin-top: 100px;
			height: 500px;
			border-radius: 40px;
			opacity: 0.9;
			animation: rubberBand 2s 1;
      animation-timing-function: linear;
		}
		.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  animation: fadeIn 2s 1;
  animation-timing-function: linear;
}

img.avatar {
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
<form method="post" action="" class="form-group" onsubmit="valid();">

  <div class="form-group">

<center>
      <h3 style="color:aquamarine;font-weight: bold;">Admin Login</h3>
      <div class="imgcontainer">
    <img src="img/avatar.jpg" alt="Avatar" class="avatar">
      </div>
      </center>
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="email" name="email" required
    >
     </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="pass"  name="pass">
		<div class="text">
         </div>  
    </div>
    
  <div class="text-center my-4">
        <button class="btn btn-primary text-white btn-lg" type="submit" name="submit">Login</button>
      </div>
      
</form>
</div>
<script>
  function valid(){
	  var input = document.getElementById("pass").value;
      
     
      if(pass.value == "")
      {      	  
            alert("Your password cannot be empty ");
            return false;
      }         

  }

</script>
<?php 
    
    include_once "includes/Db.php";
      if(isset($_POST['submit'])){
              $email = $_POST['email'];
              $password = $_POST['pass'];

              $cekuser = mysqli_query($conn,"SELECT * FROM adminlogin WHERE username = '$email'");
              $ro= mysqli_num_rows($cekuser);
              
              if($ro>0) 
              {
                $check= "SELECT * FROM adminlogin WHERE username = '$email' and password = '$password'";
                $ro1=mysqli_query($conn,$check);
                if(mysqli_num_rows($ro1)==1)
                {
                $_SESSION["email"] = $email;
                if (isset($_SESSION["email"] ))
              {
                    if(!empty($_POST["remember"]))
                    {
                    setcookie ("email",$email,time()+ (10 *24 * 60 * 60));
                     setcookie ("pass",$password,time()+ (10 *24 * 60 * 60));
                   }
       echo "<script>alert('Welcome Admin'); window.location = 'dashboard.php'</script>";
      }
      }else{
        echo "<script>alert('invalid password'); window.location = 'index.php'</script>";
      }            
      }}
?>



</body>
</html>