<?php 
#to insert data into the db and diplay the result

include('connect.php');

//escape variables for user
$first = mysqli_real_escape_string($con, $_POST['first']);
$last = mysqli_real_escape_string($con, $_POST['last']);
$user = mysqli_real_escape_string($con, $_POST['user']);
$password = md5(mysqli_real_escape_string($con, $_POST['password']));
$email = mysqli_real_escape_string($con, $_POST['email']);



	
$insert = "INSERT INTO `user_account` (`user_id`, `first`, `last`, `user_name`, `password`, `email`) 
			VALUES (NULL, '$first', '$last', '$user', '$password', '$email')";

if (mysqli_query($con, $insert)) {
	echo "New record created successfully";
} else {
	echo "Error: " . $insert . "<br>" . mysqli_error($con);
}
	
#header('user.php');

?>