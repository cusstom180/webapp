<?php 

include('connect.php');

#capture variables
$user =  $_POST['username']; // mysqli_real_escape_string($con, );
$password = md5($_POST['password']); //md5(mysqli_real_escape_string($con, ));




#check if username already exists
$usercheckquery = "SELECT * FROM `user_account` WHERE `user_name` = '$user' and `password` = '$password' ";

$result = mysqli_query($con, $usercheckquery);

if (mysqli_num_rows($result) == 1) {
	header('Location: user');
} else {
	$incorretPwUrl = 'index.php/?login=1';
	print $incorretPwUrl;
	header('Location: '.$incorretPwUrl);
}
/*
$useridcheck = mysqli_query($con, $useridcheckquery);

$userquerycheck = mysqli_fetch_assoc($useridcheck);

if ($userquerycheck['email'] == $email) {
	
	$success = 'you have logged in';
	
}	else {
	
	header('Location: register.php');
	
	
} */
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