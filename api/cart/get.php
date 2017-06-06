<?php
require('../../connection.php');
header('Content-type: application/json');

$u_id = $_SESSION['user'];

if(!isset($_SESSION['user'])){
	$data = [
		result => -99,
		message => 'Need to login.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "SELECT * FROM cart WHERE u_id='$u_id'";
$result = mysqli_query($link, $sql2);
$condition = '';
$num = [];
while($row = mysqli_fetch_assoc($result)){
	$condition .= ' id = ' . $row['g_id'] . ' OR ';
	array_push($num, $row['num']);
}
$condition .= '0';

$sql2 = "SELECT * FROM goods WHERE $condition";
$result = mysqli_query($link, $sql2);
$cart = [];
$i = 0 ;
var_dump($num);
while($row = mysqli_fetch_assoc($result)){
	$row->num = $num[$i++];
	array_push($cart, $row);
}


if(count($cart)){
	$data = [
		result => 0,
		cart => $cart
	];
}else{
	$data = [
		result => -1,
		message => 'The cart is empty.'
	];
}

echo json_encode($data);
