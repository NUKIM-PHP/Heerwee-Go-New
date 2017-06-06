<?php
require('../../connection.php');
header('Content-type: application/json');

$u_id = $_SESSION['user'];
$g_id = $_POST['g_id'];
$num = $_POST['num'];

if(!isset($g_id) || !isset($num)){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}


$sql2 = "INSERT INTO cart('g_id', 'num', 'u_id') VALUES('$g_id', '$num', '$u_id')";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);

$data = [
	result => 0
];

echo json_encode($data);
