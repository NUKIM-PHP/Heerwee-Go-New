<?php
require('../../connection.php');
header('Content-type: application/json');

$name = $_POST['name'];
$price = $_POST['price'];
$cat_id = $_POST['cat_id'];
$invnum = $_POST['invnum'];
$desc = $_POST['desc'];

if(
	!isset($name) || 
	!isset($price) || 
	!isset($cat_id) || 
	!isset($invnum) ||
	!isset($desc)
){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "INSERT INTO goods(name, price, cat_id, invnum, 'desc') VALUES ('$name', '$price', '$cat_id', '$invnum', '$desc') ";
$result = mysqli_query($link, $sql2);
mysqli_close($link);

$data = [
	result => 0
];

echo json_encode($data);
