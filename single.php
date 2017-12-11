<?php
	require('header.php');
	
?>

<?php
				    	include ("bd.php");
				    	if (isset($_GET['id'])) { $id = $_GET['id'];}
				    	$name="";
				    	$cost="";
				    	$desc ="";
				    	$image = "";
				    	$type = "";
				    	$id_type = "";
				    
                      
                      if ($result = $db->query("SELECT * FROM `product` where product_id=$id")) 
                      {
                          while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
                            {
				$prod_id = $myrow['product_id'];
                                $name = $myrow['product_name'];
                                $cost = $myrow['product_price'];
                                $desc = $myrow['product_description'];
                                $image = $myrow['product_image'];
                                $id_type = $myrow['product_type'];
                                if ($result = $db->query("SELECT * FROM `product_type` where type_id=$id_type")) 
                                     {
                                          while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
                                         {
                                             $type = $myrow['type_name'];
                          
                                                
                                            }
                                     
                                     }
                          
                                     
                            }
                                     
                      }
				    	
                      
                     
					
					?>

<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="http://eventsun.ru">Главная</a></li>
					<li><a href="products.php?id=<?php echo $id_type?>"><?php echo $type?></a></li>
					<li class="active"><?php echo $name;?></li>
				</ol>
			</div>
		</div>
	</div>
<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left" style="    width: 100%;">
				<div class="sngl-top">
				    
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							  
						<div class="flex-viewport" style="overflow: hidden; position: relative;">
						    <ul class="slides" style="width: 100%; transition-duration: 0.6s; transform: translate3d(25px, 0px, 0px);"><li data-thumb="<?php echo $image;?>" class="clone" aria-hidden="true" style="float: left; display: block; width: 304px;">
								   <div class="thumb-image"> <img src="<?php echo $image;?>" data-imagezoom="true" class="img-responsive" alt="" draggable="false"> </div>
								</li>
								
								</ul></div>
								
								                            </div>
						<!-- FlexSlider -->
					<!--//	<script src="js/imagezoom.js"></script>-->
					<!--//	<script defer="" src="js/jquery.flexslider.js"></script>-->
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen">

				 		<script>
				// 		// Can also be used with $(document).ready()
				// 		$(window).load(function() {
				// 		  $('.flexslider').flexslider({
				// 			animation: "slide",
				// 			controlNav: "thumbnails"
				// 		  });
				// 		});
				// 		</script>
					</div>	
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem">
						<h2><?php echo $name;?></h2>
							
							
							<h5 class="item_price"><?php echo $vlad; ?><?php echo $cost;?> P</h5>
							<p><?php echo $desc;?></p>
							<div class="available">
								
						</div>
							<ul class="tag-men" style="     border-top: 0px solid #C4C3C3; ">
								
							</ul>
								<a class="add-cart item_add cart_order_add" data-product=<?php echo $prod_id?>>Добавить в корзину</a>
							
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="tabs">
					<ul class="menu_drop">
				<li class="item1"><a href="#"><img src="images/arrow.png" alt="">Описание</a>
					<ul style="display: none;">
						<li class="subitem1"><a href="#"><?php echo $desc;?></a></li>
						</ul>
				</li>
				
	 		</ul>
				</div>
				<div class="latestproducts">
					<div class="product-one">
						
					</div>
				</div>
			</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<?php
	require('footer.php');
?>
