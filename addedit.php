<?php
include('connect.php');

# if userid is passed then select from db and display in value and display edit button
if (isset($_GET['userid'])) {
	$id = $_GET['userid'];
	$idquery = "SELECT `user_id`, `first`, `last`, `user_name`, `email` FROM `user_account` WHERE `user_id` = '$id' ";
	$idresult = mysqli_query($con, $idquery);
	$idarray = mysqli_fetch_assoc($idresult);
}

if (isset($_GET['password'])) {
	if($_GET['password'] == 1) {
		$message = 'Email address is already in use. Please enter another email';
	}
	if($_GET['password'] == 2) {
		$message = 'User name is already in use. Please enter another name';
	}
}

?>

<?php include ('header.php'); ?>

<body>
	<form method="post" action= '<?php if(isset($_GET['userid'])) {echo 'edit.php'; } else {echo 'insert.php';}?>'>
		<?php if(isset($message)){?>
		<label id="wrong" ><?php echo $message; ?></label>
		<?php } ?>
		<?php if(isset($idarray['user_id'])) { ?>
		<input type="hidden" name="userid" value="<?php echo $idarray['user_id'] ?>" > 
		<?php } ?>
		<label>First Name</label>
		<input type="text" name="first" id="fname"
			<?php if(isset($_GET['userid'])) {
					echo 'value="'.$idarray['first'].'"'; 
				} else {
					echo 'placeholder="first name"'; 
				} ?> >
		<p id='fnamewrong' >Fill out field</p>
		<label>Last Name</label>
		<input type="text" name="last" id="lname"
				<?php if(isset($_GET['userid'])) {
					echo 'value="'.$idarray['last'].'"'; 
				} else {
					echo 'placeholder="last name"'; 
				} ?> >
		<p id='lnamewrong' >Fill out field</p>
		<label>User Name</label>
		<input type="text" name="user" id="user"
				<?php if(isset($_GET['userid'])) {
					echo 'value="'.$idarray['user_id'].'"'; 
				} else {
					echo 'placeholder="user name"'; 
				} ?> >
		<?php if (!isset($_GET['userid'])) { ?>
		<p id='userwrong' >Fill out field</p>
		<label>Password</label>
		<input type="password" name="password" id="pass" placeholder="password" >
		<?php } ?>
		<p id='passwrong' >Fill out field</p>
		<label>Email</label>
		<input type="email" name="email" id="email"
				<?php if(isset($_GET['userid'])) {
					echo 'value="'.$idarray['email'].'"'; 
				} else {
					echo 'placeholder="email"'; 
				} ?> >
		<?php if (!isset($_GET['userid'])) { ?>
		<p id='emailwrong' >Use a valid email address</p>
		<input type="submit" value="Register" id="submt" >
		<?php } ?>
		<?php if (isset($_GET['userid'])) { ?>
		<input type="submit" value="Edit" >
		<?php } ?>
	</form>
	
	

</body>
</html>