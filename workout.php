<?php 

include('connect.php');
 
#variables for checkbox function
$bs='Back squat';
$fs='Front squat';
$dl='Dead lift';
$sp='Shoulder Press';
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
	
	
	#return;
}
# need to write a loop the will check the values
#	name	workout	
#	1		1, 2
#	2		1,2,4

# write a query to pull from the athele workout table for alw ident with the user id of $id 
# then if the result for the query are backsquat then the backsquat button is checked.
# then pass the alw ident as the value for the checkbox
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
		
		<label><input type="checkbox" name="backsquat" value="backsquat" <?php checkbox_echo($bs, $id, $con); ?> >Back squat</label>
		<label><input type="checkbox" name="frontsquat" value="frontsquat"  <?php checkbox_echo($fs, $id, $con); ?>  >Front squat</label>
		<label><input type="checkbox" name="deadlift" value="deadlift"  <?php checkbox_echo($dl, $id, $con); ?>  >Dead lift</label>
		<label><input type="checkbox" name="shoulder" value="shoulder"  <?php checkbox_echo($sp, $id, $con); ?>  >Shoulder press</label>
		<label><input type="checkbox" name="presspush" value="presspush" <?php checkbox_echo($pp, $id, $con); ?>  >Press press</label>
		<input type="hidden" name="id" value="<?php echo $idarray['ID']; ?>" >
		<input type="Submit" value="Update" >
	</form>
</body>
</html>