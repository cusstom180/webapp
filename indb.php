<?php 

#to insert data into the db and diplay the result

include('connect.php');

//escape variables for user
$first = mysqli_real_escape_string($con, $_POST['first']);
$last = mysqli_real_escape_string($con, $_POST['last']);
$user = mysqli_real_escape_string($con, $_POST['user']);
$password = md5(mysqli_real_escape_string($con, $_POST['password']));
$email = mysqli_real_escape_string($con, $_POST['email']);

#check if username already exists
$useridcheck = "SELECT "


#insert statement for new user
$insert = "INSERT INTO `user_account` (`user_id`, `first`, `last`, `user_name`, `password`, `email`) 
			VALUES (NULL, '$first', '$last', '$user', '$password', '$email')";

#select query based on password user inputted
$selectuser = "SELECT user_name, password FROM webapp WHERE user_name = '$user'";

$userresult = mysqli_query($con, $selectuser);

$array = mysql_fetch_assoc($userresult);
	printf("user: %s password; %s", $array["user"], $array["password"]);




	

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
	<?php echo $user; ?>
	<?php echo $userresult; ?>
	<?php 
		if ($user == $userresult) {
			
			echo 'Welcome to the app';
		}
		else {
			
			echo "something went wrong";
		}

	?>
	
</body>
</html>