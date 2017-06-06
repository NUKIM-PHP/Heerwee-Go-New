<?php
require('../../connection.php');
header('Content-type: application/json');

$id = $_GET['id'];

if(!isset($id)){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "SELECT * FROM `goods` WHERE cat_id IN (select id from category where parent = '$id')";
$result = mysqli_query($link, $sql2);
$goods = [];
while($row = mysqli_fetch_assoc($result)){
	array_push($goods, $row);
}
mysqli_close($link);

if(count($goods)){
	$data = [
		result => 0,
		goods => $goods
	];
}else{
	$data = [
		result => -1,
		message => 'No goods in this category.'
	];
}

echo json_encode($data);
