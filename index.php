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
				<img id="events" src="img/event_1.png"></div>
				<?php
				$e1 = $data->events[0]->pic;
				$e2 = $data->events[1]->pic;
				$e3 = $data->events[2]->pic;
				$e4 = $data->events[3]->pic;
				echo "<script>var jsImg = ['img/$e1', 'img/$e2', 'img/$e3', 'img/$e4'];</script>";
				?>
			</div>
			<div class="products-home">
				<div class="products-home-container">
					<div class="product-home product animated fadeIn" id="product-home-1">
						<img src="img/product1.jpg" alt="">
					</div>
					<div class="product-home product animated fadeIn" id="product-home-2">
						<img src="img/product3.jpg" alt="">
					</div>
				</div>
				<div class="products-home-container">
					<div class="product-home product animated fadeIn" id="product-home-3">
						<img src="img/product2.jpg" alt="">
					</div>
					<div class="product-home product animated fadeIn" id="product-home-4">
						<img src="img/product4.jpg" alt="">
					</div>
				</div>
			</div>
			<div class="series-container">
				<div class="series product animated fadeIn">
					<img src="img/series_1.jpg" alt="">
				</div>
				<div class="series product animated fadeIn">
					<img src="img/series_2.jpg" alt="">
				</div>
				<div class="series product animated fadeIn">
					<img src="img/series_3.jpg" alt="">
				</div>
				<div class="series product animated fadeIn">
					<img src="img/series_4.jpg" alt="">
				</div>
			</div>
		</div>
<?php require_once('footer.php'); ?>