<?php
      include_once "../../src/constants/Db.php";
      session_start();
     if(!isset($_SESSION["billno"])){
         if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          $sql = "INSERT INTO bill (date, deleted)
          VALUES (now(), 0)";
         if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            $_SESSION["billno"] = $last_id;
          } 
      }
      if(!isset($_SESSION["ctodayspl"])){
        $_SESSION["ctodayspl"] = date("Y-m-d");
     }
      
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chef Listview</title>
        <script src="../../js/transactions/chef.js"></script>
        <?php include "../includes/common-includes.php";?>
        <script type="text/javascript">
        
            setInterval('getItemByDate()', 1000);
        	
       </script>
        <style type="text/css">
            
        </style>
    </head>
    <body onload="init()">
               
        <div class="container-fluid mt-5">
        <div class= "row">        
          <div class="col-sm-4 offset-4">
          <h2>Today Menu Card</h2>
          <div id="state-table-div">	
          </div>
		</div>
        </div>
        </div>
       
    </body>
</html>
