<?php 

include('connect.php');

#capture variables
$user =  $_POST['username']; // mysqli_real_escape_string($con, );
$password = md5($_POST['password']); //md5(mysqli_real_escape_string($con, ));


// and `password` = '$password'

#check if username already exists
$usercheckquery = "SELECT * FROM user_account WHERE user_name = '$user' AND `password` = '$password'";

$result = mysqli_query($con, $usercheckquery);

if (mysqli_num_rows($result) == 1) {
	#header('Location: user');
	echo 'it worked';
} else {
	$incorretPwUrl = '?login=1';
	#header('Location: index.php'.$incorretPwUrl); 723228164
	echo mysqli_error($con);
	echo 'it did not work';
	echo mysqli_num_rows($result);
}
 ?>