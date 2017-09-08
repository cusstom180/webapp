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
} else {
		 while($row = mysqli_fetch_assoc($workoutresult)){ // use fetch_assoc 
		 $rowPkeky = $row['work_ident'];
		 $rowName = $row['name'];
			$work[$rowPkeky] =  $rowName ;
        }  
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
	else{
		 while($row1 = mysqli_fetch_assoc($checkboxresult)){ // use fetch_assoc 
			$rowPkeky = $row1['work_id'];
			$rowName = $row1['name'];
				$data[$rowPkeky] =  $rowName ;
        }  
	}
}	


?>

<?php include('header.php'); ?>

<form>
	<?php foreach ($work as $key => $value) { ?>
	<label>
		<input type="checkbox" name="workout" value="<?php echo $key; ?>" 
			<?php if(array_key_exists($key, $data)) {echo $checked;}?> >
		<?php echo $value; ?>
	</label>
	<?php } ?>
</form>