<?php
require('../../connection.php');
header('Content-type: application/json');

$name = $_POST['name'];
$price = $_POST['price'];
$cat_id = $_POST['cat_id'];
$invnum = $_POST['invnum'];

if(!isset($name) || !isset($price) || !isset($cat_id) || !isset($invnum)){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "INSERT INTO goods('name', 'price', 'cat_id', 'invnum') VALUES('$name', '$price', '$cat_id', 'invnum') ";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);

$data = [
	result => 0
];

echo json_encode($data);
