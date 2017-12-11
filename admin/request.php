<?php
require_once ('connection.php');
require_once( 'functions.php' );


	// Очищаем строку с типом запроса от лишних пробелов и защищаемся от возможных SQL-инъекций
	$request = htmlspecialchars( trim( $_POST[ 'request' ] ) );
	
	// Убираем тип запроса из массива $_POST
	unset( $_POST[ 'request' ] );

// В переменной $response будем возвращать данные AJAX-запросу
$response = NULL;
//смотрим, что передали, в зависимости от этого, вызываем функцию
switch ( $request ) {
	case "Edit":		
		$response = Edit( $_POST );
		break;
}

echo json_encode( $response );
?>