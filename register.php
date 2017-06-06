<?php require_once('header.php'); ?>
		<div class="content">
			<h2>加入 HeerWee Go</h2>
			<form id="register-form" class="form">
				<div class="label">姓名</div>
				<input type="text" name="name">
				<div class="label">性別</div>
				<input type="radio" name="gender" value="F"> 男
				<input type="radio" name="gender" value="M"> 女
				<div class="label">帳號</div>
				<input type="text" name="user">
				<div class="label">密碼</div>
				<input type="password" name="pass">
				<div class="label">確認密碼 <div id="wrong-confirm-pass">確認密碼不一致</div></div>
				<input type="password" name="confirm_pass">
				<div class="label">聯絡電話</div>
				<input type="tel" name="tel">
				<div class="label">電子信箱</div>
				<input type="email" name="email">
				<div class="button">馬上註冊！</div>
			</form>
		</div>
<?php require_once('footer.php'); ?>