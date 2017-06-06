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

$user = $_POST['user'];
$pass = $_POST['pass'];
$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$address = $_POST['address'];
$gender = $_POST['gender'];

if(
	!isset($user) ||
	!isset($pass) ||
	!isset($name) ||
	!isset($tel) ||
	!isset($email) ||
	!isset($address) ||
	!isset($gender)
){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "UPDATE user SET user = '$user', pass = '$pass', name = '$name', tel = '$tel', email = '$email', address = '$address', gender = '$gender'";
$result = mysqli_query($link, $sql2);
mysqli_close($link);

$data = [
	result => 0
];
echo json_encode($data);
