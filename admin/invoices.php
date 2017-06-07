<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	function api($path){
		return json_decode(file_get_contents('https://nukim-php.noob.tw/api' . $path));
	}
	$data = api('/invoice/getAllAdmin.php');
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
			<a href="#" id="delete-product">刪除</a>
			<table>
				<thead>
					<tr>
						<td></td>
						<td>編號</td>
						<td>買家</td>
						<td>運送方式</td>
						<td>運送地址</td>
						<td>收件人姓名</td>
						<td>總金額</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data->invoices as $invoice): ?>
					<tr>
						<td><input type="checkbox" data-id="<?= $invoice->id;?>"></td>
						<td><?= $invoice->id; ?></td>
						<td><?= api('/user/get.php?id='.$invoice->u_id)->user->name; ?></td>
						<td><?php
						switch($invoice->shipmethod){
							case 'home':
								echo '宅配到府';
								break;
							case 'seveneleven':
								echo '7-ELEVEn取貨';
								break;
							case 'familymart':
								echo '全家取貨';
						}?></td>
						<td><?= $invoice->shipaddress; ?></td>
						<td><?= $invoice->r_name; ?></td>
						<td><?= $invoice->totalamount; ?></td>
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