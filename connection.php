<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$link = mysqli_connect('nukim-php.noob.tw', 'nukim', 'goodtodrink', 'nukim_php_finalterm');
mysqli_query($link, 'SET NAMES UTF8');
