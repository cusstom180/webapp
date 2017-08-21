<?php 

#to insert data into the db and diplay the result

include('connect.php');

//escape variables for user
$first = mysqli_real_escape_string($con, $_POST['first']);
$last = mysqli_real_escape_string($con, $_POST['last']);
$user = mysqli_real_escape_string($con, $_POST['user']);
$password = md5(mysqli_real_escape_string($con, $_POST['password']));
$email = mysqli_real_escape_string($con, $_POST['email']);

#insert statement for new user
$insert = "INSERT INTO `user_account` (`user_id`, `first`, `last`, `user_name`, `password`, `email`) 
			VALUES (NULL, '$first', '$last', '$user', '$password', '$email')";

#select query based on password user inputted
$selectpassword = "SELECT password FROM webapp WHERE password = '$password'";

if (mysqli_query($con, $insert)) {
	$success = "Welcome to the app";
}
	else {
	$insertfail = "Something went wrong and you suck at life";
}

$passwordresult = mysqli_query($con, $selectpassword);


	

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
	<?php echo $passwordresult; ?>
	<?php 
		if ($password == $passwordresult) {
			
			echo 'Welcome to the app';
		}
		else {
			
			echo "something went wrong";
		}

	?>
	
</body>
</html>