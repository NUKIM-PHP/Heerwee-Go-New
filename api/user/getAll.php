<?php
require('../../connection.php');
header('Content-type: application/json');

$sql2 = "SELECT * FROM `user`";
$result = mysqli_query($link, $sql2);
$users = [];
while($row = mysqli_fetch_assoc($result)){
	array_push($users, $row);
}
mysqli_close($link);

if(count($users)){
	$data = [
		result => 0,
		users => $users
	];
}else{
	$data = [
		result => -1,
		message => 'No users yet.'
	];
}

echo json_encode($data);
