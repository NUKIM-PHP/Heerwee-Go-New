<?php
require('../../connection.php');
header('Content-type: application/json');

$u_id = $_POST['u_id'];
$shipmethod = $_POST['shipmethod'];
$shipaddress = $_POST['shipaddress'];
$p_method = $_POST['p_method'];
$r_name = $_POST['r_name'];
$cp_id = $_POST['cp_id'];
$pic = $_FILES['upload'];

$p_time = $_POST['p_time']; //時間

if(
	!isset($u_id) ||
	!isset($shipmethod) ||
	!isset($shipaddress) ||
	!isset($p_method) ||
	!isset($r_name)
){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "INSERT INTO invoice (u_id, shipmethod, shipaddress, p_method, r_name, cp_id) VALUES ('$u_id', '$shipmethod', '$shipaddress', '$p_method', '$r_name', '$cp_id')";
$result = mysqli_query($link, $sql2);
mysqli_close($link);

$data = [
	result => 0
];
echo json_encode($data);
