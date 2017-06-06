<?php
require('../../connection.php');
header('Content-type: application/json');

$name = $_POST['name'];
$cat_id = $_POST['cat_id'];
$startdate = $_POST['startdate'];
$duedate = $_POST['duedate'];
$pic = $_FILES['upload'];

if(
	!isset($name) || 
	!isset($cat_id) || 
	!isset($startdate) || 
	!isset($duedate) || 
	!isset($pic)
){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}

$name = pathinfo($pic['name']);
$t = time();
move_uploaded_file($pic['tmp_name'], '../../images/' . $t . $name . '.' . $name['extension']);
$pic = $t . $name . '.' . $name['extension'];

$sql2 = "INSERT INTO event ('name', 'cat_id', 'pic', 'startdate', 'duedate') VALUES('$name', '$cat_id', '$pic', '$startdate', '$duedate')";
$result = mysqli_query($link, $sql2);
mysqli_close($link);

$data = [
	result => 0
];

header('Content-type: application/json');
echo json_encode($data);
