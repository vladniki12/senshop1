<?php
	session_start();
    if (isset($_POST['product_id'])) { $product_id = $_POST['product_id']; if ($product_id == '') { unset($product_id);} }

    // Check correct
	$product_id = stripslashes($product_id);
    $product_id = htmlspecialchars($product_id);
	
	// Delete spaces
    $product_id = trim($product_id);
	
	// Get user id
	$user_id =  $_SESSION['id'];
	
	// Connect to DB
    include ("bd.php");
	
	// Add new order
	$result = mysqli_query($db, "INSERT INTO `order` (`order_id`, `customer_id`, `product_id`, `description`, `master_id`, `in_cart`, `completed`) VALUES(NULL, $user_id, $product_id, NULL, NULL, 1, 0)");
	
    // Check for errors
    if ($result=='TRUE')
    {
		echo "success";
		exit();
    }
	echo $product_id . " - " . $user_id . -" - " . mysqli_error($db);
?>
