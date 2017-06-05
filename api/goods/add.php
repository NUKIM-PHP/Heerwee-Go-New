<?php
require('../../connection.php');
header('Content-type: application/json');

$name = $_POST['name'];
$price = $_POST['price'];
$cat_id = $_POST['cat_id'];


if(!isset($name) || !isset($price) || !isset($cat_id){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "INSERT * INTO goods('name', 'price', 'cat_id') VALUES('$name', '$price', '$cat_id') ";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);

$data = [
	result => 0
];

header('Content-type: application/json');
echo json_encode($data);
