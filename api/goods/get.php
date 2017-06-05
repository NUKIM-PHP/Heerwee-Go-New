<?php
require('../../connection.php');
header('Content-type: application/json');

$id= $_GET['id'];

$sql2 = "SELECT * FROM goods WHERE id='$id'";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);

$data = [
	result => 0
];

echo json_encode($data);