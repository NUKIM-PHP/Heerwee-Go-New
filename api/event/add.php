<?php
require('../../connection.php');
header('Content-type: application/json');

$name = $_POST['name'];
$des = $_POST['des'];
$cat_id = $_POST['cat_id'];


if(!isset($name) || !isset($des) || !isset($cat_id)){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "INSERT INTO goods('name', 'des', 'cat_id') VALUES('$name', '$des', '$cat_id') ";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);

$data = [
	result => 0
];

header('Content-type: application/json');
echo json_encode($data);
