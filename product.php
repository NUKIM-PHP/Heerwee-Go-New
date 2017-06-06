<?php require_once('header.php'); ?>
<?php
	$id = $_GET['id'];
	$data = api("/goods/get.php?id=$id");
	if($data->result != 0){
		header('location: /');
		exit();
	}
?>
		<div class="content" id="product">
			<h2 class="product-name"><?= $data->good->name ?></h2>
			<img src="/img/<?= $data->good->pic ?>.jpg" alt="" class="product-img">
			<div class="product-meta">
				<div class="product-desc"><?= $data->good->desc ?></div>
				<div class="product-price money"><?= $data->good->price ?></div>
				<div class="product-length">數量<input type="number" id="product-length"><span class="button" id="addtocart">加入購物車</span></div>
			</div>
		</div>
<?php require_once('footer.php'); ?>