
<!DOCTYPE html>
<html>
    <head>
        <title>Chef Listview</title>
        <script src="chef.js"></script>
        <?php include_once "includes/common-includes.php";?>
        <script type="text/javascript">        
            setInterval('getorderByDate()', 1000);
            setInterval('getItemByDate()', 1000*4);          	
       </script>
        <style type="text/css">
            
        </style>
    </head>
    <body>
    <?php 
include_once "includes/common-menu.php";
?>  
        <div class="container-fluid mt-5">
        <div class= "row"> 
        <div class="col-sm-6 offset-1">
          <h2>Today Orders</h2>
          <div id="todayorder">	
          </div>
		</div>
                
          <div class="col-sm-3 offset-2">
          <h2>Today Menu Card</h2>
          <div id="state-table-div">	
          </div>
		</div>
        </div>
        </div>
       
    </body>
</html>
