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