<?php 

include('connect.php');

$first = $_GET["first"];
$last = $_GET["last"];

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
First name: <?php echo $first ?>
Last name: <?php echo $last ?>
</body>
</html>