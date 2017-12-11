<?php
	session_start();
	if (empty($_SESSION['id']) || $_SESSION['role'] < 2)
	{
		header("Location:login.php");
		exit();
	}

	require('header.php');
?>
	
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Главная</a></li>
					<li class="active">Корзина</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-ckeckout-->
	<div class="ckeckout">
		<!--cart update-->
		<script>
			$(document).ready(function(c) {
				//updateCart();
			});
		</script>
		<div class="container">
			<div class="ckeck-top heading">
				<h2>Проверка заказа</h2>
			</div>
			<div class="ckeckout-top">
				<div class="cart-items">
					<h3>Моя корзина (<span class="cart-items-count">0</span>)</h3>			
					<div id="cart-list" class="in-check" >
						<ul class="unit">
							<li><span>Товар</span></li>
							<li><span>Наименование товара</span></li>		
							<li><span>Цена</span></li>
							<li><span>Доставка</span></li>
							<li> </li>
							<div class="clearfix"> </div>
						</ul>
					</div>
				</div>  
			</div>
			<div class="ckeckout-bottom">
				<a class="cart-order" href="cart_commit.php">Заказать</a>
			</div>
		</div>
	</div>
	<!--end-ckeckout-->

<?php
	require('footer.php');
?>
