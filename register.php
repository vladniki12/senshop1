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
					<li class="active">Регистрация</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--register-starts-->
	<div class="register">
		<div class="container">
			<div class="register-top heading">
				<h2>Регистрация</h2>
				<?php
					if ($login_error == "success") echo "<div style='color: #0f0; margin-top: 20px;'>Успешно зарегистрировано</div>";
					if ($login_error == "fail") echo "<div style='color: #f00; margin-top: 20px;'>Ошибка регистрации</div>";
				?>
			</div>
			<form action="add_user.php" method="post">
				<div class="register-main">
					<div class="col-md-6 account-left">
						<input name="name" placeholder="Имя" type="text" tabindex="1" required>
						<input name="surname" placeholder="Фамилия" type="text" tabindex="2" required>
						<input name="email" placeholder="Email адрес" type="text" tabindex="3" required>
						<input name="phone" placeholder="Номер телефона" type="text" tabindex="3" required>
					</div>
					<div class="col-md-6 account-left">
						<?php
							if ($login_error == "user") echo "<div style='color: #f00'>Пользователь с таким логином уже существует!</div>";
						?>
						<input name="login" placeholder="Логин" type="text" tabindex="4" required>
						<input name="password" placeholder="Пароль" type="password" tabindex="4" required>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="address submit">
					<input type="submit" value="Зарегистрироваться">
				</div>
			</form>
		</div>
	</div>
	<!--register-end-->

<?php
	require('footer.php');
?>
