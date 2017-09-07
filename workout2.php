<?php 

include('connect.php');

#declaring variables
$workout  = array(); //saves the workout names
$checkbox = array();
$checked = 'checked="checked"';

# pull names of workout form db and looping for checkboxes
$workoutquery = "SELECT * FROM `workout` ";
$workoutresult = mysqli_query($con, $workoutquery);

# check if connect failed
if (!$workoutresult) {
   	die('Invalid query: ' . mysql_error());
}
#taking the sql results in an array
while($row = mysqli_fetch_assoc($workoutresult)) {
	$workout[] = $row['name'];
	
}

# if userid is passed then select from db and display with correct checkboxes marked
if (isset($_GET['userid'])) {
	$id = $_GET['userid'];
	$checkboxquery = "SELECT wrk.name, alw.work_id FROM athlete_workout alw JOIN workout wrk ON wrk.work_ident=alw.work_id WHERE alw.user_id = '$id'";
	$checkboxresult = mysqli_query($con, $checkboxquery);
	
	# check if connect failed
	if (!$checkboxquery) {
    	die('Invalid query: ' . mysql_error());
	}
}	#taking the sql results in an array
	while($row = mysqli_fetch_assoc($checkboxresult)) {
			$checkbox[] = $row;
	}
	
print_r($checkbox);

?>

<?php include('header.php'); ?>

<body>
	<form>
		<?php foreach ($workout as $value) { ?>
		<label>
			<input type="checkbox" name="workout" value="<?php echo $value ?>" <?php if(in_array($value, $checkbox)) { echo $checked; } ?> ><?php echo $value; ?>
		</label>
		<?php echo $value; ?>
		<?php } ?>
	
	</form>
	
	
</body>
</html>