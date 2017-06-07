<?php
require('../../connection.php');
header('Content-type: application/json');

// if(!isset($_SESSION['admin'])){
// 	$data = [
// 		result => -99,
// 		message => 'You are not an admin.'
// 	];
// 	echo json_encode($data);
// 	exit();
// }

$id = $_GET['id'];

if(!isset($id)){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);
mysqli_close($link);

if(count($users)){
	$data = [
		result => 0,
		user => $row
	];
}else{
	$data = [
		result => -1,
		message => 'User not found.'
	];
}
echo json_encode($data);
