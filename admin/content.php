	<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Главная</a>
        </li>
        <li>
            <a href="#">Мастера</a>
        </li>
    </ul>
</div>
  <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Мастера</h2>

        <div class="box-icon">
			<a href="#" class="btn btn-setting btn-round btn-default" id="add_new_user"><i
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
        <th style="display: none">Тип</th>
        <th>Логин</th>
        <th>Пароль</th>
		<th>E-mail</th>
		<th>Телефон</th>
		<th>Имя</th>
		<th>Фамилия</th>
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
	$query = "SELECT user_id,user_role,user_login,user_password,user_email,user_phone,user_name,user_surname FROM user where user_role=1";
	$res = mysqli_query($link, $query) or die(mysqli_error());
	while($row = mysqli_fetch_array($res)) {
		$id_int = (int)$row['user_id'];
	echo '<tr id="'.$id_int.'">';
	echo '<td id="user_id"> '.$row['user_id'].'</td>';
	echo '<td style="display: none" id="user_role" class="center">'.$row['user_role'].'</td>';
	echo '<td id="user_login" class="center">'.$row['user_login'].'</td>';
	echo '<td id="user_password" class="center">'.$row['user_password'].'</td>';
	echo '<td id="user_email" class="center">'.$row['user_email'].'</td>';
	echo '<td id="user_phone" class="center">'.$row['user_phone'].'</td>';
	echo '<td id="user_name" class="center">'.$row['user_name'].'</td>';
	echo '<td id="user_surname" class="center">'.$row['user_surname'].'</td>';
	echo '<td class="center">';
	echo '<a class="btn btn-info edit_user" id="'.$row['user_id'].'" href="#">';
	echo '<i class="glyphicon glyphicon-edit icon-white"></i>';
	echo ' Изменить';
	echo '</a>';
	echo ' ';
	echo '<a class="btn btn-danger delete_user" href="#" id="'.$id_int.'">';
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

