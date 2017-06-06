<?php
require('../../connection.php');
header('Content-type: application/json');

if(!isset($_SESSION['user'])){
	$data = [
		result => -99,
		message => 'Need to login.'
	];
	echo json_encode($data);
	exit();
}

$id= $_GET['id'];
$u_id = $_SESSION['user'];

$sql2 = "SELECT * FROM invoice, detail WHERE id = '$id' AND u_id = '$u_id'";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);

$data = [
	result => 0
];

echo json_encode($data);