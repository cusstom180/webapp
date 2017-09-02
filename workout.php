<?php 

include('connect.php');

# if userid is passed then select from db and display in value and display edit button
if (isset($_GET['userid'])) {
	$id = $_GET['userid'];
	$idquery = "SELECT ua.first, ua.last, w.name FROM user_workout uw, user_account ua, workout w WHERE uw.work_id=w.work_id AND ua.user_id=uw.user AND ua.user_id='$id'";
	$idresult = mysqli_query($con, $idquery);
	$idarray = mysqli_fetch_assoc($idresult);
	# need more checks
	if (!$idresult) {
    	die('Invalid query: ' . mysql_error());
	}
	
}
# need to write a loop the will check the values
#	name	workout	
#	1		1, 2
#	2		1,2,4

?>

<?php include('header.php'); ?>

<body>
	
	<?php  
	echo print_r($idarray).'<br>';
	echo var_dump($idarray);
	echo '<table>';
	echo '<tr>';
	foreach($idarray as $key=>$value){
    echo '<th>'.$key.'</th>'; 
	}
	echo '</tr>';
	echo '<tr>';
	echo '<td>'.$idarray['first'].'</td>';
	echo '<td>'.$idarray['last'].'</td>';
	echo '<td>'.$idarray['name'].'</td>';
	echo '</tr>';
    
	
	echo '</table>';
	?>
</body>
</html>