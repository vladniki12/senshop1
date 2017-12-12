    <div class="modal fade" id="myModalEditOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
         aria-hidden="true">

        <div class="modal-dialog_product">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h3>Изменение cостояния заказа</h3>
                </div>
                  <form id="edit_order" class="contact_form" action="" method="post" enctype="multipart/form-data"  name="edit_order">
                <div class="modal-body">
                  
    <ul>
    
    <li>
			<label for="type">ID заказа:</label>
            <input name="id" id="id" type="text" autocomplete="off" required readonly="readonly"/>
        </li>
       <li>
            <label for="cost">Статус заказа:</label>
            <label>
            <!--<div class="list">-->
            <input class="qwe" type="radio" name="type_order_edit" id="type_order_edit" value="1"/>Выполнен
			<br>
			<input class="qwe" type="radio" name="type_order_edit" id="type_order_edit" value="0"/>В процессе...
            </label>     
        </li>
    </ul>
			<div class="block"></div>
                </div>
                <div class="modal-footer">
                    
					<input id="submit_close_edit_order" type="submit" class="btn btn-default" data-dismiss="modal" value="Закрыть">
					<input id="edit_order" type="submit" class="btn btn-primary" value="Изменить">
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
	
