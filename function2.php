<?php 

function print_array($arrayarray, $arrayresult) {
	
	$count = mysqli_num_rows($arrayresult);
	if (is_array($arrayarray)) {
		
		echo '<table>';
		echo '<tr>';
		foreach (array_keys($arrayarray) as $keys) {
			echo '<th>' . $keys . '</th>';
		}
		echo '</tr>';
		for ($x = 0; $x < $count; $x++) {
			
			echo '<tr>';
			echo $x;
			foreach ($arrayarray as $master) {
			#echo '<tr>';
            echo '<td>' . $master . '</td>';
				echo $x;
			}
        	echo '</tr>';
			
			}
		}
				
		
	
		echo '</table>';
		return;
	}


	

?>