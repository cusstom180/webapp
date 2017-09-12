<?php 

include('connect.php');

#declaring variables
$workout  = array(); //saves the workout names
$checkbox = array();
$checked = 'checked="checked"';

if(isset($_GET['success'])) {
	$suc = 'update complete';
} else {
	$suc = 1;
}

 # pull names of workout form db and looping for checkboxes labels
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

#display athletes name above checkboxes
$namesel = "SELECT usr.first, usr.last FROM user_account usr WHERE usr.user_id = '$id' ";
$namequery = mysqli_query($con, $namesel);
$title = mysqli_fetch_assoc($namequery); // use fetch_assoc 
if (!$namequery) {
    	die('Invalid query: ' . mysqli_error());
	}

?>

<?php include('header.php'); ?>

	<form action="submit.php" method="post" >
		<label><?php echo $title['first'].' '.$title['last']; ?></label>
		<input  type="hidden" name="userid" value="<?php echo $id ?>" >
		<?php foreach ($work as $key => $value) { ?>
		<label>
			<input id="test" type="checkbox" name="workout[]" value="<?php echo $key; ?>" 
				<?php if(array_key_exists($key, @$data)) {echo $checked;} ?> >
			<?php echo $value; ?>
		</label>
		<?php } ?>
		<input type="submit" value="Enter Workout" >
		<?php if($suc != 1){echo $suc;?>
		<a href="user"> <button type="button">Back to all users</button> </a>
		<?php } ?>
	</form>