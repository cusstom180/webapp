<?php 

include('connect.php');
 
#variables for checkbox function
$bs='Back squat';
$fs='Front squat';
$dl='Dead lift';
$sh='Shoulder Press';
$pp='Push press';
# if userid is passed then select from db and display in value and display edit button
if (isset($_GET['userid'])) {
	$id = $_GET['userid'];
	$idquery = "SELECT alw.user_id as ID, usr.first as First, usr.last as Last, group_concat(wrk.name SEPARATOR ', ') as Workout FROM workout wrk JOIN athlete_workout alw ON wrk.work_ident=alw.work_id JOIN user_account usr ON usr.user_id=alw.user_id WHERE alw.user_id = '$id' ";
	$idresult = mysqli_query($con, $idquery);
	$idarray = mysqli_fetch_assoc($idresult);
	# need more checks
	if (!$idresult) {
    	die('Invalid query: ' . mysql_error());
	}
		
}

function checkbox_echo($string, $id, $connect) {
	$query = "SELECT usr.first as First, usr.last as Last, wrk.name as Workout FROM workout wrk JOIN athlete_workout alw ON wrk.work_ident=alw.work_id JOIN user_account usr ON usr.user_id=alw.user_id WHERE alw.user_id = '$id' ";
	$result = mysqli_query($connect, $query);
	while($rows = mysqli_fetch_assoc($result)){
		if(in_array($string, $rows)) {
			echo 'checked="checked"';
		} else {
			echo  '';
		}
	}
}
# need to write a loop the will check the values
#	name	workout	
#	1		1, 2
#	2		1,2,4

# write a query to pull from the athele workout table for alw ident with the user id of $id 
# then if the result for the query are backsquat then the backsquat button is checked.
# then pass the alw ident as the value for the checkbox
#work_id = 1 = backsquat
$bsquery = "SELECT * FROM `athlete_workout` WHERE `work_id` = 1 AND `user_id` = '$id' ";
#work_id = 1 = frontsquat
$fsquery = "SELECT * FROM `athlete_workout` WHERE `work_id` = 2 AND `user_id` = '$id' ";
#work_id = 1 = deadlift
$dlquery = "SELECT * FROM `athlete_workout` WHERE `work_id` = 3 AND `user_id` = '$id' ";
#work_id = 1 = shoulder
$shquery = "SELECT * FROM `athlete_workout` WHERE `work_id` = 4 AND `user_id` = '$id' ";
#work_id = 1 = pushpress
$ppquery = "SELECT * FROM `athlete_workout` WHERE `work_id` = 5 AND `user_id` = '$id' ";

function checked_key_value($query, $con) {
$result = mysqli_query($con, $query);
$array = Mysqli_fetch_assoc($result);
if (isset($array['work_id'])) {
	echo $array['alw_ident'];
}else {
			echo  'insert';
		}
}
?>

<?php include('header.php'); ?>

<body>
	
	<?php  
	#echo print_r($idarray).'<br>';
	#echo var_dump($idarray);
	#echo mysqli_num_rows($idresult);
	echo '<table>';
	echo '<tr>';
	foreach($idarray as $key=>$value){
    echo '<th>'.$key.'</th>'; 
	}
	echo '</tr>';
	echo '<tr>';
	echo '<td>'.$idarray['ID'].'</td>';
	echo '<td>'.$idarray['First'].'</td>';
	echo '<td>'.$idarray['Last'].'</td>';
	
	#while ($row = mysqli_fetch_array($idresult))
		echo '<td>'.$idarray['Workout'].'</td>';
	
	echo '</tr>';
    
	
	echo '</table>';
	?>
	
	<form action="update.php" method="post" >
		<label><?php echo $idarray['First'].' '.$idarray['Last']; ?></label>
		
		<label><input type="checkbox" name="backsquat" value="<?php checked_key_value($bsquery, $con); ?>" <?php checkbox_echo($bs, $id, $con); ?> >Back squat</label>
		<label><input type="checkbox" name="frontsquat" value="<?php checked_key_value($fsquery, $con); ?> "  <?php checkbox_echo($fs, $id, $con); ?> >Front squat</label>
		<label><input type="checkbox" name="deadlift" value="<?php checked_key_value($dlquery, $con); ?>"   <?php checkbox_echo($dl, $id, $con); ?> >Dead lift</label>
		<label><input type="checkbox" name="shoulder" value="<?php checked_key_value($shquery, $con); ?>"   <?php checkbox_echo($sh, $id, $con); ?> >Shoulder press</label>
		<label><input type="checkbox" name="presspush" value="<?php checked_key_value($ppquery, $con); ?>"  <?php checkbox_echo($pp, $id, $con); ?> >Press press</label>
		<input type="hidden" name="id" value="<?php echo $idarray['ID']; ?>" >
		<input type="Submit" value="Update" >
	</form>
</body>
</html>