     <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <span>AdminPanel</span></a>
                 <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    		<?php
                    		 session_start();
            include 'connection.php'; 
                
             $id_master = $_SESSION['id'];
             
              $id_role = $_SESSION['role'];
                $link = mysqli_connect($host, $user, $password, $database) 
                    or die("Ошибка" . mysqli_error($link));
	            mysqli_query($link, "SET NAMES utf8");
	            mysqli_query($link, "SET CHARACTER SET utf8");
	            mysqli_query($link, "SET character_set_client = utf8");
	            mysqli_query($link, "SET character_set_connection = utf8");
	            mysqli_query($link, "SET character_set_results = utf8");
	$query = "SELECT `user_login` FROM `user` WHERE `user_id`=$id_master";
	$res = mysqli_query($link, $query) or die(mysqli_error());
	while($row = mysqli_fetch_array($res)) {
	$user_login = $row['user_login'];
	}
	 echo '<i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"></span>';
                    echo '<span class="caret"></span>';
                echo '</button>';
                echo '<ul class="dropdown-menu">';
                    echo '<li><a>'.$user_login.'</a></li>';
                echo '</ul>';
            echo '</div>';
	
        mysqli_close($link);
        
?>
                    
                
                
            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="http://eventsun.ru"><i class="glyphicon glyphicon-globe"></i> Перейти на сайт</a></li>
                
            </ul>

        </div>
    </div>