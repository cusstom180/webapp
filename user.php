<?php 

include('connect.php');

$allquery = "SELECT user_id as ID, first as First, last as Last, user_name as `User name`, email as Email FROM `user_account` ";

$allresult = mysqli_query($con, $allquery);

?>

<?php include('header.php'); ?>
	
	<table>
		<tr>
			<th>First</th>
			<th>Last</th>
			<th>User name</th>
			<th>Email</th>
		</tr>
		<?php while ($row = mysqli_fetch_array($allresult)) { ?>
		<tr>
			<td><?php echo $row['First']; ?></td>
			<td><?php echo $row['Last']; ?></td>
			<td><?php echo $row['User name']; ?></td>
			<td><?php echo $row['Email']; ?></td>
			<td><a href="delete.php?userid=<?php echo $row['ID']; ?>"> <button type="button">Delete</button> </a></td>
			<td><a href="addedit.php?userid=<?php echo $row['ID']; ?>"> <button type="button">Edit</button> </a></td>
			<td><a href="wrk.php?userid=<?php echo $row['ID']; ?>"> <button type="button">Workout</button> </a></td>
		
		</tr>
		<?php } ?>
		<tr>
			<td><a href="addedit.php"> <button type="button">Add User</button> </a></td>
		</tr>
	</table>


