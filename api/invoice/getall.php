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

$u_id= $_GET['u_id'];

$sql2 = "SELECT * FROM invoice WHERE u_id='$u_id'";
$result = mysqli_query($link, $sql2);
$invoices = [];
while($row = mysqli_fetch_assoc($result)){
	array_push($invoices, $row);
}
mysqli_close($link);

if(count($invoices)){
	$data = [
		result => 0,
		invoices => $invoices
	];
}else{
	$data = [
		result => -1,
		message => 'No invoices yet.'
	];
}

echo json_encode($data);