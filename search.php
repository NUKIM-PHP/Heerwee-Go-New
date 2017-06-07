<?php require_once('header.php'); ?>
<?php
	$s = $_GET['s'];
	$data = api("/goods/search.php?s=$s");
	if($data->result != 0 && $data->result != -1){
		header('location: /');
		exit();
	}
?>
		<div class="content">
			<?php if($data->result == -1){
				echo '<h2>沒有關於' . $s . '的搜尋結果';
			}else{
			foreach ($data->goods as $good): ?>
			<a href="/product.php?id=<?= $good->id; ?>">
				<div class="product-catalog product animated fadeIn" data-gid="<?= $good->id?>">
					<img src="/img/<?= $good->pic ?>.jpg" alt="">
					<div class="product-name"><?= $good->name?></div>
					<div class="product-price"><?= $good->price?></div>
				</div>
			</a>
			<?php endforeach;
			}
			?>
		</div>
<?php require_once('footer.php'); ?>