<?php
// Обработка запроса
if (isset($_POST['id']) && isset($_POST['type_order_edit'])){

 	$id = $_POST['id'];	
	$status = $_POST['type_order_edit'];
	include 'connection.php'; 
	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");
	$query = "UPDATE `order` SET `order_id`='$id', `completed`='$status' WHERE `order_id`='$id'";
	 $result = $query;
	//$query = iconv('windows-1251', 'UTF-8', $query);
	$res = mysqli_query($link, $query);
		if ($res = 'true'){
   $result = 1; 
}
else{
    $result = " Данные в базе данных не были обновлены!"; 
    }
     
echo $result;
}
?>