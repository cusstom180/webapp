<?php 


function check_login_user($conn, $username) {
	
	$q = "SELECT * FROM webapp WHERE user_name = '$uername'";
	$r = mysqli_query($conn, $q);
	
	$data = mysqli_fetch_assoc($r);
	
	return $data['user_name'];
}










?>



<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>