<?php

$login = isset($_GET['login']);
 if($login){
$login = $_GET['login'];
}  
/* $login = $_GET['login'];
print $login; */
?>


<?php include('header.php'); ?>

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