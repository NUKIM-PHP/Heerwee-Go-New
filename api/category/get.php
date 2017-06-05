<?php
require('../../connection.php');
header('Content-type: application/json');

$id = $GET['id'];

$sql2 = "SELECT * FROM `goods` WHERE cat_id IN (select id from category where parent = 1)";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);

$data = [
	result => 0
];

echo json_encode($data);
