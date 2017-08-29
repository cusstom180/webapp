<?php 

include('connect.php');

include('function2.php');

$allquery = "SELECT * FROM `user_account` ";

$allresult = mysqli_query($con, $allquery);

$allarray = mysqli_fetch_assoc($allresult);

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<table >
		<tr>
			<th><?php $allarray['user_id'] ?></th>
			<th><?php $allarray['first'] ?></th>
			<th><?php $allarray['last'] ?></th>
			<th><?php $allarray['email'] ?></th>
		</tr>
		<tr>
			<td><?php echo $allarray['user_id']; ?></td>
			<td><?php echo $allarray['first']; ?></td>
			<td><?php echo $allarray['last']; ?></td>
			<td><?php echo $allarray['email']; ?></td>
			<td><a href="delete.php?userid=<?php echo $allarray['user_id'] ?>"> <button type="button">Delete</button> </a></td>
		</tr>
		
	</table

</body>
</html>
