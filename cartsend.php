<?php require_once('header.php'); ?>
<?php
	if (!isset($_SESSION["user"])) {
		header("Location:index.php");
	}
	$u_id = $_SESSION['user'];
	$link = mysqli_connect('nukim-php.noob.tw', 'nukim', 'goodtodrink', 'nukim_php_finalterm');
	mysqli_query($link, 'SET NAMES UTF8');
?>
<div class="content">
	<div class="cart-wrapper">
	<?php $total = 0; 
	$sql = "SELECT pic, num, price, name FROM cart, goods WHERE u_id = '$u_id' AND g_id = id";
	$result = mysqli_query($link, $sql);
	while ($row = mysqli_fetch_assoc($result)) { ?>
		<div class="product-cart">
			<img src="/img/<?php echo $row['pic']; ?>.jpg" alt="" class="product-cart-pic">
			<div class="product-cart-name"><?php echo $row["name"]; ?></div>
			<div class="product-cart-length"><?php echo $row["num"] ?></div>
			<div class="product-cart-price money"><?php echo $row["price"]*$row["num"]; ?></div>
			<?php $total += $row["price"]*$row["num"]; ?>
		</div>
	<?php }
	?>
		<div class="amount-wrapper">
			<div>折抵：<span id="discount" class="money">0</span>元</div>
			<div>金額：<span id="amount" class="money"><?= $total ?></span>元</div>
		</div>
		<div class="cart-buttons">
			<div class="button" id="button-back">繼續購物</div>
			<div class="button">前往結帳</div>
		</div>
	</div>
</div>
<?php require_once('footer.php'); ?>