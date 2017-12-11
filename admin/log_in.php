<?php
$login_in = $_POST['log_in'];
$password_in = $_POST['password_in'];
$password_new = md5($password_in);
include 'connection.php'; 

	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, "SET NAMES utf8");
	mysqli_query($link, "SET CHARACTER SET utf8");
	mysqli_query($link, "SET character_set_client = utf8");
	mysqli_query($link, "SET character_set_connection = utf8");
	mysqli_query($link, "SET character_set_results = utf8");
	$query = "SELECT COUNT(*) FROM user where `user_login`='$login_in', `user_password`='$password_new'";
	$res = mysqli_query($link, $query) or die(mysqli_error());
	while($row = mysqli_fetch_array($res)) {
	$role = $row['COUNT(*)'];
	}
	$query = "SELECT user_role FROM user where `user_login`='$login_in', `user_password`='$password_new'";
	$res = mysqli_query($link, $query) or die(mysqli_error());
	while($row = mysqli_fetch_array($res)) {
	$role = $row['user_role'];
	}
?>