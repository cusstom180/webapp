//to have user register for app

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Untitled Document</title>
</head>

<body>
	<form>
		<label>First Name</label>
		<input type="text" name="first" placeholder="first name" >
		<label>Last Name</label>
		<input type="text" name="last" placeholder="last name" >
		<label>User Name</label>
		<input type="text" name="user" placeholder="user name" >
		<label>Password</label>
		<input type="password" name="password" placeholder="password" >
		<label>Email</label>
		<input type="email" name="email" placeholder="email" >
		<input type="submit" value="Submit" >
	</form>
	
	<div class="report" >
		<?php 
			if($success != "") {
				echo $success;
			}
			else {
				echo $insertfail;
			}
		?>
	</div>

</body>
</html>