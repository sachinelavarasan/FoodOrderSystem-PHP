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

if($action == "getallchef")
{
    try
    {
        $result = false;
        $ourchef = array();
        $sql = "SELECT * FROM `cheflogin` where deleted=0";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                $chef = array();

                $chef["id"] = $row["id"];
                $chef["name"] = $row["name"];
                $chef["gender"] = $row["gender"];
                $chef["ph"] = $row["phonenumber"];
                $chef["address"] = $row["address"];
                $chef["username"] = $row["username"];
                $ourchef[] = $chef;
            }
          }
            $response = $ourchef;
        }
    catch (Exception $e)
    {
        $response = $e->getMessage();
    }
}
else if($action == "getchefbyid")
{
    try
    {
        $result = false;
        
        $id = $_POST["id"];
        $sql = "SELECT * FROM `cheflogin` where id='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                if($row = mysqli_fetch_assoc($result)){
                $chef = array();

                $chef["id"] = $row["id"];
                $chef["name"] = $row["name"];
                $chef["gender"] = $row["gender"];
                $chef["ph"] = $row["phonenumber"];
                $chef["address"] = $row["address"];
                $chef["username"] = $row["username"];
                $chef["password"] = $row["password"];
                
            }
          }
            $response =  $chef;
        }
    catch (Exception $e)
    {
        $response = $e->getMessage();
    }
}
else if($action == "remove")
{
    try
    {
        $result = false;
        $id = $_POST["id"];
        $sql = "UPDATE cheflogin set deleted=1 WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $response = "Chef Removed";
        }
            
    }
    catch (Exception $e)
    {
        $response = $e->getMessage();
    }
}
else if($action == "update")
{
    try
    {
        $result = false;
        $id = $_POST["id"];
        $cname=$_POST['name'];
	   $gen=$_POST['gender'];
       $addr=$_POST['address'];
       $phno=$_POST['phno'];
       $email=$_POST['email'];
       $pass=$_POST['password'];
        $sql = "UPDATE cheflogin set `name`='$cname', `gender`='$gen', `phonenumber`='$phno', `address`='$addr', `username`='$email', `password`='$pass', `deleted`=0 WHERE id = '$id'"; 
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $response = "Update successFully";
        }
            
    }
    catch (Exception $e)
    {
        $response = $e->getMessage();
    }
}
echo json_encode($response);
?>
 