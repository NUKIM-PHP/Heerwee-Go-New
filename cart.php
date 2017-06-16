<?php require_once('header.php'); ?>
<?php
	if (!isset($_SESSION["user"])) {
		header("Location:index.php");
	}
	$u_id = $_SESSION['user'];
	$link = mysqli_connect('nukim-php.noob.tw', 'nukim', 'goodtodrink', 'nukim_php_finalterm');
	mysqli_query($link, 'SET NAMES UTF8');

	if (isset($_GET['g_id'])) {
		$g_id = $_GET["g_id"];
		$num = $_GET["num"];
		if ($num < 1) {
			$sql2 = "DELETE FROM cart WHERE g_id = '$g_id'";
			$result2 = mysqli_query($link,$sql2);
			echo "<script>location.href='cart.php';</script>";
		}else{
			$sql2 = "UPDATE cart SET num = $num WHERE g_id = '$g_id' AND u_id = '$u_id'";
			$result2 = mysqli_query($link,$sql2);
			echo "<script>alert($num);location.href='cart.php';</script>";
		}
		
	}
?>
<div class="content">
	<div class="cart-wrapper">
	<?php $total = 0; 
	$sql = "SELECT g_id, pic, num, price, name FROM cart, goods WHERE u_id = '$u_id' AND g_id = id";
	$result = mysqli_query($link, $sql);
	while ($row = mysqli_fetch_assoc($result)) { ?>
		<form action="cart.php" method="get">
		<div class="product-cart">
			<?php $g_id = $row['g_id']; ?>
			<?php echo "<input type='hidden' name='g_id' value=$g_id>"; ?>
			<img src="/img/<?php echo $row['pic']; ?>.jpg" alt="" class="product-cart-pic">
			<div class="product-cart-name"><?php echo $row["name"]; ?></div>
			<div class="product-cart-length"><?php echo "<input type='number' name='num' value='$row[num]' style='width:30px;'>"; ?></div>
			<div class="product-cart-price money"><?php echo $row["price"]*$row["num"]; ?></div>
			<?php $total += $row["price"]*$row["num"]; ?>
			<?php echo "<input type='submit' value='修改數量'>"; ?>
			<?php echo "<a href=delcartproduct.php?&g_id=$g_id>刪除商品</a>"; ?>
		</div>
		</form>
	<?php }
	?>
		<div class="amount-wrapper">
			<div>折抵：<span id="discount" class="money">0</span>元</div>
			<div>金額：<span id="amount" class="money"><?= $total ?></span>元</div>
		</div>
		<div class="cart-buttons">
			<div class="button" id="button-back">繼續購物</div>
			<div class="button" id="pay">前往結帳</div>
		</div>
	</div>
</div>
<?php require_once('footer.php'); ?>