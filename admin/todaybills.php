<!DOCTYPE html>
<html>
    <head>
        <title>Bill Listview</title>
        
        <?php include_once "includes/common-includes.php";

include_once('includes/header.php');
include_once('includes/scripts.php');
include_once('includes/menubar2.php');
?>
<script src="my_js/today.js"></script>
    <script type="text/javascript">                       
            setInterval('receipt()', 1000);
       </script>
    </head>
 
 <body>             
        <div class="container-fluid mt-5">
        <div class= "row"> 
        <div class="col-sm-7 offset-1">
          <h2>Today Bills</h2>
          <div id="todayorder">	
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
