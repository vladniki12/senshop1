<?php
require_once ('connection.php');
require_once( 'functions.php' );


	// ������� ������ � ����� ������� �� ������ �������� � ���������� �� ��������� SQL-��������
	$request = htmlspecialchars( trim( $_POST[ 'request' ] ) );
	
	// ������� ��� ������� �� ������� $_POST
	unset( $_POST[ 'request' ] );

// � ���������� $response ����� ���������� ������ AJAX-�������
$response = NULL;
//�������, ��� ��������, � ����������� �� �����, �������� �������
switch ( $request ) {
	case "Edit":		
		$response = Edit( $_POST );
		break;
}

echo json_encode( $response );
?>