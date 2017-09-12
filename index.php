<?php

$login = isset($_GET['login']);
$badpas = 'You have entered an incorrect password';
?>


<?php include('header.php'); ?>

<body>
	<form action="data.php" method="post">
<?php if ($login == 1) { ?>
	<label id="wrong" ><?php echo $badpas; ?> </label>
	<?php } ?>
		<label>user name</label>
		<input type="text" name="username" >
		<label>password</label>
		<input type="password" name="password" >
		<input type="submit" value="Submit" >
	</form>
</body>
</html>