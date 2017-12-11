<?php
	require('header.php');
?>
	
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Главная</a></li>
					<li class="active">Контакты</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--contact-start-->
	<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h2>Контакты</h2>
			</div>
				<div class="contact-text">
				<div class="col-md-3 contact-left">
						<div class="address">
							<h5>Адрес</h5>
							<p>Ювелирные изделия 
							<span>Барнаул,</span>
							Ленина 46</p>
						</div>
						<div class="address">
							<h5>Контактные данные</h5>
							<p>Tel: +7-905-988-16-63</p>
							<p>Email: <a href="mailto:example@email.com">jewelery@senstudio.com</a></p>
						</div>
					</div>
					<div class="col-md-9 contact-right">
						<form>
							<input type="text" placeholder="Имя">
							<input type="text" placeholder="Телефон">
							<input type="text"  placeholder="Email">
							<textarea placeholder="Сообщение" required=""></textarea>
							<div class="submit-btn">
								<input type="submit" value="Отправить">
							</div>
						</form>
					</div>	
					<div class="clearfix"></div>
				</div>
		</div>
	</div>
	<!--contact-end-->
	<!--map-start-->
	<div class="map">
		<iframe src="https://www.google.com/maps/embed/v1/search?q=%D0%91%D0%B0%D1%80%D0%BD%D0%B0%D1%83%D0%BB%20%D0%9B%D0%B5%D0%BD%D0%B8%D0%BD%D0%B0%2046&key=AIzaSyDLAnfKf-KbRCEvbmE2tN_F_38UKCjiF_c" style="border:0"></iframe>
	</div>
	<!--map-end-->

<?php
	require('footer.php');
?>
