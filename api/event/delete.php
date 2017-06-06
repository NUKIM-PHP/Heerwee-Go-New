<?php
require('../../connection.php');
header('Content-type: application/json');

$id = $_POST['id'];

if(isset($id)){
	$sql2 = "DELETE FROM event WHERE id = '$id'";
	mysqli_query($link, $sql2);
	mysqli_close($link);
	$data = [
		result => 0
	];
	echo json_encode($data);
}else{
	$data = [
	result => -98,
	message => 'Invalid data.'
];
	echo json_encode($data);
	exit();
}
