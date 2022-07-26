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
 if($action == "getalltodayitems")
{
    try
    {
        $result = false;
        $foodList = array();
        $sql = "SELECT `id`,`food`, `date`, `price` FROM `todayspl` WHERE date=CURDATE() and deleted=0";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                $item = array();
                $item["id"] = $row["id"];
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
else if($action == "getalltodayorder")
{
    try
    {
        $result = false;
        $foodList = array();
        $sql = "SELECT `id`, `tno`, `items`, `qty`, `date`, `deleted` FROM `cheforder` WHERE date=CURDATE() and deleted=0 order by id DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                $item = array();
                $item["tno"] = $row["tno"];
                $item["items"] = $row["items"];
                $item["qty"] = $row["qty"];
                $item["date"] = $row["date"];
                $item["id"] = $row["id"];
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
else if($action == "status")
{
    try
    {
        $result = false;
        $id = $_POST["id"];
        $sql = "UPDATE cheforder set deleted=1 WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $response = "Status Updated";
        }
            
    }
    catch (Exception $e)
    {
        $response = $e->getMessage();
    }
}
else if($action == "itemstatus")
{
    try
    {
        $result = false;
        $id = $_POST["id"];
        $sql = "UPDATE todayspl set deleted=1 WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $response = "Food Removed";
        }
            
    }
    catch (Exception $e)
    {
        $response = $e->getMessage();
    }
}
echo json_encode($response);
?>