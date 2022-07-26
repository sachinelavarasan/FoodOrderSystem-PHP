<?php
 session_start();
 if(!isset($_SESSION["todayspl"])){
         $_SESSION["todayspl"] = date("Y-m-d");
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Employee Listview</title>
        <script src="../../js/transactions/todayspl.js"></script>
        <?php include "../includes/common-includes.php";?>
        <script type="text/javascript">
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
           // window.setTimeout("init();", 1000*2);
            setInterval(getItemByDate, 1000*10); 
        	function clearForm()
        	{
        		document.forms[0].reset();
    			removeAllAttachmentRow();
    			attachmentRepeaterCount = 0;
    			addAttachmentRow();
        	}
       </script>
        <style type="text/css">
            
        </style>
    </head>
    <body onload="init();">
               
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
          <h2>Today Menu Card</h2>
          <div id="state-table-div">	
          </div> 
		</div>
        </div>
        </div>
        <a href="logout.php">Logout</a>
    </body>
</html>
