 <?php 
 if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['name']) && isset($_POST['surname'])){

	$login = $_POST['login'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$type = 1;
	include 'connection.php'; 
	$link = mysqli_connect($host, $user, $password, $database) or die("Îøèáêà " . mysqli_error($link));
	mysqli_query($link, "SET NAMES cp1251");
	mysqli_query($link, "SET CHARACTER SET cp1251");
	mysqli_query($link, "SET character_set_client = cp1251");
	mysqli_query($link, "SET character_set_connection = cp1251");
	mysqli_query($link, "SET character_set_results = cp1251");
	$result = mysqli_query($link, "INSERT INTO `user` (`user_id`, `user_role`, `user_login`, `user_password`, `user_email`, `user_phone`, `user_name`, `user_surname`) VALUES
('', '$type', '$login', '$pass', '$email', '$phone', '$name', '$surname')");
 }
	
 
 ?>