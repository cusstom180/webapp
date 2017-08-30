<?php

include('connect.php');

//escape variables for user
$userid = mysqli_real_escape_string($con, $_GET['userid']);
$first = mysqli_real_escape_string($con, $_GET['first']);
$last = mysqli_real_escape_string($con, $_GET['last']);
$user = mysqli_real_escape_string($con, $_GET['user']);
$email = mysqli_real_escape_string($con, $_GET['email']);


echo $userid;
echo $first;
echo $last;
echo $user;
echo $email;

$editstat = "UPDATE `user_account` SET `first` = '$first', `last` = '$last', `user_name` = '$user', `email` = '$email' WHERE `user_id` = '$userid' ";

$editquery = mysqli_query($con, $editstat);

header('Location: user.php');





?>