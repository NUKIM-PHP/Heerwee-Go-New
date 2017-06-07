<?php
require('../../connection.php');
header('Content-type: application/json');

$u_id = $_SESSION['user'] || $_GET['u_id'];

if(!isset($u_id)){
	$data = [
		result => -99,
		message => 'Need to login.',
		session => $_SESSION
	];
	echo json_encode($data);
	exit();
}

$sql2 = "SELECT * FROM cart WHERE u_id='$u_id'";
$result = mysqli_query($link, $sql2);
while($row = mysqli_fetch_assoc($result)){
	$g_id = $row['g_id'];
	$sql2 = "SELECT * FROM goods WHERE g_id = '$g_id'";
	$result2 = mysqli_query($link, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	$row2['num'] = $row['num'];
	array_push($cart, $row2);
}
// $condition = '';
// $num = [];
// while($row = mysqli_fetch_assoc($result)){
// 	$condition .= ' id = ' . $row['g_id'] . ' OR ';
// 	array_push($num, $row['num']);
// }
// $condition .= '0';

// $sql2 = "SELECT * FROM goods WHERE $condition";
// $result = mysqli_query($link, $sql2);
// $cart = [];
// $i = 0 ;
// while($row = mysqli_fetch_assoc($result)){
// 	$row['num'] = $num[$i++];
// 	array_push($cart, $row);
// }


if(count($cart)){
	$data = [
		result => 0,
		carts => $cart
	];
}else{
	$data = [
		result => -1,
		message => 'The cart is empty.'
	];
}

echo json_encode($data);
