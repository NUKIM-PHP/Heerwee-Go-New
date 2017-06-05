<?php
require('../../connection.php');
header('Content-type: application/json');

$id = $_GET['id'];

	if(isset($_GET['id']) && $_GET['check']=='yes'){
		$sql2 = "DELETE FROM goods WHERE id = '$id'";
		mysqli_query($link, $sql2);
		mysqli_close($link);
		$data = [
			result => 0
		];
		echo json_encode($data);
	}else{
		$data = [
		result => -98,
		message => 'Invalid data.'
	];
		echo json_encode($data);
		exit();
	}
