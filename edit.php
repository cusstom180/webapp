<?php

include('connect.php');

$userid = $_GET['userid'];

$selectstat = "SELECT `user_id`, `first`, `last`, `user_name`, `email` FROM `user_account` WHERE `user_id` = '$userid' ";

$selectquery = mysqli_query($con, $selectstat);

$selectarray = mysqli_fetch_assoc($selectquery);

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>user register</title>
</head>

<body>
	<form action="insert.php" method="get">
		<input type="hidden" name="userid" value="<?php echo $selectarray['user_id'] ?>" >
		<label>First Name</label>
		<input type="text" name="first" value="<?php echo $selectarray['first'] ?>" >
		<label>Last Name</label>
		<input type="text" name="last" value="<?php echo $selectarray['last'] ?>" >
		<label>User Name</label>
		<input type="text" name="user" value="<?php echo $selectarray['user_name'] ?>" >
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $selectarray['email'] ?>" >
		<input type="submit" value="Submit" >
	</form>
	
	

</body>
</html>