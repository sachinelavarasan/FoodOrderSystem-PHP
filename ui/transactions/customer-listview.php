<!DOCTYPE html>
<html>
    <head>
        <title>Employee Listview</title>
        <?php
        include "../includes/common-includes.php";
        ?>
        
        <script src= "//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"> </script> 
        <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"> 
        </script> 
        <!-- <script src="../../js/transactions/employee-listview.js"></script> -->
        <style>
        #payment tr,td
        {
            border:hidden;
        }
        #customer td
        {
            vertical-align: middle;
        }
        #customer
        {
            width:70%;
            height:400px;
            margin:auto;
        }
        #excel
        {
            text-align:center;
        }
        </style>
    </head>
    <body>
        <?php include "../includes/common-menu.php";?>
        
        <div class="container-fluid">
        <button class="btn btn-success btn-sm mx-5" id="excel">convert to excel</button>
        <br>
        <br>
            <table class="table table-bordered text-center " id="customer">
                <thead>
                    <tr>
                        <th>Customer name</th>
                        <th>Mobile number</th>
                        <th>Payment Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sonu</td>
                        <td>8965940494</td>
                        <td>
                            <table id="payment" class="table text-center table-sm">
                                <thead>
                                    <tr>
                                        <th>s.no</th>
                                        <th>Payment Date</th>
                                        <th>Amount(in Rs/-)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>22/12/2017</td>
                                        <td>30,000</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>03/06/2018</td>
                                        <td>45,500</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>15/11/2018</td>
                                        <td>25,600</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Janani</td>
                        <td>9965940404</td>
                        <td>
                            <table id="payment" class="table text-center table-sm">
                                <thead>
                                    <tr>
                                        <th>s.no</th>
                                        <th>Payment Date</th>
                                        <th>Amount(in Rs/-)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>20/02/2016</td>
                                        <td>22,000</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>30/05/2019</td>
                                        <td>25,500</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>05/09/2020</td>
                                        <td>15,600</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Elavarasan</td>
                        <td>7965940408</td>
                        <td>
                            <table id="payment" class="table text-center table-sm">
                                <thead>
                                    <tr>
                                        <th>s.no</th>
                                        <th>Payment Date</th>
                                        <th>Amount(in Rs/-)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>07/02/2016</td>
                                        <td>32,000</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>04/05/2018</td>
                                        <td>35,500</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>21/04/2020</td>
                                        <td>25,300</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
    	</div>
    </body>

    <script> 
    
    $(document).ready(function () { 
        $("#excel").click(function () { 
        $("#customer").table2excel({ 
            filename: "Students.xls" 
        }); 
    });
    }); 
    
</script> 
</html>
