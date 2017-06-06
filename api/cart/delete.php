<?php
require('../../connection.php');
header('Content-type: application/json');

$g_id = $_POST['g_id'];
$u_id = $_SESSION['user'];

if(!isset($_SESSION['user'])){
	$data = [
		result => -99,
		message => 'Need to login.'
	];
	echo json_encode($data);
	exit();
}

if(isset($g_id)){
	$sql2 = "DELETE FROM cart WHERE u_id = '$u_id' AND g_id = '$g_id'";
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