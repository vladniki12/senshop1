
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h3>Добавление нового пользователя</h3>
                </div>
                <div class="modal-body">
                    <form id="add_master" class="contact_form" action="" method="post" name="contact_form">
    <ul>
    <li style="display: none">
            <label for="type">Тип пользователя:</label>
            <input name="type" id="type" type="text" value="2" />
        </li>
       <li>
            <label for="login">Логин:</label>
            <input name="login" type="text" autocomplete="off" required />
        </li>
		<div class="line"></div>
		<li>
            <label for="password">Пароль:</label>
            <input name="password" type="text" autocomplete="off" required />
        </li>
		<div class="line"></div>
		
        <li>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="john_doe@example.com" autocomplete="off" required />
            <span class="form_hint">Придерживайтесь формата "name@something.com"</span>
        </li>
		<div class="line"></div>
        <li>
            <label for="phone">Телефон:</label>
            <input type="text" name="phone" placeholder="8 (000) 000-00-00" autocomplete="off" required />
            <span class="form_hint">Придерживайтесь формата"8 (000) 000-00-00"</span>
        </li>
		<div class="line"></div>
		<li>
            <label for="name">Имя:</label>
            <input name="name" type="text" autocomplete="off" required />
        </li>
		<div class="line"></div>
		<li>
            <label for="surname">Фамилия:</label>
            <input name="surname" type="text" autocomplete="off" required />
        </li>
        
        
    </ul>

                </div>
                <div class="modal-footer">
                    
					<input id="submit_close_add_user" type="submit" class="btn btn-default" data-dismiss="modal" value="Закрыть">
					<input id="submit_add" type="submit" class="btn btn-primary" value="Добавить">
                </div>
				
				</form>
				
            </div>
        </div>
    </div>
	</div>
	
	
	  <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h3>Изменение данных пользователя</h3>
                </div>
                <div class="modal-body">
                    <form id="edit_master" class="contact_form1" action="#" method="post" name="contact_form1">
    <ul>
	<li>
			<label for="type">ID пользователя:</label>
            <input name="id" id="id" type="text" autocomplete="off" required readonly="readonly"/>
        </li>
		<div class="line"></div>
	<li>
            <label for="type">Тип пользователя:</label>
            <input name="type" id="type_user" type="text" autocomplete="off" required />
        </li>
			<div class="line"></div>
       <li>
            <label for="loginedit">Логин:</label>
            <input name="loginedit" id="loginedit" type="text" autocomplete="off" required />
        </li>
		<div class="line"></div>
		<li>
            <label for="passwordedit">Пароль:</label>
            <input name="passwordedit" id="passwordedit" type="text" autocomplete="off" required />
        </li>
		<div class="line"></div>
		
        <li>
            <label for="emailedit">Email:</label>
            <input id="emailedit" type="email" name="emailedit" placeholder="john_doe@example.com" autocomplete="off" required />
            <span class="form_hint">Придерживайтесь формата "name@something.com"</span>
        </li>
		<div class="line"></div>
        <li>
            <label for="phoneedit">Телефон:</label>
            <input id="phoneedit" type="text" name="phoneedit" placeholder="8 (000) 000-00-00" autocomplete="off" required />
            <span class="form_hint">Придерживайтесь формата "8 (000) 000-00-00"</span>
        </li>
		<div class="line"></div>
		<li>
            <label for="nameedit">Имя:</label>
            <input name="nameedit" id="nameedit" type="text" autocomplete="off" required />
        </li>
		<div class="line"></div>
		<li>
            <label for="surnameedit">Фамилия:</label>
            <input name="surnameedit" id="surnameedit" type="text" autocomplete="off" required />
        </li>
        
        
    </ul>

                </div>
                <div class="modal-footer">
                    <input id="submit_close_edit_user" type="submit" class="btn btn-default" data-dismiss="modal" value="Закрыть">
					<input id="edit_user" type="submit" class="btn btn-primary" value="Изменить">
                </div>
				</form>
            </div>
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
				</br>
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
				</br>
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