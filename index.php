<?php

$login = isset($_GET['login']);
 if($login){
$login = $_GET['login'];
}  
/* $login = $_GET['login'];
print $login; */
?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Crossfit DV8 | Login</title>

</head>

<body>
	<form action="data.php" method="post">
<?php 
if ($login == 1) {
	echo "Incorrect pw";
}
?>


		<label>user name</label>
		<input type="text" name="username" >
		<label>password</label>
		<input type="password" name="password" >
		<input type="submit" value="Submit" >
	</form>
</body>
</html>