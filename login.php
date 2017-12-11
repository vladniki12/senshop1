<?php
	session_start();
	if (!empty($_SESSION['id']))
	{
		header("Location:index.php");
		exit();
	}

	require('header.php');
	
	if (isset($_GET['error'])) { $login_error = $_GET['error']; if ($login_error == '') { unset($login_error);} }
?>
	
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Главная</a></li>
					<li class="active">Авторизация</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--account-starts-->
	<div class="account">
		<div class="container">
		<div class="account-top heading">
				<h2>Авторизация</h2>
			</div>
			<div class="account-main">
				<div class="col-md-6 account-left">
					<h3>Существующий пользователь</h3>
					<form action="auth.php" method="post">
						<div class="account-bottom">
							<?php
								if ($login_error == "user") echo "<div style='color: #f00'>Неправильный логин</div>";
							?>
							<input name="login" placeholder="Логин" type="text" tabindex="3" required>
							<?php
								if ($login_error == "password") echo "<div style='color: #f00'>Неправильный пароль</div>";
							?>
							<input name="password" placeholder="Пароль" type="password" tabindex="4" required>
							<div class="address">
								<a class="forgot" href="#">Забыли пароль?</a>
								<input type="submit" value="Войти">
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-6 account-right account-left">
					<h3>Новый пользователь? Создайте аккаунт</h3>
					<p>Создав учетную запись в нашем магазине, вы сможете оформлять и просматривать заказы.</p>
					<a href="register.php">Зарегистрироваться</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--account-end-->

<?php
	require('footer.php');
?>
