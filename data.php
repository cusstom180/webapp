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
	$incorretPwUrl = '?login=1';
	header('Location: index.php'.$incorretPwUrl);
}
 ?>