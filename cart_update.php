<?php
	session_start();
	
	// Connect to db
    include ("bd.php");
 
	// Get user id
	$user_id = $_SESSION['id'];
	
	// Get orders
	$result = mysqli_query($db, "SELECT * FROM `order` LEFT JOIN `product` using(product_id) WHERE customer_id='$user_id'");
	$num_rows = mysqli_num_rows($result);
	
	$order_stack = array();

	while ($myrow = mysqli_fetch_array($result)) {
		$myOrder = new stdClass();
		$myOrder->order_id = $myrow['order_id'];
		$myOrder->item_image = $myrow['product_image'];
		$myOrder->item_name = $myrow['product_name'];
		$myOrder->item_price = $myrow['product_price'];

		array_push($order_stack, $myOrder);
	}
	
	// Check for errors
    if (count($order_stack) > 0)
    {
		echo json_encode($order_stack);
		exit();
    }
?>
