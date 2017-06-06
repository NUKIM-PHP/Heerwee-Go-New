<?php
require('../../connection.php');
header('Content-type: application/json');

$id= $_GET['id'];

$sql2 = "SELECT * FROM goods WHERE id='$id'";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);

if(isset($row)){
	$data = [
		result => 0,
		good => $row
	];
}else{
	$data = [
		result => -1,
		message => 'Goods not found'
	]
}


echo json_encode($data);