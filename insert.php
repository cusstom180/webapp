<?php

include('connect.php');

//escape variables for user
$userid = mysqli_real_escape_string($con, $_POST['userid']);
$first = mysqli_real_escape_string($con, $_POST['first']);
$last = mysqli_real_escape_string($con, $_POST['last']);
$user = mysqli_real_escape_string($con, $_POST['user']);
$email = mysqli_real_escape_string($con, $_POST['email']);


#check if username already exists
$useridcheckquery = "SELECT * FROM `user_account` WHERE `user_name` = '$user'";

$useridcheck = mysqli_query($con, $useridcheckquery);

$userquerycheck = mysqli_fetch_assoc($useridcheck);

if ($userquerycheck['email'] == $email) {
	
	header('addedit.php');
}	


echo $userid;
echo $first;
echo $last;
echo $user;
echo $email;

$editstat = "UPDATE `user_account` SET `first` = '$first', `last` = '$last', `user_name` = '$user', `email` = '$email' WHERE `user_id` = '$userid' ";

$editquery = mysqli_query($con, $editstat);

header('Location: user.php');





?>