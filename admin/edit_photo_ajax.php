<?php
//$path = '/var/www/domains/eventsun.ru/';
$path = '/Applications/MAMP/htdocs/test2/img_product/';
$tmp_path = '/';
// Массив допустимых значений типа файла
$types = array('image/gif', 'image/png', 'image/jpeg', 'image/png');
// Максимальный размер файла
$size = 1024000;
// Обработка запроса
 if (!in_array($_FILES['pictureedit']['type'], $types))
  $result = "Запрещённый тип файла. Попробуйте другой файл.</a>"; 
else  $result = 0;
 // Проверяем размер файла
 if ($_FILES['pictureedit']['size'] > $size)
  $result = "Слишком большой размер файла. Попробуйте другой файл.</a>"; 
else  $result = 0;
 // Загрузка файла и вывод сообщения
 //@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']);
 
 	$uploaddir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'img_product'.DIRECTORY_SEPARATOR;
		//$result = $uploaddir;
		$uploadfile = $uploaddir . basename($_FILES['pictureedit']['name']);
		move_uploaded_file($_FILES['pictureedit']['tmp_name'], $uploadfile);
 	$id = $_POST['id'];	
 	$picture = $_FILES['pictureedit']['name'];
	include 'connection.php'; 
	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");	
	$query0 = "SELECT `product_image` FROM `product` WHERE `product_id`='$id'";
	$res0 = mysqli_query($link, $query0) or die(mysqli_error());
	while($row0 = mysqli_fetch_array($res0)) {
	$product_image = "../img_product/".$row0['product_image'];
	}
	
	$query = "UPDATE `product` SET `product_id`='$id', `product_image`='$picture' WHERE `product_id`='$id'";
	
	$res = mysqli_query($link, $query);
		if ($res = 'true' && $result==0){
   $result = 1; 
}
else {
    $result = $result + " Данные в базу данных не были обновлены!"; 
	 
}

unlink($product_image);

 echo $result;
?>