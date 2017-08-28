<?php 

include('connect.php');

#check if value is entered in textbox
$delid = isset($_GET['delid']);
if($delid) {
	$delid = $_GET['delid'];
}

#SQL query and collecting the data for ID entered for user
$searchquery = "SELECT * FROM `user_account` WHERE `user_id` = '$delid' ";

$searchresult = mysqli_query($con, $searchquery);

$searcharray = mysqli_fetch_assoc($searchresult);

#check if delete button submitted
$delbut = isset($_GET['delbut']);
if($delbut) {
	$delbut = $_GET['delbut'];
}

$delstat = "DELETE FROM `user_account` WHERE `user_id` = '$delid' ";

$deletequery = mysqli_query($con, $delstat);



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
	
	<table>
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
			<td>delete<input type="submit" name="delbut" formaction="delete.php" formmethod="get" value="Delete"></td>
		</tr>
		
	</table>

	<?php } ?>
</body>
</html>