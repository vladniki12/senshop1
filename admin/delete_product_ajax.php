<?php
 if (isset($_POST['id'])){

	$id = $_POST['id'];
	include 'connection.php'; 
	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка подключения к базе данных" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");
	$query = "DELETE FROM `product` WHERE product_id='$id'";
	$result = $query;
	//$query = iconv('windows-1251', 'UTF-8', $query);
	$res = mysqli_query($link, $query);

		if ($res = 'true'){
   $result = 1; 
}else{
    $result = 0;
	 
}
//echo json_encode($result);
echo $result;
}



?>