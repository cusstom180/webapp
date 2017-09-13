<?php

include('connect.php');

//escape variables for user
#$userid = mysqli_real_escape_string($con, $_POST['userid']);
$first = mysqli_real_escape_string($con, $_POST['first']);
$last = mysqli_real_escape_string($con, $_POST['last']);
$user = mysqli_real_escape_string($con, $_POST['user']);
$password = md5(mysqli_real_escape_string($con, $_POST['password']));
$email = mysqli_real_escape_string($con, $_POST['email']);


#check if email already exists
/* $useridcheckquery = "SELECT * FROM `user_account` WHERE `email` = '$email'";

$useridcheck = mysqli_query($con, $useridcheckquery);

$userquerycheck = mysqli_fetch_assoc($useridcheck); */

$selonusername = "SELECT * FROM `user_account` WHERE `user_name`='$user' ";
$onusernamequery = mysqli_query($con, $selonusername);

$selonemail = "SELECT * FROM `user_account` WHERE `user_name`='$user' ";
$onemailquery = mysqli_query($con, $selonemail);

if (mysqli_num_rows($onusernamequery) > 0 || mysqli_num_rows($onemailquery) > 0 ) {
	 if (mysqli_num_rows($onemailquery) > 0) {
		 $incorrect = '?password=1';
	 } 
	 if (mysqli_num_rows($onusernamequery) > 0) {
		 $incorrect = '?password=2';
	 }
	header('Location: addedit.php'.$incorrect);
}	else {

		$insert = "INSERT INTO `user_account` (`user_id`, `first`, `last`, `user_name`, `password`, `email`) 
					VALUES (NULL, '$first', '$last', '$user', '$password', '$email')";

		$editquery = mysqli_query($con, $insert);

		header('Location: user.php');
}





?>