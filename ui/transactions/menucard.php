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
        <title>Employee Listview</title>
        <script src="../../js/transactions/menucard.js"></script>
        <?php include "../includes/common-includes.php";?>
        <script type="text/javascript">
         setTimeout('init()',2000);
        	function init()
        	{
                $('.selectpicker').selectpicker({
    	    	    style: 'btn-info',
    	    	    size: 10,
    	    	    });
                 clearForm();
               //  getLocationInfo();
               getItemByDate();
                             
            }
            setInterval('getItemByDate()', 1000);
        	function clearForm()
        	{
        		document.forms[0].reset();
    			removeAllAttachmentRow();
    			attachmentRepeaterCount = 0;
    			addAttachmentRow();
    			$('.selectpicker').selectpicker('refresh');
        	}
       </script>
        <style type="text/css">
            
        </style>
    </head>
    <body onload="init()">
               
        <div class="container-fluid mt-5">
        <div class= "row">
        <div class="col-sm-7">
            <h3>Order List</h3>
               	<div class="col-sm-12">
                    	<form method="POST" action="" class="form-horizontal" role="form">
                    			<div class="col-sm-12">
                                	<div>
                            			<div class="form-group row col-sm-12">
                            			    <div id="attachment-div" class="form-group row col-sm-12">
                            			    </div>
                            			</div>
                            			<div class="form-group row">
                				    		<div class="col-sm-10">
                					   			<div id="add-button-div">
                									<button type="button" id="save-button" class="btn btn-success btn-sm"  onclick="saved();">
                								    	<i class="fa fa-history" style="font-size:24px"></i>
                								      	&nbsp;Save
                								    </button>
                							    </div>
                						    </div>
                					    </div>
                            		</div>
                        		</div>
                		</form>
            		</div>        		
        </div>
          <div class="col-sm-5">
          <h2>Food Menu Card</h2>
          <div id="state-table-div">	
          </div>
		</div>
        </div>
        </div>
        <div class="container">
        <div class="row">
        <div class="col-sm-4">
        <div id="bill">
        </div>
        </div>
        </div>
        </div>
    </body>
</html>
