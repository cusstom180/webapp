<?php include('header.php'); ?>
 <style>
	 #div1 {
		 display: none;
		 
	 }

</style>
<body>

	<form action="" method="post" >
	<label>
		<input id="testhidden" type="checkbox" name="delete[]" value="hide" >
		<input id="test" type="checkbox" name="workout[]" value="seen" >
		label
	</label>
	<input id="button" type="button" value="button" >
	<input type="submit" value="Enter Workout" >
</form>
<div id="div1" >it is working</div>

</body>
</html>
