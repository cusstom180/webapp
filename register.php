<?php
include('connect.php');

# if userid is passed then select from db and display in value and display edit button
if (isset($['userid'])) {
	$id = $['userid'];
	$idquery = "SELECT `user_id`, `first`, `last`, `user_name`, `email` FROM `user_account` WHERE `user_id` = '$id' ";
	$idresult = mysqli_query($con, $idquery);
	$idarray = mysqli_fetch_assoc($idresult);
}

#function add_value()




# if nothing is passed display placeholder and register






?>



<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>user register</title>
</head>

<body>
	<form action=
		<?php if(isset($['userid'])) { 
			echo 'edit.php'; 
		} else { 
			echo 'insert.php';} ?>
		  method="post">
		<label>First Name</label>
		<input type="text" name="first" 
			<?php if(isset($['userid'])) {
					echo 'value="'.$idarray['first'].'"'; 
				} else {
					echo 'placeholder="first name"'; 
				} ?> >
		<label>Last Name</label>
		<input type="text" name="last" 
				<?php if(isset($['userid'])) {
					echo 'value="'.$idarray['last'].'"'; 
				} else {
					echo 'placeholder="last name"'; 
				} ?> >
		<label>User Name</label>
		<input type="text" name="user" 
				<?php if(isset($['userid'])) {
					echo 'value="'.$idarray['user_id'].'"'; 
				} else {
					echo 'placeholder="user name"'; 
				} ?> >
		<?php if (!isset($['userid'])) { ?>
		<label>Password</label>
		<input type="password" name="password" placeholder="password" >
		<?php } ?>
		<label>Email</label>
		<input type="email" name="email" 
				<?php if(isset($['userid'])) {
					echo 'value="'.$idarray['email'].'"'; 
				} else {
					echo 'placeholder="email"'; 
				} ?> >
		<?php if (!isset($['userid'])) { ?>
		<input type="submit" value="Register" >
		<?php } ?>
		<?php if (isset($['userid'])) { ?>
		<input type="submit" value="Edit" >
		<?php } ?>
	</form>
	
	

</body>
</html>