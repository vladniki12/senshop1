<?php
    session_start();
	unset($_SESSION['id']);
	unset($_SESSION['role']);
	session_destroy();
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit();
?>