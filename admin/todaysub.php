<?php
 include_once "includes/Db.php";
$action = null;
header("Content-type: application/json");

if(isset($_POST["action"]))
{
    $action = $_POST["action"];
    
}

$response = null;
$result = null; 
if($action == "getalltodaybills")
{
    try
    {
        $result = false;
        $foodList = array();
        $sql = "SELECT `id`, `billno`, `item`, `qty`, `total`, `date`, `time` FROM `items` WHERE date = CURDATE() and deleted=0 order by id DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                $item = array();
                $item["billno"] = $row["billno"];
                $item["item"] = $row["item"];
                $item["qty"] = $row["qty"];
                $item["date"] = $row["date"];
                $item["id"] = $row["id"];
                $item["total"] = $row["total"];
                $item["time"] = $row["time"];
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
else if($action == "payment")
{
    try
    {
        $result = false;
        $id = $_POST["id"];
        $foodList = array();
        $sql = "UPDATE items set deleted=1 WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $response = "Payment Success";
        }
            
    }
    catch (Exception $e)
    {
        $response = $e->getMessage();
    }
}
echo json_encode($response);
?>