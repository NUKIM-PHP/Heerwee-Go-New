<?php require_once('header.php'); ?>
<?php
	$s = $_GET['s'];
	$data = api("/goods/search.php?s=$s");
	if($data->result != 0){
		header('location: /');
		exit();
	}
?>
		<div class="content">
			<?php foreach ($data->goods as $good): ?>
			<div class="product-catalog product" data-gid="<?= $good->id?>">
				<img src="/img/<?= $good->pic ?>.jpg" alt="">
				<div class="product-name"><?= $good->name?></div>
				<div class="product-price"><?= $good->price?></div>
			</div>
			<?php endforeach;?>
		</div>
		<div class="login-wrapper">
			<div class="login-box">
				<h2>會員登入</h2>
				<input type="text" id="login-user" placeholder="帳號">
				<input type="password" id="login-pass" placeholder="密碼">
				<div class="button">登入</div>
			</div>
		</div>
<?php require_once('footer.php'); ?>