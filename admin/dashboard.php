<?php
include_once "includes/Db.php";
if($conn){
$sql = "SELECT COUNT(id) FROM cheflogin where deleted=0";
$result = mysqli_query($conn,$sql);
$result = mysqli_fetch_row($result);
$sql1 = "SELECT COUNT(id) FROM items where date=CURDATE()";
$result1 = mysqli_query($conn,$sql1);
$result1 = mysqli_fetch_row($result1);

}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
	<title>Dashboard</title>
  <?php
  include_once('includes/common-includes.php');
  ?>
  
	<style type="text/css">
     #photo
     {
      margin-top: 200px;
      margin-left: 1000px;
     }
     body{
			background-image: url('img/dash.jpg');
			background-attachment: fixed;
      background-size: cover;
			background-repeat:no-repeat;
      background-position: center;
      background-blend-mode: luminosity;
		}
	
	</style>
  
</head>
<body>
<?php
include_once('includes/header.php');
include_once('includes/scripts.php');
include_once('includes/menubar2.php');
?>
<div id="dashbord">
<div id="card1" style="float:left;margin-left: 70px;margin-top: 50px;">
 <div class="card" style="border-radius: 100px;">
   <div class="card-header" style="background-color: aquamarine;font-family: Lucida Console;color:black; font-weight: bold;">
     Number of Our Chefs
   </div>
   <div class="card-body" style="font-family: Lucida Console;color:black; font-weight: bold;background-color:chocolate;">
   <center>
      <?php echo $result[0];?>
     </center>
   </div>
 </div>
 </div>
<div id="card2" style="float:left;margin-left: 70px;margin-top: 50px;">
 <div class="card" style="border-radius: 100px;">
   <div class="card-header" style="background-color: aquamarine;font-family: Lucida Console;color:black; font-weight: bold;">
     Today Orders
   </div>
   <div class="card-body" style="font-family: Lucida Console;color:black; font-weight: bold;background-color:chocolate;">
   <center>
   <?php echo $result1[0];?>
      </center>
   </div>
 </div>
 </div>


</div>
 <div id="photo">
  <h1 style="color: white;">ADMIN</h1>
  <img src="img/avatar.jpg" width="250" height="250" >
  <h3>Manoj</h3>
 </div>

<div class="fixed-bottom">
<?php
include_once('includes/footer.php');
?>
</div>

</body>
</html>