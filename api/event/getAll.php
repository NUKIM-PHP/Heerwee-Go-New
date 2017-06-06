<?php
require('../../connection.php');
header('Content-type: application/json');

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