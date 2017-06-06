<?php
	function api($path){
		return json_decode(file_get_contents('http://nukim-php.noob.tw/api' . $path));
	}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://unpkg.com/normalize.css">
	<link rel="stylesheet" href="https://unpkg.com/animate.css">
	<link rel="stylesheet" href="https://unpkg.com/font-awesome.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosanstc.css">
	<link rel="stylesheet" href="css/style.css">
	<title>HeerWee Go</title>
</head>
<body>
	<div class="wrapper">
		<header>
			<h1><a href="/"><img src="img/logo.png" alt="" id="logo"></a></h1>
			<div class="user-wrapper">
				<div class="user">
					<a href="#" id="link-login">登入</a>
					<a href="/register.php" id="link-register">註冊</a>
				</div>
				<div class="search">
					<form action="search.php" method="get">
					<input type="text" id="search" name="s">
					<input type="submit" class="button" value="搜尋">
					</form>
				</div>
				<div class="clear"></div>
				<nav>
					<ul>
						<li><a href="/category.php?id=1">WOMEN</a></li>
						<li><a href="/category.php?id=2">MEN</a></li>
						<li><a href="/category.php?id=3">KIDS</a></li>
						<li><a href="/category.php?id=4">BABY</a></li>
						<li><a href="/category.php?id=5">SPORTS</a></li>
						<li><a href="/category.php?id=6">STYLE</a></li>
					</ul>
				</nav>
			</div>
			<div class="clear"></div>
		</header>