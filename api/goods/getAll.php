<?php
require('../../connection.php');
header('Content-type: application/json');

$sql2 = "SELECT * FROM `goods`";
$result = mysqli_query($link, $sql2);
$goods = [];
while($row = mysqli_fetch_assoc($result)){
	array_push($goods, $row);
}
mysqli_close($link);

if(count($goods)){
	$data = [
		result => 0,
		goods => $goods
	];
}else{
	$data = [
		result => -1,
		message => 'No goods yet.'
	];
}

echo json_encode($data);
