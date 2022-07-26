<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
<?php
session_start();


if(isset( $_SESSION["username"] )){
	echo "<script>alert('session has Expired'); window.location = 'index.php'</script>";
	
unset( $_SESSION["username"]);
}else{
	echo "<script>alert('login Again'); window.location = 'index.php'</script>";
	
}

?>


</body>
</html>