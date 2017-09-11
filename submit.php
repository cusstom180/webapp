<?php

include('connect.php');

#declare variables
$id = $_POST['userid'];					//userid value
$postarray = $_POST['workout'];			//workouts that are checked in checkbox
$delarray = $_POST['delete'];			//all workouts in hidden status
$checkarray = array();					//array to hold results of db query of check db for work_ident existiing already

/*echo 'this is the post array ';			
print_r($postarray);
echo '<br>';
echo $id;
echo '<br>';
*/
#sql select for all rows with userid 
$select = "SELECT alt_ident, work_id FROM athlete_workout alt WHERE user_id =  '$id' ";
$selresult = mysqli_query($con, $select);

if (!$selresult) {										//check for errors with 
   	die('Invalid query: ' . mysqli_error());
} else {

	while($row1 = mysqli_fetch_assoc($selresult)){ // use fetch_assoc array with key values for select all from db on userid
				$rowPkeky = $row1['alt_ident'];
				$rowName = $row1['work_id'];
					$data[$rowPkeky] =  $rowName ;							//array for all results form db where userid is present
			}
}

#print_r($delarray);
#echo 'array before<br>';

#compare delarray to postarray => $data and delete values the are in the postarray to only have left the unchecked boxes and delete those values form the db
foreach($delarray as $k => $val) {																					//loop thru array by work_ident in delarray
	if (array_search($val, $data)) {																//search values in $data array
		#echo $val.' this is the value in the array <br>';
		unset($delarray[$k]);																		//remove the same dupicate rows
		
		# check if alt_workout table has rows for userid and work_ident
		$identselect = "SELECT alt_ident FROM athlete_workout WHERE user_id = '$id' AND work_id ='$val' ";		//select stat to get table ident and run query
		$identresult = mysqli_query($con, $identselect);														
		#$identarray = mysqli_fetch_array($identresult);															//array with the table ident for the row to be deleted
		echo mysqli_num_rows($identresult);
		
		while($row = mysqli_fetch_assoc($checkarray)){ // use fetch_assoc array with key values for select all from db on userid
				#$rowPkeky = $row['alt_ident'];
				#$rowName = $row1['work_id'];
					$checkarray[] =  $row ;							//array for all results form db where userid is present
			}
			
		print_r($identarray);
				
		echo 'rows form the db based on id and work ident<br>';
		
		/*foreach($identarray as $delid) {																		//loop thru array to get the table ident to be deleted
			$delstat = "DELETE FROM `athlete_workout` WHERE `athlete_workout`.`alt_ident` = '$delid' ";			//delete statement 
			$delresult = mysqli_query($con, $delstat);
		}*/
	}
}

#print_r($delarray);
#echo 'array after<br>';	
# compare the postarray to to what is in the database
# if postarray value is in db then return true 
# else insert new entry into db

#compare postarray to db
/*	foreach($postarray as $key => $value) {
		if(in_array($value, $data)) {
			echo 'value '.$value.' is in the delete ';
		} else {
			echo $value.' it is not in the array ';
			$insert = "INSERT INTO `athlete_workout` (`user_id`, `work_id`) VALUES ('$id', '$value')";
			$insertresult = mysqli_query($con, $insert);
		}*/
		#header('Location: wrk.php?userid='.$id);
	
/*

*/

?>


