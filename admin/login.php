
<!DOCTYPE html>
<html lang="en">
<head>

      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="ru">
    <title>Авторизация</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

	<script src="bower_components/jquery/jquery.min.js"></script>

    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Добро пожаловать в AdminPanel!</h2>
        </div>
        <!--/span-->
    </div><!--/row-->
	
            <?php
session_start(); //Запускаем сессии
/** 
 * Класс для авторизации
 * @author дизайн студия ox2.ru 
 */ 
class AuthClass {

    /**
     * Проверяет, авторизован пользователь или нет
     * Возвращает true если авторизован, иначе false
     * @return boolean 
     */
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //Если сессия существует
            return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
        }
        else return false; //Пользователь не авторизован, т.к. переменная is_auth не создана
    }
    
    /**
     * Авторизация пользователя
     * @param string $login
     * @param string $passwors 
     */
    public function auth($login, $passwors) {
    
    	
		include 'connection.php'; 

	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");
	$query = "SELECT COUNT(*) FROM user where `user_login`='$login', `user_password`='$passwors'";
	$res = mysqli_query($link, $query) or die(mysqli_error());
	while($row = mysqli_fetch_array($res)) {
	$count = $row['COUNT(*)'];
	}
	$query2 = "SELECT user_role,user_login  FROM user where `user_login`='$login', `user_password`='$passwors'";
	$res2 = mysqli_query($link, $query2) or die(mysqli_error());
	while($row2 = mysqli_fetch_array($res2)) {
	$role = $row['user_role'];
	$user_login = $row['user_login'];
	}
    
        if ($count==1) { //Если логин и пароль введены правильно
            $_SESSION["is_auth"] = true; //Делаем пользователя авторизованным
            $_SESSION["role"] = $role; 
             $_SESSION["login"] = $user_login;//Записываем в сессию логин пользователя
            return true;
        }
        else { //Логин и пароль не подошел
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }
    
    /**
     * Метод возвращает логин авторизованного пользователя 
     */
    public function getLogin() {
        if ($this->isAuth()) { //Если пользователь авторизован
            return $_SESSION["login"]; //Возвращаем логин, который записан в сессию
        }
    }
    
    
    public function out() {
        $_SESSION = array(); //Очищаем сессию
        session_destroy(); //Уничтожаем
    }
}

		$auth = new AuthClass();
    	$login_in = $_POST['log_in'];
		$password_in = $_POST['password_in'];
		$password_new = md5($password_in);//Устанавливаем пароль

if (isset($_POST["log_in"]) && isset($_POST["password_in"])) { //Если логин и пароль были отправлены
    if (!$auth->auth($login_in , $password_new)) { //Если логин и пароль введен не правильно
        echo "<h2 style=\"color:red;\">Логин и пароль введен не правильно!</h2>";
    }
}

if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //Выходим
        header("Location: ?is_exit=0"); //Редирект после выхода
    }
}
?>

<?php if ($auth->isAuth()) { // Если пользователь авторизован, приветствуем:  
    echo "Здравствуйте, " . $auth->getLogin() ;
    echo "<br/><br/><a href=\"?is_exit=1\">Выйти</a>"; //Показываем кнопку выхода
} 
else { //Если не авторизован, показываем форму ввода логина и пароля
?>
    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Пожалуйста, войдите с Вашим логином и паролем.
            </div>
	
            <?php
session_start(); //Запускаем сессии

/** 
 * Класс для авторизации
 * @author дизайн студия ox2.ru 
 */ 
class AuthClass {

    /**
     * Проверяет, авторизован пользователь или нет
     * Возвращает true если авторизован, иначе false
     * @return boolean 
     */
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //Если сессия существует
            return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
        }
        else return false; //Пользователь не авторизован, т.к. переменная is_auth не создана
    }
    
    /**
     * Авторизация пользователя
     * @param string $login
     * @param string $passwors 
     */
    public function auth($login, $passwors) {
    
    	
		include 'connection.php'; 

	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");
	$query = "SELECT COUNT(*) FROM user where `user_login`='$login', `user_password`='$passwors'";
	$res = mysqli_query($link, $query) or die(mysqli_error());
	while($row = mysqli_fetch_array($res)) {
	$count = $row['COUNT(*)'];
	}
	$query2 = "SELECT user_role,user_login  FROM user where `user_login`='$login', `user_password`='$passwors'";
	$res2 = mysqli_query($link, $query2) or die(mysqli_error());
	while($row2 = mysqli_fetch_array($res2)) {
	$role = $row['user_role'];
	$user_login = $row['user_login'];
	}
    
        if ($count==1) { //Если логин и пароль введены правильно
            $_SESSION["is_auth"] = true; //Делаем пользователя авторизованным
            $_SESSION["role"] = $role; 
             $_SESSION["login"] = $user_login;//Записываем в сессию логин пользователя
            return true;
        }
        else { //Логин и пароль не подошел
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }
    
    /**
     * Метод возвращает логин авторизованного пользователя 
     */
    public function getLogin() {
        if ($this->isAuth()) { //Если пользователь авторизован
            return $_SESSION["login"]; //Возвращаем логин, который записан в сессию
        }
    }
    
    
    public function out() {
        $_SESSION = array(); //Очищаем сессию
        session_destroy(); //Уничтожаем
    }
}

		$auth = new AuthClass();
    	$login_in = $_POST['log_in'];
		$password_in = $_POST['password_in'];
		$password_new = md5($password_in);//Устанавливаем пароль

if (isset($_POST["log_in"]) && isset($_POST["password_in"])) { //Если логин и пароль были отправлены
    if (!$auth->auth($login_in , $password_new)) { //Если логин и пароль введен не правильно
        echo "<h2 style=\"color:red;\">Логин и пароль введен не правильно!</h2>";
    }
}

if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //Выходим
        header("Location: ?is_exit=0"); //Редирект после выхода
    }
}
?>

<?php if ($auth->isAuth()) { // Если пользователь авторизован, приветствуем:  
    echo "Здравствуйте, " . $auth->getLogin() ;
    echo "<br/><br/><a href=\"?is_exit=1\">Выйти</a>"; //Показываем кнопку выхода
} 
else { //Если не авторизован, показываем форму ввода логина и пароля
?>
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input name="log_in" type="text" class="form-control" placeholder="Логин" value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // Заполняем поле по умолчанию ?>" >
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input name="password_in" type="password" class="form-control" placeholder="Пароль">
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                        <label class="remember" for="remember"><input type="checkbox" id="remember"> Запомнить меня</label>
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Авторизация</button>
                    </p>
                </fieldset>
            </form>
            
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>
<?php } ?>