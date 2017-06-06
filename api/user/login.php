<?php
require('../../connection.php');
header('Content-type: application/json');

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql2 = "SELECT * FROM user WHERE user='$user' AND pass='$pass'";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);
mysqli_close($link);

if(isset($row)){
	$data = [
		result => 0
	];
	$_SESSION['user'] = $row['id'];
	$_SESSION['username'] = $row['name'];
	if($row['isAdmin'] == '1') $_SESSION['admin'] = 1;
}else{
	$data = [
		result => -1,
		message => 'Wrong username or password.'
	];
}
echo json_encode($data);
