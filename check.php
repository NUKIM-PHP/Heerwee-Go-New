<?php require_once('header.php'); ?>
		<div class="content">
			<h2>完成訂單</h2>
			<form id="register-form" class="form">
				<div class="label">收件人姓名</div>
				<input type="text" name="r_name">
				<div class="label">收件地址</div>
				<input type="text" name="shipaddress">
				<div class="label">付款方式</div>
				<input type="radio" name="p_method" value="card"> 信用卡
				<input type="radio" name="p_method" value="paylater"> 貨到付款
				<input type="radio" name="p_method" value="bankdeposit"> 銀行轉帳
				<div class="label">運送方式</div>
				<input type="radio" name="shipmethod" value="home"> 宅配到府
				<input type="radio" name="shipmethod" value="seveneleven"> 7-ELEVEn 取貨
				<input type="radio" name="shipmethod" value="familymart"> 全家取貨
				<div class="button">完成訂購！</div>
			</form>
		</div>
<?php require_once('footer.php'); ?>