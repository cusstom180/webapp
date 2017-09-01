<?php 
#to insert data into the db and diplay the result

include('connect.php');

//escape variables for user
$userid = mysqli_real_escape_string($con, $_POST['userid']);
$first = mysqli_real_escape_string($con, $_POST['first']);
$last = mysqli_real_escape_string($con, $_POST['last']);
$user = mysqli_real_escape_string($con, $_POST['user']);
$email = mysqli_real_escape_string($con, $_POST['email']);

$editstat = "UPDATE `user_account` SET `first` = '$first', `last` = '$last', `user_name` = '$user', `email` = '$email' WHERE `user_id` = '$userid' ";

$editquery = mysqli_query($con, $editstat);

header('Location: user.php');

?>