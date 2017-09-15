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
		<input id="test1" type="checkbox" name="workout[]" value="seen" >
		label
	</label>
	<input type="text" id="test3">
	<p id='fillout1' >Fill out field</p>
	<input type="text" id="test2">
	<p id='fillout2' >Fill out field</p>
	<label>Email address</label>
	<input type="text" id="email" >
	<p id='fillout3' >Fill out email</p>
	<input id="button" type="button" value="button"  >
	<input type="submit" value="Enter Workout" >
	
</form>
<div id="div1" >it is working</div>
<a>jimbob</a>
<p>i typed something</p>

</body>
</html>
