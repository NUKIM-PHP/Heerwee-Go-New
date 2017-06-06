<?php require_once('header.php'); ?>
<?php
	$id = $_GET['id'];
	$data = api("/category/get.php?id=$id");
	if($data->result != 0){
		header('location: /');
		exit();
	}
?>
		<div class="content">
			<div class="content">
				<?php foreach ($data->goods as $good): ?>
				<div class="product-catalog product animated fadeIn" data-gid="<?= $good->id?>">
					<img src="/img/<?= $good->pic ?>.jpg" alt="">
					<div class="product-name"><?= $good->name?></div>
					<div class="product-price"><?= $good->price?></div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
<?php require_once('footer.php'); ?>