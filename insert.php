<?php

include('connect.php');

//escape variables for user
#$userid = mysqli_real_escape_string($con, $_POST['userid']);
$first = mysqli_real_escape_string($con, $_POST['first']);
$last = mysqli_real_escape_string($con, $_POST['last']);
$user = mysqli_real_escape_string($con, $_POST['user']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$email = mysqli_real_escape_string($con, $_POST['email']);


#check if email already exists
$useridcheckquery = "SELECT * FROM `user_account` WHERE `email` = '$email'";

$useridcheck = mysqli_query($con, $useridcheckquery);

#$userquerycheck = mysqli_fetch_assoc($useridcheck);

if (mysqli_num_rows($useridcheck) > 0) {
	#echo mysqli_num_rows($useridcheck);
	header('Location: addedit.php');
}	else {

		$insert = "INSERT INTO `user_account` (`user_id`, `first`, `last`, `user_name`, `password`, `email`) 
					VALUES (NULL, '$first', '$last', '$user', '$password', '$email')";

		$editquery = mysqli_query($con, $insert);

		header('Location: user.php');
}





?>