<?php require_once('header.php'); ?>
<?php
	$data = api("/event/get.php");
	if($data->result != 0){
		header('location: /');
		exit();
	}
?>
		<div class="content">
			<div class="slider">
				<?php
				$e1 = $data->events[0]->pic;
				$e2 = $data->events[1]->pic;
				$e3 = $data->events[2]->pic;
				$e4 = $data->events[3]->pic;
				$l1 = '/category.php?id=' . $data->events[0]->cat_id;
				$l2 = '/category.php?id=' . $data->events[1]->cat_id;
				$l3 = '/category.php?id=' . $data->events[2]->cat_id;
				$l4 = '/category.php?id=' . $data->events[3]->cat_id;
				echo '<a href="'.$l1.'"><img id="events" src="img/' . $e1 . '"></a>';
				echo "<script>var jsImg = ['img/$e1', 'img/$e2', 'img/$e3', 'img/$e4'];</script>";
				echo "<script>var jsLink = ['$l1', '$l2', '$l3', '$l4']</script>";
				?>
			</div>
			<div class="products-home">
				<div class="products-home-container">
					<div class="product-home product animated fadeIn" id="product-home-1">
						<a href="/product.php?id=2"><img src="img/product1.jpg" alt=""></a>
					</div>
					<div class="product-home product animated fadeIn" id="product-home-2">
						<a href="/product.php?id=1"><img src="img/product3.jpg" alt=""></a>
					</div>
				</div>
				<div class="products-home-container">
					<div class="product-home product animated fadeIn" id="product-home-3">
						<a href="/product.php?id=14"><img src="img/product2.jpg" alt=""></a>
					</div>
					<div class="product-home product animated fadeIn" id="product-home-4">
						<a href="/product.php?id=18"><img src="img/product4.jpg" alt=""></a>
					</div>
				</div>
			</div>
			<div class="series-container">
				<div class="series product animated fadeIn">
					<a href="/product.php?id=21"><img src="img/series_1.jpg" alt=""></a>
				</div>
				<div class="series product animated fadeIn">
					<a href="/product.php?id=24"><img src="img/series_2.jpg" alt=""></a>
				</div>
				<div class="series product animated fadeIn">
					<a href="/product.php?id=23"><img src="img/series_3.jpg" alt=""></a>
				</div>
				<div class="series product animated fadeIn">
					<a href="/product.php?id=10"><img src="img/series_4.jpg" alt=""></a>
				</div>
			</div>
		</div>
<?php require_once('footer.php'); ?>