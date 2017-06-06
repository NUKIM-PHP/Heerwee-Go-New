<?php
require('../../connection.php');
header('Content-type: application/json');

$uid = $_POST['uid'];
$shipmethod = $_POST['shipmethod'];
$shipaddress = $_POST['shipaddress'];
$p_method = $_POST['p_method'];
$rname = $_POST['rname'];
$cp_id = $_POST['cp_id'];

$p_time = $_POST['p_time']; //時間

if(
	!isset($uid) ||
	!isset($shipmethod) ||
	!isset($shipaddress) ||
	!isset($p_method) ||
	!isset($rname)
){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "INSERT INTO invoice (uid, shipmethod, shipaddress, p_method, rname, cp_id) VALUES ('$uid', '$shipmethod', '$shipaddress', '$p_method', '$rname', '$cp_id')";
$result = mysqli_query($link, $sql2);
mysqli_close($link);

$data = [
	result => 0
];
echo json_encode($data);
