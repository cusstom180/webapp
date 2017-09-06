<?php 

include('connect.php');

$id = $['userid'];

#SQL query and collecting the data for ID passed
$delstat = "DELETE FROM `user_account` WHERE `user_id` = '$id'  ";

$deletequery = mysqli_query($con, $delstat);	

header('Location: user.php');

?>
