<?php
	session_start();
	if (empty($_SESSION['id']) || $_SESSION['role'] < 2)
	{
		header("Location:login.php");
		exit();
	}

	require('header.php');
	
	// Connect to db
    include ("bd.php");
 
	$user_id = $_SESSION['id'];
	$result = mysqli_query($db, "SELECT * FROM user WHERE user_id='$user_id'");
    $myrow = mysqli_fetch_array($result);
	$name = "";
	$surname = "";
	$login = "";
	$email = "";
	$phone = "";
	
	// Check if user exist
    if (!empty($myrow['user_id']))
	{
		$name = $myrow['user_name'];
		$surname = $myrow['user_surname'];
		$login = $myrow['user_login'];
		$email = $myrow['user_email'];
		$phone = $myrow['user_phone'];
	}
?>
	
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Главная</a></li>
					<li class="active">Мой аккаунт</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--account-starts-->
	<div class="account">
		<div class="container">
			<div class="account-top heading">
				<h2>Мой аккаунт</h2>
			</div>
			<div class="account-main">
				<div class="col-md-6 account-right">
					<h3>Пользователь <?php echo $login;?> (<?php echo $user_id;?>)</h3>
					<p>Имя: <?php echo $name;?></p>
					<p>Фамилия: <?php echo $surname;?></p>
					<p>Телефон: <?php echo $phone;?></p>
					<p>E-mail: <?php echo $email;?></p>
					
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--account-end-->
	<!--start-ckeckout-->
	<div class="ckeckout">
		<!--cart update-->
		<script>
			$(document).ready(function(c) {
				updateOrders();
			});
		</script>
		<div class="container">
			<div class="ckeck-top heading">
				<h2>Заказы</h2>
			</div>
			<div class="ckeckout-top">
				<div class="cart-items">
					<h3>Мои заказы (<span class="order-items-count">0</span>)</h3>			
					<div id="order-list" class="in-check" >
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
		</div>
	</div>
	<!--end-ckeckout-->

<?php
	require('footer.php');
?>
