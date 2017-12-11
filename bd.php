<?php
	$dbhost = 'localhost'; 
	$dbdatabase = 'senshop';
	$dbuser = 'novkl';
	$dbpassword = '3RussianDev';
	
	/*$dbhost = '217.107.34.77';
	$dbdatabase = 'senshop';
	$dbuser = 'sen';
	$dbpassword = '32659887';*/
	
/*	$dbhost = 'localhost'; 
	$dbdatabase = 'jewelery';
	$dbuser = 'jewelery';
	$dbpassword = 'jewelery';*/
	
    $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase) or die("Ошибка " . mysqli_error($db));
    mysqli_query($db, "SET NAMES utf8");
     mysqli_query($db, "SET CHARACTER SET utf8");
    mysqli_query($db, "SET character_set_client = utf8");
    mysqli_query($db, "SET character_set_connection = utf8");
    mysqli_query($db, "SET character_set_results = utf8");
?>