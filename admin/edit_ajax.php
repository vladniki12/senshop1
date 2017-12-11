<?php
 if (isset($_POST['id']) && isset($_POST['type']) && isset($_POST['loginedit']) && isset($_POST['passwordedit']) && isset($_POST['emailedit']) && isset($_POST['phoneedit']) && isset($_POST['nameedit']) && isset($_POST['surnameedit'])){

	$id = $_POST['id'];
	$type = $_POST['type'];
	$login = $_POST['loginedit'];
	$pass = $_POST['passwordedit'];
	$email = $_POST['emailedit'];
	$phone = $_POST['phoneedit'];
	$name = $_POST['nameedit'];
	$surname = $_POST['surnameedit'];
	$pass = md5($pass);
	include 'connection.php'; 
	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");
	$query = "UPDATE `user` SET `user_id`='$id',`user_role`='$type',`user_login`='$login',`user_password`='$pass',`user_email`='$email',`user_phone`='$phone',`user_name`='$name',`user_surname`='$surname' WHERE user_id='$id'";
	$result = $query;
	//$query = iconv('windows-1251', 'UTF-8', $query);
	$res = mysqli_query($link, $query);

		if ($res = 'true'){
   $result = "Данные в базе данных успешно обновлены! Пожалуйста, обновите страницу"; 
}else{
    $result = "Ошибка! Данные не обновлены! Проверьтеправильность введенной информации.";
	 
}
//echo json_encode($result);
echo $result;
}



?>