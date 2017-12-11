<?php
	session_start();
    if (isset($_POST['order_id'])) { $order_id = $_POST['order_id']; if ($order_id == '') { unset($order_id);} }

    // Check correct
	$order_id = stripslashes($order_id);
    $order_id = htmlspecialchars($order_id);
	
	// Delete spaces
    $order_id = trim($order_id);
	
	// Get user id
	$user_id = $_SESSION['id'];
	
	// Connect to DB
    include ("bd.php");
	
	// Remove order
	$result = mysqli_query($db, "DELETE FROM `order` WHERE `order_id` = $order_id AND `customer_id` = $user_id");
	
    // Check for errors
    if ($result=='TRUE')
    {
		echo "success";
		exit();
    }
	echo $order_id . " - " . $user_id;
?>
