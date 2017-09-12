<?php

include('connect.php');

#declare variables
$id = $_POST['userid'];					//userid value
$postarray = $_POST['workout'];			//workouts that are checked in checkbox


# first delete all records in db with userid
$delselect = "SELECT alt_ident FROM athlete_workout alt WHERE user_id =  '$id' ";
$delresult = mysqli_query($con, $delselect);
if (!$delselect) {										//check for errors with 
   	die('Invalid query: ' . mysqli_error());
} else {
	while ($rows = mysqli_fetch_assoc($delresult)) {
		$count =0;
		foreach($rows as $delident) {
			$delstmt = "DELETE FROM athlete_workout WHERE athlete_workout.alt_ident = '$delident' ";
			$delstmtresult = mysqli_query($con, $delstmt);
		}
	}
} 

#insert checkbox work_idnet into db
foreach($postarray as $wrkidnet) {
	$insertresult = "INSERT INTO `athlete_workout` (`user_id`, `work_id`) VALUES ('$id', '$wrkidnet') ";
	$insertquery = mysqli_query($con, $insertresult);
	echo $id.' '.$wrkidnet.'<br>';
}
$succ = '&success=1';
header('Location: wrk.php?userid='.$id.$succ);
?>


