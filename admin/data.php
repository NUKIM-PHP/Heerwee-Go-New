<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	function api($path){
		return json_decode(file_get_contents('https://nukim-php.noob.tw/api' . $path));
	}
	$data = api('/user/getAll.php');
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
					<li><a href="data.php">分析整理</a></li>
				</ul>
			</nav>
		</header>
		<div class="content">
			<ul>
				<li>賣最好的商品</li>
				<?php
					$link = mysqli_connect('nukim-php.noob.tw', 'nukim', 'goodtodrink', 'nukim_php_finalterm');
					$i = 1;
					$sql = "SELECT g_id, SUM(quantity),name FROM detail,goods WHERE detail.g_id = goods.id GROUP BY g_id ORDER BY SUM(quantity) DESC LIMIT 3 ";

					$result = mysqli_query($link,$sql);
					while ($row = mysqli_fetch_assoc($result)) { ?>
						<li><?php echo $i; ?>.<?php echo $row["name"]; ?></li>	
						<?php $i++; ?>
 				<?php }
				?>
			</ul>
			<ul>
				<li>我們的乾爹</li>
				<?php
					$i = 1;
					$sql = "SELECT u_id, SUM(totalamount),name FROM user ,invoice WHERE invoice.u_id = user.id GROUP BY u_id ORDER BY SUM(totalamount) DESC LIMIT 3";
					$result = mysqli_query($link, $sql);
					while ($row = mysqli_fetch_assoc($result)) { ?>
						<li><?php echo $i; ?>.<?php echo $row["name"]; ?></li>
						<?php $i++; ?>
				<?php }
				?>
			</ul>
			<ul>
				<li>最多人使用的運送方式</li>
				<?php
					$i = 1;
					$sql = "SELECT shipmethod, COUNT(shipmethod) FROM `invoice` GROUP BY shipmethod ORDER BY COUNT(shipmethod) DESC ";
					$result = mysqli_query($link, $sql);
					while ($row = mysqli_fetch_assoc($result)) { ?>
						<li><?php echo $i; ?>.<?php echo $row["shipmethod"]; ?></li>
						<?php $i++; ?>
				<?php }
				?>
			</ul>
		</div>