<?php 

include('connect.php');

include('function2.php');

$allquery = "SELECT `user_id`, `first`, `last`, `user_name`, `email` FROM `user_account` ";

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

<?php  
		
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
		
			<!--<a href="delete.php?userid=<?php echo $allarray['user_id'] ?>"> <button type="button">Delete</button> </a> -->
	

</body>
</html>
