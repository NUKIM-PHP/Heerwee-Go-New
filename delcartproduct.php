<?php require_once('header.php'); ?>
<?php
	if (!isset($_SESSION["user"])) {
		header("Location:index.php");
	}
	$u_id = $_SESSION['user'];
	$link = mysqli_connect('nukim-php.noob.tw', 'nukim', 'goodtodrink', 'nukim_php_finalterm');
	mysqli_query($link, 'SET NAMES UTF8');

	$g_id = $_GET["g_id"];
	$sql = "DELETE FROM cart WHERE g_id='$g_id'";
	$result = mysqli_query($link, $sql);
	echo "<script>alert('刪除成功');location.href='cart.php';</script>";
?>