<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
	if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} }
    if (isset($_POST['surname'])) { $surname=$_POST['surname']; if ($surname =='') { unset($surname);} }
	if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} }
    if (isset($_POST['phone'])) { $phone=$_POST['phone']; if ($phone =='') { unset($phone);} }

    // Check correct
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
	$name = stripslashes($name);
    $name = htmlspecialchars($name);
	$surname = stripslashes($surname);
    $surname = htmlspecialchars($surname);
	$email = stripslashes($email);
    $email = htmlspecialchars($email);
	$phone = stripslashes($phone);
    $phone = htmlspecialchars($phone);
	
	// Delete spaces
    $login = trim($login);
    $password = trim($password);
    $password = md5($password);
	$email = trim($email);
    $phone = trim($phone);
	
	// Connect to DB
    include ("bd.php");

	// Check for existing user
    $result = mysqli_query($db, "SELECT user_id FROM user WHERE user_login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) 
	{
		header("Location:register.php?error=user");
		exit();
    }
	
	// Save new user
	$result2 = mysqli_query($db, "INSERT INTO user(user_id, user_role, user_login, user_password, user_email, user_phone, user_name, user_surname) VALUES(NULL, '2', '$login', '$password', '$email', '$phone', '$name', '$surname')");
	
    // Check for errors
    if ($result2=='TRUE')
    {
		header("Location:register.php?error=success");
		exit();
    }
	else
	{
		header("Location:register.php?error=fail");
		exit();
    }
?>
