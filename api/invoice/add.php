<?php
require('../../connection.php');
header('Content-type: application/json');

$u_id = $_POST['u_id'];
$shipmethod = $_POST['shipmethod'];
$shipaddress = $_POST['shipaddress'];
$p_method = $_POST['p_method'];
$r_name = $_POST['r_name'];
$cp_id = $_POST['cp_id'];

$p_time = $_POST['p_time']; //時間

if(
	!isset($u_id) ||
	!isset($shipmethod) ||
	!isset($shipaddress) ||
	!isset($p_method) ||
	!isset($r_name)
){
	$data = [
		result => -98,
		message => 'Invalid data.'
	];
	echo json_encode($data);
	exit();
}

$sql2 = "INSERT INTO invoice (u_id, shipmethod, shipaddress, p_method, r_name, cp_id) VALUES ('$u_id', '$shipmethod', '$shipaddress', '$p_method', '$r_name', '$cp_id')";
$result = mysqli_query($link, $sql2);
mysqli_close($link);

$i_id = "SELECT id FROM invoice WHERE u_id=$u_id limit 1 ORDER by id DESC";
$total = 0;

$sql2 = "SELECT * FROM cart WHERE u_id=$u_id";
$result = mysqli_query($link, $sql2);
mysqli_close($link);

while ($row = mysql_fetch_assoc($result)) {
	$g_id = $row["g_id"];
	$quantity = $row["num"];
	$price = "SELECT price FROM goods WHERE id=$g_id";
	$result2 = mysqli_query($link, $price);
	$row2 = mysqli_fetch_assoc($result2);
    $sql2 = "INSERT INTO detail ('g_id', 'i_id', 'quantity') VALUES('$g_id', '$i_id', '$quantity')";
	mysqli_query($link, $sql2);
    $total += $row2["price"]*$row["num"];
}

$sql2 = "UPDATE invoice WHERE i_id=$i_id SET totalamount='$total'";
$result = mysqli_query($link, $sql2);
mysqli_close($link);

$data = [
	result => 0
];
echo json_encode($data);
