<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	function api($path){
		return json_decode(file_get_contents('https://nukim-php.noob.tw/api' . $path));
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
			<div id="hi">嗨管理員，<a href="/">回首頁</a></div>
			<div class="clear"></div>
			<nav>
				<ul>
					<li><a href="products.php">產品管理</a></li>
					<li><a href="users.php">使用者管理</a></li>
					<li><a href="events.php">活動管理</a></li>
					<li><a href="invoices.php">訂單管理</a></li>
				</ul>
			</nav>
		</header>
		<div class="content">
			<form class="form" enctype="multipart/form-data" id="form-add-event">
				<div class="label">活動名稱</div>
				<input type="text" name="name">
				<div class="label">商品圖片</div>
				<input type="file" name="upload">
				<div class="label">活動分類</div>
				<select name="cat_id">
					<option value="1">WOMEN</option>
					<option value="2">MEN</option>
					<option value="3">KIDS</option>
					<option value="4">BABY</option>
					<option value="5">SPORTS</option>
					<option value="6">STYLE</option>
				</select>
				<div class="label">開始日期</div>
				<input type="date" name="startdate">
				<div class="label">截止日期</div>
				<input type="date" name="duedate">
				<input type="submit" value="新增活動" class="button">
			</form>
		</div>
	</div>
	<script src="https://unpkg.com/jquery"></script>
	<script src="js/all.js"></script>
</body>
</html>