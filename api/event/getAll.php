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

$sql2 = "SELECT * FROM event";
$result = mysqli_query($link, $sql2);
$events = [];
while($row = mysqli_fetch_assoc($result)){
	array_push($events, $row);
}
mysqli_close($link);

if(count($events)){
	$data = [
		result => 0,
		events => $events
	];
}else{
	$data = [
		result => -1,
		message => 'No user.'
	];
}
echo json_encode($data);