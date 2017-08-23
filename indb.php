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
$useridcheckquery = "SELECT * FROM `user_account` WHERE `user_name` = '$user'";

$useridcheck = mysqli_query($con, $useridcheckquery);

$userquerycheck = mysqli_fetch_assoc($useridcheck);

if ($userquerycheck['email'] == $email) {
	
	header('register.php');
}	
else {
	
	$insert = "INSERT INTO `user_account` (`user_id`, `first`, `last`, `user_name`, `password`, `email`) 
			VALUES (NULL, '$first', '$last', '$user', '$password', '$email')";

if (mysqli_query($con, $insert)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insert . "<br>" . mysqli_error($con);
}
}



#insert statement for new user
#$insert = "INSERT INTO `user_account` (`user_id`, `first`, `last`, `user_name`, `password`, `email`) 
#			VALUES (NULL, '$first', '$last', '$user', '$password', '$email')";

#if (mysqli_query($con, $insert)) {
#    echo "New record created successfully";
#} else {
#   echo "Error: " . $insert . "<br>" . mysqli_error($con);
#}

#select query based on password user inputted
#$selectuser = "SELECT * FROM `user_account` WHERE `user_name` = '$user'";

#$userresult = mysqli_query($con, $selectuser);



if(mysqli_num_rows($useridcheck) > 0) {
	$rowcount = mysqli_num_rows($useridcheck);
		echo $rowcount;
	while ($array = mysqli_fetch_assoc($useridcheck)) {
		echo $array['user_name'] . " " . $array['email'];
	}
}else {
	echo "0 results";
}

	




	

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
	<?php echo $user; ?>
	
	<?php 
		echo $array['user_name'] . " " . $array['email'];

	?>
	
</body>
</html>