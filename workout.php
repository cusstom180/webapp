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
	$idquery = "SELECT usr.first as First, usr.last as Last, group_concat(wrk.name SEPARATOR ', ') as Workout FROM workout wrk JOIN athlete_workout alw ON wrk.work_ident=alw.work_id JOIN user_account usr ON usr.user_id=alw.user_id WHERE alw.user_id = '$id' ";
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
			echo 'checked';
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

?>

<?php include('header.php'); ?>

<body>
	
	<?php  
	echo print_r($idarray).'<br>';
	#echo var_dump($idarray);
	echo mysqli_num_rows($idresult);
	echo '<table>';
	echo '<tr>';
	foreach($idarray as $key=>$value){
    echo '<th>'.$key.'</th>'; 
	}
	echo '</tr>';
	echo '<tr>';
	echo '<td>'.$idarray['First'].'</td>';
	echo '<td>'.$idarray['Last'].'</td>';
	
	#while ($row = mysqli_fetch_array($idresult))
		echo '<td>'.$idarray['Workout'].'</td>';
	
	echo '</tr>';
    
	
	echo '</table>';
	?>
	
	<form action="workout.php" method="get" >
		<label><? echo $idarray['First'].' '.$idarray['Last']?></label>
		<input type="checkbox" name="workout" value="backsquat" <?php checkbox_echo($bs, $id, $con); ?> >
		<div>Back squat</div>
		<input type="checkbox" name="workout" value="frontsquat"  <?php checkbox_echo($fs, $id, $con); ?>  >
		<div>Front squat</div>
		<input type="checkbox" name="workout" value="deadlift"  <?php checkbox_echo($dl, $id, $con); ?>  >
		<div>Dead lift</div>
		<input type="checkbox" name="workout" value="shoulder"  <?php checkbox_echo($sp, $id, $con); ?>  >
		<div>Shoulder press</div>
		<input type="checkbox" name="workout" value="presspush" <?php if($idarray['Workout'] == true) {echo 'checked';} ?> >
		<div>Press press</div>
		
		<?php if($idarray['Workout'] == true) {echo 'checked';} else {echo 'false';}?>
		
		<?php 
			$bs='Back squat'; 
			checkbox_echo($bs, $id, $con); 
			#echo $testfucntion;
		?>
		
	</form>
</body>
</html>