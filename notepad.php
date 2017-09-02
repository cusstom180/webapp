<?php echo '<table>';
	echo '<tr>';
	foreach (array_keys($idarray) as $keys) {
			echo '<th>' . $keys . '</th>';
		}
	#echo '<th>ID</th>';
	#echo '<th>Workout</th>';
	echo '</tr>';
	while ($row = mysqli_fetch_array($idresult)) {
		echo '<tr>';
		echo '<td>'.($row['ua.first']).'</td>';
		echo '<td>'.($row['last']).'</td>';
    	echo '<td>'.($row['work_id']).'</td>';
		echo '</tr>';
	}
?>