<?php
    session_start();
	
	// Get login and password
	if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
	if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
	
    // Process login and password
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
	
	// Delete spaces
    $login = trim($login);
    $password = trim($password);
	
	// Connect to db
    include ("bd.php");
 
	$result = mysqli_query($db, "SELECT * FROM user WHERE user_login='$login'");
    $myrow = mysqli_fetch_array($result);
	
	// Check if user exist
    if (empty($myrow['user_password']))
    {
		header("Location:login.php?error=user");
		exit();
    }
    else 
	{
		if ($myrow['user_password']==$password) 
		{
			// Launch session
			$_SESSION['id']=$myrow['user_id'];
			$_SESSION['role']=$myrow['user_role'];
			header('Location: index.php');
			exit();
		}
		else 
		{
			header("Location:login.php?error=password");
			exit();
		}
	}
?>