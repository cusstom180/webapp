<?php 

include('connect.php');

$id = $_GET['userid'];

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



#SQL query and collecting the data for ID passed
$delstat = "DELETE FROM `user_account` WHERE `user_id` = '$id'  ";

$deletequery = mysqli_query($con, $delstat);	

if (!$delstat) {									//check for errors with 
	echo mysqli_error($con);
   	die('Invalid query: ' . mysqli_error());
	
} else {
		header('Location: user');
		}

?>
