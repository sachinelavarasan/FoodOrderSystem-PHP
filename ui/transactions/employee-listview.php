<!DOCTYPE html>
<html>
    <head>
        <title>Employee Listview</title>
        <?php
        include "../includes/common-includes.php";
        ?>
        <script src="../../js/transactions/employee-listview.js"></script>
        <script type="text/javascript">
        	function init()
        	{
        		$(".selectpicker").selectpicker();
            	clearForm();
        		getLocationInfo();
        	}
        	function clearForm()
        	{
        		$("form")[0].reset();
        		$(".selectpicker").selectpicker("refresh");
        		dateMethods();
        	}
        	
        	function dateMethods(){
				var dateObj = new DateTime();
				console.log(dateObj);
        	}
        </script>
        <style type="text/css">
            
        </style>
    </head>
    <body onload="init();">
        <?php include "../includes/common-menu.php";?>
        
        <div class="container-fluid mt-5">
            <form>
            	<div class="form-group">
                    <div class="col-sm-12">
                		<label class="control-label control-label-sm col-sm-2">Employee status</label>
                		<select id="employee-status" class="selectpicker form-control form-control-sm col-sm-2" data-style="btn-info" data-live-search="true" data-actions-box="true" multiple>
                			<option value="1">Active</option>
                			<option value="0">Inactive</option>
                		</select>
                	</div>
            	</div>
            	<div class="form-group">
                    <div class="col-sm-12">
                		<label class="control-label control-label-sm col-sm-2">Country</label>
                		<select id="country" class="selectpicker form-control form-control-sm col-sm-2" onchange="populateState();" data-style="btn-info"  data-live-search="true" data-actions-box="true" multiple>
                		</select>
                	</div>
            	</div>
            	<div class="form-group">
                    <div class="col-sm-12">
                		<label class="control-label control-label-sm col-sm-2">State</label>
                		<select id="state" class="selectpicker form-control form-control-sm col-sm-2" data-style="btn-info" data-live-search="true" data-actions-box="true" multiple>
                		</select>
                	</div>
            	</div>
            	<div class="form-group">
                    <div class="col-sm-10 offset-sm-2">
                		<button class="btn btn-success" type="button" onclick="getEmployeesForListview();" id="go-btn"><i class="fa fa-check"></i> Go</button>
                		<button class="btn btn-light" type="button" onclick="clearForm();"><i class="fa fa-times"></i> Clear</button>
                	</div>
            	</div>
                <div class="form-group mt-5">
                    <div class="col-sm-12">
                		<div id="employeelist-table-div"></div>
                	</div>
            	</div>
        	</form>
		</div>
		<div class="form-group mt-5">
                    <div class="col-sm-12">
                		<div id="employeelist-table-div1"></div>
                	</div>
        </div>
    </body>
</html>
