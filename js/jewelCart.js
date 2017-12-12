$(document).ready(function(){
	$('.cart_order_add').on('click', function(c){
			addOrder($( this ).data("product"));
	});
	$('.cart_order_commit').on('click', function(c){
			commitOrder();
	});
});




// Update orders
function updateOrders() {
	var pageLoader = $('#page-loader');
	pageLoader.show();
	
	$.post( "orders_update.php", {})
	.done(function( data ) {
		pageLoader.hide();
		
		if (data) {
			var orders = JSON.parse(data);
			$(".order-items-count").text(orders.length);
			for (var i=0; i < orders.length; i++) {
				var html = '<ul class="cart-header" data-order="' + orders[i].order_id + '">\
								<li class="ring-in"><a href="single.php" ><img src="' + orders[i].item_image + '" class="img-responsive" alt=""></a>\
								</li>\
								<li><span class="name">' + orders[i].item_name + '</span></li>\
								<li><span class="cost">' + orders[i].item_price + ' Р</span></li>\
								<li><span>Бесплатно</span>\
								<p>Доставка в течение 2-3 рабочих дней</p></li>\
							<div class="clearfix"> </div>\
							</ul>';
				
				$("#order-list").append(html);
			}
		}
	});
}




// Update cart
function updateCart() {
	var pageLoader = $('#page-loader');
	pageLoader.show();
	$( '.cart-header' ).remove();
	
	$.post( "cart_update.php", {})
	.done(function( data ) {
		pageLoader.hide();
		
		if (data) {
			var orders = JSON.parse(data);
			var totalSum = 0.0;
			$(".cart-items-count").text(orders.length);
			for (var i=0; i < orders.length; i++) {
				totalSum = totalSum + parseFloat(orders[i].item_price);
				
				var html = '<ul class="cart-header" data-order="' + orders[i].order_id + '">\
							<div class="cart_order_remove"> </div>\
								<li class="ring-in"><a href="single.php" ><img src="' + orders[i].item_image + '" class="img-responsive" alt=""></a>\
								</li>\
								<li><span class="name">' + orders[i].item_name + '</span></li>\
								<li><span class="cost">' + orders[i].item_price + ' Р</span></li>\
								<li><span>Бесплатно</span>\
								<p>Доставка в течение 2-3 рабочих дней</p></li>\
							<div class="clearfix"> </div>\
							</ul>';
				
				$("#cart-list").append(html);
			}
			
			$('.cart_order_remove').on('click', function(c){
				removeOrder($( this ).parent());
			});

			$('.jewelCart_total').text(totalSum + " Р");
		}
	});
}




// Adding order to cart
function addOrder(item_id) {
	var pageLoader = $('#page-loader');	

	$.post( "cart_add.php", { product_id: item_id })
	.done(function( data ) {
		if (data === "success") {
			console.log(1);
			alert("Успешно добавлено в корзину");
			updateCart();
		}
	});
}




// Removing order from cart
function removeOrder(item) {
	var pageLoader = $('#page-loader');
	pageLoader.show();
	
	$.post( "cart_remove.php", { order_id: item.data("order") })
	.done(function( data ) {
		if (data === "success") {
			updateCart();
		}
	});
}




// Commit order
function commitOrder() {
	var pageLoader = $('#page-loader');	

	$.post( "cart_commit.php", {})
	.done(function( data ) {
		if (data === "success") {
			console.log(1);
			alert("Заказ оформлен");
			updateCart();
		}
	});
}
