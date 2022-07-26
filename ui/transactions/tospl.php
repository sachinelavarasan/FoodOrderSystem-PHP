<?php
 include_once "../../src/constants/Db.php";
$action = null;

header("Content-type: application/json");

if(isset($_POST["action"]))
{
    $action = $_POST["action"];
    
}

$response = null;
$result = null;
session_start();
if($action == "add")
{
    try
    {
        $items = $_POST["items"];
        $item = "";
        $price = "";
        $sql ="";
        $count = count($items);
        $prices = $_POST["prices"];
        $todayspl = $_SESSION["todayspl"];
        if(isset($_SESSION["todayspl"])){
         
            for($i=0;$i<$count;$i++)
            {
                $item = $items[$i];
                $price = $prices[$i];
                $sql .= "INSERT INTO todayspl(food,date,price,deleted)VALUES('$item',CURDATE(),$price,0);";       
            }
            if($conn){
                $result = mysqli_multi_query($conn, $sql);
                $result = "items saved successfully";
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
        $todayspl = $_SESSION["todayspl"];
        $foodList = array();
        $sql = "SELECT `food`, `date`, `price` FROM `todayspl` WHERE date='$todayspl'";
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
echo json_encode($response);
?>
 