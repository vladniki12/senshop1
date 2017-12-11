<?php 
function Edit () {
	$Id = htmlspecialchars( trim ( $array[ 'id' ] ) );
	include ( 'connection.php' );
	$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
	mysqli_query($link, "SET NAMES cp1251");
	mysqli_query($link, "SET CHARACTER SET cp1251");
	mysqli_query($link, "SET character_set_client = cp1251");
	mysqli_query($link, "SET character_set_connection = cp1251");
	mysqli_query($link, "SET character_set_results = cp1251");
	$query = "SELECT user_id,user_role,user_login,user_password,user_email,user_phone,user_name,user_surname FROM user where user_role=1 and user_id='" . $Id . "' order by user_id";
	$res = mysqli_query($link, $query) or die(mysqli_error());
	while($row = mysqli_fetch_array($res)) {
	$array[ $i ][ 'user_id' ] = $row['user_id'];
	$array[ $i ][ 'user_role' ] = $row['user_role'];
	$array[ $i ][ 'user_login' ] = $row['user_login'];
	$array[ $i ][ 'user_password' ] = $row['user_password'];
	$array[ $i ][ 'user_email' ] = $row['user_email'];
	$array[ $i ][ 'user_phone' ] = $row['user_phone'];
	$array[ $i ][ 'user_name' ] = $row['user_name'];
	$array[ $i ][ 'user_surname' ] = $row['user_surname'];
	}
	
mysqli_close($link);
	return $array;
}
?>