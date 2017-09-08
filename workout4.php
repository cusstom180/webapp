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
	$workout[] = $row;
	
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
	
echo print_r(array_keys($checkbox)).'<br>';
print_r($checkbox);

?>

<?php include('header.php'); ?>

<body>
	<form>
		<?php for ($c = 0; $c < count($workout); $c++) { ?>
		<label>
			<input type="checkbox" name="workout" value="<?php  ?>" 
				<?php if(array_keys($workout, $workout[$c]) == ) { echo $checked; } ?> >
			<?php echo $workout[$c]['name']; ?>
		</label>
		
		<?php } ?>
	</form>
	
	
</body>
</html>