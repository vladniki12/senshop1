<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ювелирные изделия</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
	<script src="js/jquery-1.11.0.min.js"></script>
	<!--Custom-Theme-files-->
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--start-menu-->
	<script src="js/jewelCart.js"> </script>
	<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/memenu.js"></script>
	<script>$(document).ready(function(){$(".memenu").memenu(); updateCart();});</script>	
	<!--dropdown-->
	<script src="js/jquery.easydropdown.js"></script>
	<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu_drop > li > ul'),
	           menu_a  = $('.menu_drop > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>
</head>
<body>
	<div id="page-loader" style="display:none;">
		<div id="page-loader-back"></div>
		<div id="page-loader-spinner"></div>
	</div>
	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left"></div>
				<div class="col-md-6 top-header-left">
					<?php
						// Check session id
						if (empty($_SESSION['id']))
						{
							echo "<div class='cart box_1'>
									<p style='color: #fff;'>Вы вошли на сайт, как гость</p>
									<p><a style='color: #fff; float: right; text-decoration:underline;' href='login.php'>Войти</a></p>
								</div>";
						}
						else
						{
							if ($_SESSION['role'] == '0')
							{
								echo "<div class='cart box_1'>
									<p style='color: #fff;'>Вы администратор</p>
									<p><a style='color: #fff; float: right; text-decoration:underline;' href='admin/index.php'>Панель управления</a></p>
									<p><a style='color: #fff; float: right; text-decoration:underline;' href='unauth.php'>Выход</a></p>
								</div>";
							}
							else
							{
								echo "<div class='cart box_1'>
										<a href='cart.php' style='float: right;'>
											<div class='total'>
												<span class='jewelCart_total'>0.0</span>
											</div>
											<img src='images/cart-1.png' alt='' />
										</a>
										<p><a href='javascript:;' class='simpleCart_empty'>Корзина пуста</a></p>
										<p><a href='unauth.php' class='simpleCart_empty' style='float: right;'>Выход</a></p>
										<div class='clearfix'> </div>
									</div>";
							}
						}
					?>
					
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->

	<!--start-logo-->
	<div class="logo">
		<a href="index.php"><h1>Ювелирные изделия</h1></a>
	</div>
	<!--start-logo-->

	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue">
						<li class="active">
							<a href="index.php">Главная</a>
						</li>
						<li class="grid">
							<a href="products.php">Каталог</a>
						</li>
						<li class="grid">
							<a href="products.php?id=1">Кольца</a>
						</li>
						<li class="grid">
							<a href="products.php?id=2">Серьги</a>
						</li>
						<li class="grid">
							<a href="products.php?id=3">Подвески</a>
						</li>
						<li class="grid">
							<a href="products.php?id=4">Цепи</a>
						</li>
						<li class="grid">
							<a href="products.php?id=5">Свадьба</a>
						</li>
						<li class="grid">
							<a href="contact.php">Контакты</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--bottom-header-->
