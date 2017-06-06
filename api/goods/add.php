<?php
require('../../connection.php');
header('Content-type: application/json');

$name = $_POST['name'];
$price = $_POST['price'];
$cat_id = $_POST['cat_id'];
$invnum = $_POST['invnum'];
$desc = $_POST['desc'];
$pic = $_FILES['upload'];

if(
	!isset($name) ||
	!isset($price) ||
	!isset($cat_id) ||
	!isset($invnum) ||
	!isset($desc) ||
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
move_uploaded_file($pic['tmp_name'], '../../images/' . $t . $name . '.jpg');
$pic = $t . $name . '.jpg';

$sql2 = "INSERT INTO goods(name, price, cat_id, invnum, 'desc') VALUES ('$name', '$price', '$cat_id', '$invnum', '$desc') ";
echo $sql2;
$result = mysqli_query($link, $sql2);
mysqli_close($link);

$data = [
	result => 0
];

echo json_encode($data);
