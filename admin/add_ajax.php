<?php

function generateSalt() {
    $salt = '';
    $length = rand(5,10); // длина соли (от 5 до 10 сомволов)
    for($i=0; $i<$length; $i++) {
         $salt .= chr(rand(33,126)); // символ из ASCII-table
    }
    return $salt;
}
 if (isset($_POST['type']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['name']) && isset($_POST['surname'])){

	$type = $_POST['type'];
	$login = $_POST['login'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	
	//$salt=generateSalt();
	//$pass_new = md5(md5($pass).$salt);
	$pass_new=md5($pass);
	include 'connection.php'; 

	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");
	$query = "INSERT INTO `user` (`user_id`, `user_role`, `user_login`, `user_password`, `user_email`, `user_phone`, `user_name`, `user_surname`) VALUES
('', '$type', '$login', '$pass_new', '$email', '$phone', '$name', '$surname')";
	//$query = iconv('windows-1251', 'UTF-8', $query);
	$res = mysqli_query($link, $query);

		if ($res = 'true'){
   $result = "Данные в базу данных успешно добавлены!"; 
}else{
    $result = 0;
	 
}
//echo json_encode($result);
echo $result;
}



?>