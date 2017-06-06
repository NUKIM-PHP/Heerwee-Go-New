<?php
require('../../connection.php');
header('Content-type: application/json');

$s = $_POST['s'];

$sql2 = "SELECT * FROM goods WHERE name LIKE '%$s%'";;
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
		message => 'No search results.'
	];
}

echo json_encode($data);
