<?php
require('../../connection.php');
header('Content-type: application/json');

if(!isset($_SESSION['admin'])){
	$data = [
		result => -99,
		message => 'You are not an admin.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "SELECT * FROM user";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);
mysqli_close($link);

if(isset($row)){
	$data = [
		result => 0,
		users => $row
	];
}else{
	$data = [
		result => -1,
		message => 'No user.'
	];
}
echo json_encode($data);
