<?php  #trying to make a loop to read through the sql results
		
		$count = mysqli_num_rows($allresult);
	echo $count;
	?>
		
		<table>
			<tr>
			<?php foreach (array_keys($allarray) as $keys) {
				echo '<th>' . $keys . '</th>';
			} ?>
			</tr>
			<tr>
				<td><?php $allarray['user_id'] ?></td>
			</tr>
			
			
<?php print_r(array_values($allarray)) ?>
				<br>
				<?php print_r($allarray);?>
				<br>
		
	
		</table>
		<?php var_dump($allarray) ?>

#delete button		
<!--<a href="delete.php?userid=<?php echo $allarray['user_id'] ?>"> <button type="button">Delete</button> </a> -->

#old delete.php code
<?php 

include('connect.php');

$id = '';
#check if value is entered in textbox
$delid = isset($_GET['delid']);
if($delid) {
	$id = $_GET['delid'];
}

#SQL query and collecting the data for ID entered for user
$searchquery = "SELECT * FROM `user_account` WHERE `user_id` = '$id' ";

$searchresult = mysqli_query($con, $searchquery);

$searcharray = mysqli_fetch_assoc($searchresult);

#check if delete button submitted
#$delbut = isset($_GET['delbut']);
#if($delbut) {
#	$delbut = $_GET['delbut'];
#}

$validate = '';

if (isset($_GET['delbut'])) {
	
	echo 'delete button is set';
	$delbut = $delid;
	
	$delstat = "DELETE FROM `user_account` WHERE `user_account`.`user_id` = '$id'  ";

	$deletequery = mysqli_query($con, $delstat);	

	$validate = 'User has been deleted';
	}
	
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
	
	<form action="delete.php" method="get">
		
		<h3>Who do you want to delete forever</h3>
		<label>Enter an ID number</label>
		<input type="text" name="delid" >
		
	</form>
	
	<!-- display table of id entered by user from above -->
	<?php echo $rows = mysqli_num_rows($searchresult); ?>
	<?php if (mysqli_num_rows($searchresult)) { ?>
	

	<table >
		<tr>
			<th>ID</th>
			<th>First</th>
			<th>Last</th>
			<th>Email</th>
		</tr>
		<tr>
			<td><?php echo $searcharray['user_id']; ?></td>
			<td><?php echo $searcharray['first']; ?></td>
			<td><?php echo $searcharray['last']; ?></td>
			<td><?php echo $searcharray['email']; ?></td>
			<td><a href="delete.php?userid=<?php echo $searcharray['user_id'] ?>"> <button type="button">Delete</button> </a></td>
		</tr>
		
	</table>

	
	<?php } ?>
	<?php echo $validate . '<br>'; ?>
	<?php echo 'delete button ' . $delbut . '<br>'; ?>
	<?php echo $delid; ?>
</body>
</html>


# old code from first user.php
<?php 

include('connect.php');

include('function2.php');

# code for getting id thru URL
#check if value is send thru URL
$id = isset($_GET['id']);
	if($id){
	 
		$id =  $_GET['id'];
	} 

#SQL query and collecting the data
$idquery = "SELECT * FROM `user_account` WHERE `user_id` = '$id' ";

$idresult = mysqli_query($con, $idquery);

$idarray = mysqli_fetch_assoc($idresult);

#code for query all users
$choice = isset($_GET['select']);
if($choice){
	$choice = $_GET['select'];
	
} 

echo $choice;


	$allquery = "SELECT * FROM `user_account` ";

	$allresult = mysqli_query($con, $allquery);

	$allarray = mysqli_fetch_assoc($allresult);

$rows = mysqli_num_rows($allresult);

if ($choice == 'delete') {
	header('Location: delete.php');	
}
		

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

	<form action="user.php" method="get" >
		<h1>Select one</h1>
		<input type="radio" name="select" value="all" > See all users<br>
		<input type="radio" name="select" value="delete" > Delete a user<br>
		<input type="submit" value="Submit" >
		
		
	</form>
	
	<?php echo $rows; ?>
	<!-- display table if data was enter thru URL -->
	<?php if (mysqli_num_rows($idresult)) { ?>

	<table>
		<tr>
			<th>ID</th>
			<th>First</th>
			<th>Last</th>
			<th>Email</th>
		</tr>
		<tr>
			<td><?php echo $idarray['user_id']; ?></td>
			<td><?php echo $idarray['first']; ?></td>
			<td><?php echo $idarray['last']; ?></td>
			<td><?php echo $idarray['email']; ?></td>
		</tr>
		
	</table>

	<?php } ?>
	
	<!-- display table if all was selected -->
	<?php 
	if ($choice == 'all') {
		
		print_array($allarray, $allresult);
	}
	 ?>
	
</body>
</html>

# old edit code
<?php

include('connect.php');

$userid = $_POST['userid'];

$selectstat = "SELECT `user_id`, `first`, `last`, `user_name`, `email` FROM `user_account` WHERE `user_id` = '$userid' ";

$selectquery = mysqli_query($con, $selectstat);

$selectarray = mysqli_fetch_assoc($selectquery);

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>user register</title>
</head>

<body>
	<form action="insert.php" method="get">
		<input type="hidden" name="userid" value="<?php echo $selectarray['user_id'] ?>" >
		<label>First Name</label>
		<input type="text" name="first" value="<?php echo $selectarray['first'] ?>" >
		<label>Last Name</label>
		<input type="text" name="last" value="<?php echo $selectarray['last'] ?>" >
		<label>User Name</label>
		<input type="text" name="user" value="<?php echo $selectarray['user_name'] ?>" >
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $selectarray['email'] ?>" >
		<input type="submit" value="Submit" >
	</form>
	
	

</body>
</html>	
	