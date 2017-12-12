<?php
// Обработка запроса
if (isset($_POST['id']) && isset($_POST['nameedit']) && isset($_POST['costedit']) && isset($_POST['type_prod_edit']) && isset($_POST['materialedit']) && isset($_POST['descriptionedit'])){

 	$id = $_POST['id'];	
	$name = $_POST['nameedit'];
	$cost = $_POST['costedit'];
	$type_prod = $_POST['type_prod_edit'];
	$material = $_POST['materialedit'];
	$description = $_POST['descriptionedit'];
	include 'connection.php'; 
	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");
	$query = "UPDATE `product` SET `product_id`='$id', `product_price`='$cost', `product_name`='$name', `product_type`='$type_prod', `product_material`='$material', `product_description`='$description' WHERE `product_id`='$id'";
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