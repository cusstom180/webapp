<?php include('functions.php') ?>

<?php include('connect.php') ?>

<?php 

	$check_login_user($con, add user name request);


	
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>

<body>
	<form action="indb.php" method="post">
		<label>User Name</label>
		<input type="text" name="user" placeholder="user name" >
		<label>Password</label>
		<input type="password" name="password" placeholder="password" >
		<label>Email</label>
		<input type="submit" value="Submit" >
	</form>

</body>
</html>