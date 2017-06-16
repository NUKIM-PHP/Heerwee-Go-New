<?php require_once('header.php'); ?>
<?php
	if (!isset($_SESSION["user"])) {
		header("Location:index.php");
	}
	$u_id = $_SESSION['user'];
	$link = mysqli_connect('nukim-php.noob.tw', 'nukim', 'goodtodrink', 'nukim_php_finalterm');
	mysqli_query($link, 'SET NAMES UTF8');

	if(isset($_POST["u_id"]))
	{
		if(isset($_POST["shipmethod"]) && isset($_POST["shipaddress"]) && isset($_POST["p_method"]) && isset($_POST["r_name"]) && isset($_POST["totalamount"]))	
		{
			$sql = "INSERT INTO invoice(shipaddress,shipmethod,u_id, r_name,p_method,totalamount) VALUES ('$_POST[shipaddress]','$_POST[shipmethod]','$_POST[u_id]','$_POST[r_name]','$_POST[p_method]','$_POST[totalamount]')";
			$result = mysqli_query($link,$sql);
			$i_id = mysqli_insert_id($link);
			$u_id = $_POST["u_id"];
			$sql = "SELECT g_id, num FROM cart, goods WHERE u_id = '$u_id' AND g_id = id";
			$result = mysqli_query($link, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$sql2 = "INSERT INTO detail(i_id,g_id,quantity) VALUES ('$i_id', '$row[g_id]','$row[num]')";
				$result2 = mysqli_query($link,$sql2);
			}		
			$sql = "DELETE FROM cart WHERE u_id = '$u_id'";
			$result = mysqli_query($link,$sql);
			echo "<script>alert('購買成功');location.href='index.php'</script>";
		}
		else
			echo "<script>alert('請填寫完整');</script>";
	}
?>
<div class="content">
	<div class="pay">
		<?php
			$sql = "SELECT pic, num, price, name FROM cart, goods WHERE u_id = '$u_id' AND g_id = id";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
		?>
		<form action="pay.php" method="post" name="payy">
		<?php
			echo "<input type='hidden' name='u_id' value='$u_id'>";
			echo "<input type='hidden' name='totalamount' value='$row[price]*$row[num]'>";
		?>
		<p>帳單資料填寫</p>
		<p>收件人：<input type="text" name="r_name"></p>
		<p>寄件方式：<select name="shipmethod">
						<option value="null">選擇</option>
						<option value="familymart">全家取貨付款</option>
						<option value="home">宅配到府</option>
					</select></p>
		<p>寄件地址：<input type="text" name="shipaddress"></p>
		<p>付款方式：<select name="p_method">
						<option value="null">選擇</option>
						<option value="card">信用卡</option>
						<option value=""></option>
					</select></p>
		<input type="submit" name="go" value="確認付款">
	</form>
	</div>
</div>

<?php
	
?>