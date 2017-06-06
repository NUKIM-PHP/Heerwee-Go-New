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

$sql2 = "SELECT * FROM invoice";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);

$data = [
	result => 0
];

echo json_encode($data);