<?php
session_start();
$link = mysqli_connect('php-nukim.noob.tw', 'nukim', 'goodtodrink', 'nukim_php_finalterm');
mysqli_query($link, 'SET NAMES UTF8');
