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

$u_id = $_SESSION['user'];

$sql2 = "SELECT * FROM cart WHERE u_id='$u_id'";
$result = mysqli_query($link, $sql2);
$cart = [];
while($row = mysqli_fetch_assoc($result)){
	array_push($cart, $row);
}
mysqli_close($link);

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
