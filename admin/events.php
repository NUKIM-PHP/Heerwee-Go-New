<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	function api($path){
		return json_decode(file_get_contents('https://nukim-php.noob.tw/api' . $path));
	}
	$data = api('/event/getAll.php');
	if($data->result != 0){
		header('location: /');
		exit();
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
			<a href="event-new.php">新增活動</a>
			<a href="#" id="delete-event">刪除</a>
			<table>
				<thead>
					<tr>
						<td></td>
						<td>名稱</td>
						<td>圖片網址</td>
						<td>活動分類</td>
						<td>開始日期</td>
						<td>截止日期</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data->events as $event): ?>
					<tr>
						<td><input type="checkbox" data-id="<?= $event->id;?>"></td>
						<td><?= $event->name ;?></td>
						<td><?= $event->pic ;?></td>
						<td><?= $event->cat_id ;?></td>
						<td><?= $event->startdate ;?></td>
						<td><?= $event->duedate ;?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<script src="https://unpkg.com/jquery"></script>
	<script src="js/all.js"></script>
</body>
</html>