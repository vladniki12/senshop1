<?php
//$path = '/var/www/domains/eventsun.ru/';
$path = '/Applications/MAMP/htdocs/test2/img_product/';
$tmp_path = '/';
// Массив допустимых значений типа файла
$types = array('image/gif', 'image/png', 'image/jpeg', 'image/png');
// Максимальный размер файла
$size = 1024000;

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
if (isset($_POST['picture']) && isset($_POST['name']) && isset($_POST['cost']) && isset($_POST['type_prod']) && isset($_POST['material']) && isset($_POST['description'])){
 // Проверяем тип файла
 if (!in_array($_FILES['picture']['type'], $types))
  $result = "Запрещённый тип файла. Попробуйте другой файл.</a>"; 
else  $result = 0;
 // Проверяем размер файла
 if ($_FILES['picture']['size'] > $size)
  $result = "Слишком большой размер файла. Попробуйте другой файл.</a>"; 
else  $result = 0;
 // Загрузка файла и вывод сообщения
 @copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']);
 
 	$picture = $_FILES['picture']['name'] ;
	$name = $_POST['name'];
	$cost = $_POST['cost'];
	$type_prod = $_POST['type_prod'];
	$material = $_POST['material'];
	$description = $_POST['description'];
	include 'connection.php'; 
	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");
		$query = "INSERT INTO `product` (`product_id`, `product_price`, `product_name`, `product_image`, `product_type`, `product_material`, `product_description`) VALUES
('', '$cost', '$name', '$picture', '$type_prod', '$material', '$description')";
	//$query = iconv('windows-1251', 'UTF-8', $query);
	$res = mysqli_query($link, $query);

		if ($res = 'true' && $result==0){
   $result = 1; 
}else{
    $result = $result + " Данные в базу данных не были добавлены!"; 
	 
}
//echo json_encode($result);
echo $result;
 }
}



	



?>