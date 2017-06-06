<?php require_once('header.php'); ?>
<?php
	$data = api('/cart/get.php');
	if($data->result != 0){
		//header('location: /');
		//exit();
	}
?>
		<div class="content">
			<div class="cart-wrapper">
				<?php foreach ($data['cart'] as $good): ?>
				<div class="product-cart">
					<img src="/img/<?= $good->pic ?>.jpg" alt="" class="product-cart-pic">
					<div class="product-cart-name"><?= $good->name ?></div>
					<div class="product-cart-length"><?= $good->num ?></div>
					<div class="product-cart-price money"><?= $good->price ?></div>
				</div>
				<?php endforeach;?>
				<div class="amount-wrapper">
					<div>折抵：<span id="discount" class="money">4252</span>元</div>
					<div>金額：<span id="amount" class="money">4252</span>元</div>
				</div>
				<div class="cart-buttons">
					<div class="button">繼續購物</div>
					<div class="button">前往結帳</div>
				</div>
			</div>
		</div>
<?php require_once('footer.php'); ?>