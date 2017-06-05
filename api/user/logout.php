<?php
session_start();
session_destroy();
header('Content-type: application/json');

$data = [
	result => 0
];

echo json_encode($data);
