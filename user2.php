<?php 

include('connect.php');

include('function2.php');

$allquery = "SELECT `user_id`, `first`, `last`, `user_name`, `email` FROM `user_account` ";

$allresult = mysqli_query($con, $allquery);

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php  
		
	echo '<table>';
	echo '<tr>';
	echo '<th>ID</th>';
	echo '<th>First</th>';
	echo '<th>Last</th>';
	echo '<th>User name</th>';
	echo '<th>Email</th>';
	echo '</tr>';
	while ($row = mysqli_fetch_array($allresult)) {
	echo '<tr>';
	echo '<td>'.($row['user_id'])."</td>";
    echo '<td>'.($row['first']).'</td>';
	echo '<td>'.($row['last']).'</td>';
	echo '<td>'.($row['user_name']).'</td>';
	echo '<td>'.($row['email']).'</td>';
	echo '<td><a href="delete.php?userid='.$row['user_id'].'"> <button type="button">Delete</button> </a></td>';
	echo '</tr>';
	}

	echo "</table>";
?>
</body>
</html>
