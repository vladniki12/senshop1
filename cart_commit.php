<?php
	session_start();
	
	// Get user id
	$user_id =  $_SESSION['id'];
	
	// Connect to DB
    include ("bd.php");
	
	// Get masters
	$master_id =  0;
	$result = mysqli_query($db, "SELECT * FROM user WHERE user_role='1' ORDER BY RAND()");
	if ($myrow = mysqli_fetch_array($result)) {
		$master_id = $myrow['user_id'];
	}
	
	// Add new order
	$result = mysqli_query($db, "UPDATE `order` SET `master_id`=$master_id, `in_cart`=0 WHERE `customer_id`=$user_id and `in_cart`=1");
	
    // Check for errors
    if ($result=='TRUE')
    {
		echo "success";
		exit();
    }
	echo $product_id . " - " . $user_id . -" - " . mysqli_error($db);
?>
