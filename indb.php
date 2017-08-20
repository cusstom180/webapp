
//to insert data into the db and diplay the result

<?php 

include('connect.php');

$insert = 'INSERT INTO `user_account` (`user_id`, `first`, `last`, `user_name`, `password`, `email`) 
			VALUES (NULL, "brian", "naperkoski", "admin", "itchyMoon10", "cusstom180@yahoo.com")';

if (mysqli_query($con, $insert)) {
	$success = "Welcome to the app";
}
	else {
	$insertfail = "Something went wrong and you suck at life";
}

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>