	<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Главная</a>
        </li>
        <li>
            <a href="#">Заказы</a>
        </li>
    </ul>
</div>
  <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-picture"></i> Заказы</h2>

        <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                       
        </div>
    </div>
    <div class="box-content">
	
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>ID</th>
        <th>ID пользователя</th>
        <th>ID товара</th>
        <th>Описание</th>
		<th>ID мастера</th>
		<th>В корзине</th>
		<th>Статус</th>
		<th>Действие</th>
    </tr>
	
    </thead>
    <tbody>
	
		<?php
include 'connection.php'; 
  session_start();
    $id_master = $_SESSION['id'];
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");
	$query = "SELECT `order_id`, `customer_id`, `product_id`, `description`, `master_id`, `in_cart`, `completed` FROM `order` WHERE `master_id`=$id_master";
	$res = mysqli_query($link, $query) or die(mysqli_error());
	while($row = mysqli_fetch_array($res)) {
	$order_id = (int)$row['order_id'];
	$customer_id = (int)$row['customer_id'];
	$product_id = (int)$row['product_id'];
	$master_id = (int)$row['master_id'];
	echo '<tr id="'.$order_id.'">';
	echo '<td id="order_id"> '.$order_id.'</td>';	
	echo '<td id="customer_id"> '.$customer_id.'</td>';	
	echo '<td id="product_id"> '.$product_id.'</td>';	
	echo '<td id="description"> '.$row['description'].'</td>';	
	echo '<td id="master_id"> '.$master_id.'</td>';
	if($row['in_cart']==1) echo '<td id="in_cart"> Да</td>';
	else if($row['in_cart']==0) echo '<td id="in_cart"> Нет</td>';
	echo '<td class="center">';
	if($row['completed']==1) echo '<span id="'.$row['completed'].'" class="label-success label label-default status">Выполнен</span>';
	else if($row['completed']==0) echo '<span id="'.$row['completed'].'" class="label-default label status">В процессе...</span>';
    echo '</td>';
	echo '<td class="center">';
	echo '<a class="btn btn-info edit_order" id="'.$row['order_id'].'" href="#">';
	echo '<i class="glyphicon glyphicon-edit icon-white"></i>';
	echo ' Изменить';
	echo '</a>';
	echo ' ';
	echo '<a class="btn btn-danger delete_order" href="#" id="'.$order_id.'">';
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

