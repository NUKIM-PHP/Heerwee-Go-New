<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
$link = mysqli_connect('nukim-php.noob.tw', 'nukim', 'goodtodrink', 'nukim_php_finalterm');
mysqli_query($link, 'SET NAMES UTF8');
