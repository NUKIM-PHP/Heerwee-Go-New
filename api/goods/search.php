<?php
require('../../connection.php');
header('Content-type: application/json');

$s = $_POST['s'];

$sql2 = "SELECT * FROM goods WHERE name LIKE '%$s%'";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);

$data = [
	result => 0
];

echo json_encode($data);
