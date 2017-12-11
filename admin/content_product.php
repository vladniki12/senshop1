	<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Главная</a>
        </li>
        <li>
            <a href="#">Товары</a>
        </li>
    </ul>
</div>
  <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-picture"></i> Товары</h2>

        <div class="box-icon">
			<a href="#" class="btn btn-setting btn-round btn-default add_new_product"><i
                                class="glyphicon glyphicon-plus"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                       
        </div>
    </div>
    <div class="box-content">
	
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>ID</th>
        <th>Изображение</th>
        <th>Название</th>
        <th>Цена</th>
		<th>Тип</th>
		<th>Материал</th>
		<th>Описание</th>
		<th>Действие</th>
    </tr>
	
    </thead>
    <tbody>
	
		<?php
include 'connection.php'; 
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");
	$query = "SELECT `product_id`, `product_image`, `product_name`, `product_price`, `product_type`, `product_material`, `product_description` FROM `product`";
	$res = mysqli_query($link, $query) or die(mysqli_error());
	while($row = mysqli_fetch_array($res)) {
		$product_int = (int)$row['product_id'];
	echo '<tr id="'.$product_int.'">';
	echo '<td id="product_id"> '.$row['product_id'].'</td>';
	echo '<td id="product_image" class="center">'.$row['product_image'].'</td>';
	echo '<td id="product_name" class="center">'.$row['product_name'].'</td>';
	echo '<td id="product_price" class="center">'.$row['product_price'].'</td>';
	echo '<td id="product_type" class="center">'.$row['product_type'].'</td>';
	echo '<td id="product_material" class="center">'.$row['product_material'].'</td>';
	echo '<td id="product_description" class="center">'.$row['product_description'].'</td>';
	echo '<td class="center">';
	echo '<a class="btn btn-info edit_product" id="'.$row['product_id'].'" href="#">';
	echo '<i class="glyphicon glyphicon-edit icon-white"></i>';
	echo ' Изменить';
	echo '</a>';
	echo ' ';
	echo '<a class="btn btn-danger delete_product" href="#" id="'.$product_int.'">';
	echo '<i class="glyphicon glyphicon-trash icon-white"></i>';
	echo ' Удалить';
	echo '</a>';
	echo '</td>';
	echo '</tr>';
	}
	
mysqli_close($link);
?>

    
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
  <hr>

