    <div class="modal fade" id="myModalNewProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog_product">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h3>Добавление нового товара</h3>
                </div>
                  <form id="add_product" class="contact_form" action="" method="post" name="contact_form" enctype="multipart/form-data">
                <div class="modal-body">
                  
    <ul>
    	<li>
            <label for="name">Изображение:</label>
            <input type="file" name="picture"></input>
        </li>
       <li>
            <label for="name">Название:</label>
            <input class="input" name="name" required="required" type="text" autocomplete="off" />
        </li>
		<li>
            <label for="name">Цена:</label>
            <input class="input" name="cost" required="required" type="text" autocomplete="off" />
           </li>
		<li>
            <label for="cost">Тип товара:</label>
            <label>
            <!--<div class="list">-->
            <?php 
            include 'connection.php'; 
 
			$link = mysqli_connect($host, $user, $password, $database) 
    		or die("Ошибка" . mysqli_error($link));
			mysqli_query($link, "SET NAMES utf8");
			mysqli_query($link, "SET CHARACTER SET utf8");
			mysqli_query($link, "SET character_set_client = utf8");
			mysqli_query($link, "SET character_set_connection = utf8");
			mysqli_query($link, "SET character_set_results = utf8");
			$query = "SELECT `type_id`, `type_name` FROM `product_type`";
			$res = mysqli_query($link, $query) or die(mysqli_error());
			while($row = mysqli_fetch_array($res)) {
			echo '<input class="qwe" type="radio" name="type_prod" value="'.$row['type_id'].'"/>'.$row['type_name'].'';
			echo '<br>';
	}	
          mysqli_close($link);  
            ?>
            </label>     
        </li>
         <div class="block"></div>
		<li>
            <label for="name">Материал:</label>
            <textarea name="material" type="text" autocomplete="off" rows="3" cols="35" style="resize: none;"></textarea>
        </li>
        
        <li>
            <label for="name">Описание:</label>
            <textarea name="description" type="text" autocomplete="off" rows="10" cols="55"  style="resize: none;"></textarea>
        </li>
	
        
    </ul>

                </div>
                <div class="modal-footer">
                    
					<a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
					<input id="submit_add_new_product" type="submit" class="btn btn-primary" value="Добавить">
                </div>			 
				</form>
				
           
        </div>
    </div>
	 </div>
	
	 
  <div class="modal fade" id="myModalOk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                </div>
				<br>
                <div class="modal-body">
				<img src="img/ok.png" width="100" height="100"/>
				<div id="result_form_ok">
				
				</div>
                  	</div> 
					<div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                </div>
				
            </div>
        </div>
    </div>
	<div class="modal fade" id="myModalCancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                </div>
				<br>
                <div class="modal-body">
				<img src="img/cancel.png" width="100" height="100"/>
				<div id="result_form_cancel">
				
				</div>
                  	</div> 
					<div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                </div>
				
            </div>
        </div>
    </div>
	