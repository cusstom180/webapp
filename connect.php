<?php

//variables for db connct
$host = 'localhost';
$dbusername = 'webappadmin';
$dbpassword = '123456789';
$db = 'webapp';

$con = mysqli_connect($host, $dbusername, $dbpassword,$db);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>


<!--

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
hi
	
</body>
</html>
-->