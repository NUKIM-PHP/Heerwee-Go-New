<?php
require('../../connection.php');
header('Content-type: application/json');

$u_id = $_SESSION['user'];
$g_id = $_POST['g_id'];
$num = $_POST['num'];

u_id VALUES '$u_id';

$sql2 = "INSERT INTO goods('u_id', 'g_id', 'num') VALUES('$u_id', '$g_id', '$num')";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);

$data = [
	result => 0
];

header('Content-type: application/json');
echo json_encode($data);
