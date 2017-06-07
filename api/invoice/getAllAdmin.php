<?php
require('../../connection.php');
header('Content-type: application/json');

$sql2 = "SELECT * FROM invoice";
$result = mysqli_query($link, $sql2);
$invoices = [];
while($row = mysqli_fetch_assoc($result)){
	array_push($invoices, $row);
}
mysqli_close($link);

if(count($invoices)){
	$data = [
		result => 0,
		invoices => $invoices
	];
}else{
	$data = [
		result => -1,
		message => 'No invoices.'
	];
}
echo json_encode($data);
