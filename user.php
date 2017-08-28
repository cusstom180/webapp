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