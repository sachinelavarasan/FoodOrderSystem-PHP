<?php
 include_once "Db.php";
$action = null;
header("Content-type: application/json");
if(isset($_POST["action"]))
{
    $action = $_POST["action"];
    
}

$response = null;
$result = null;
session_start();
if($action == "order")
{
    try
    {
        $item = "";
        $qty = "";
        $sql ="";
        $items = $_POST["items"];
       $tno = $_SESSION["tablename"];
        $qtys = $_POST["qtys"];
        $billno = $_SESSION["billno"];
        if(isset($_SESSION["billno"])){        
                $sql = "INSERT INTO cheforder(`tno`, `items`, `qty`, `date`, `deleted`)VALUES('$tno','$items','$qtys',CURDATE(),0);";       
            if($conn){
                $result = mysqli_query($conn, $sql);
                $result = "order send successfully";
            }
            else{
                $result = mysqli_error($conn);
            }
        }
        $response = $result;
    }
    catch (Exception $e)
    {
        $response = $e->getMessage();
    }
}
else if($action == "getalltodayitems")
{
    try
    {
        $result = false;
        $foodList = array();
        $sql = "SELECT `food`, `date`, `price` FROM `todayspl` WHERE date=CURDATE() and deleted=0";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                $item = array();
                $item["food"] = $row["food"];
                $item["price"] = $row["price"];
                $foodList[] = $item;
            }
          }
            $response = $foodList;
        }
    catch (Exception $e)
    {
        $response = $e->getMessage();
    }
}

else if($action == "main")
{
    try
    {       
        $sql ="";
        $fullbill = $_POST["bill"];
        $prices = $_POST["money"];
        $total = $_POST["total"];
        $billno = $_SESSION["billno"];
        if(isset($_SESSION["billno"])){
             
                $sql = "INSERT INTO items(billno,item,qty,total,date,time,deleted)VALUES($billno,'$fullbill','$prices',$total,CURDATE(),CURTIME(),0);";       
            if($conn){
                $result = mysqli_query($conn, $sql);
                unset($_SESSION["billno"]);
                $result = "Thank You Visit Again";
            }
            else{
                $result = mysqli_error($conn);
            }
        }
        $response = $result;
    }
    catch (Exception $e)
    {
        $response = $e->getMessage();
    }
}

echo json_encode($response);
?>