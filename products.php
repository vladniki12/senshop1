<?php
	require('header.php');
	
?>
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="http://eventsun.ru">Главная</a></li>
					<?php
				    	include ("bd.php");
				    	if (isset($_GET['id'])) { $id = $_GET['id'];}
				    	if( $id >5 || $id<1 || !$id || $id == '')
				    	{
				    	   echo "<li class=\"active\">Каталог</li>"; 
				    	} else {
				    
                      
                      if ($result = $db->query("SELECT * FROM `product_type` where type_id=$id")) 
                      {
                          while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
                            {
                                $name = $myrow['type_name'];
                          
                                     echo "<li class=\"active\">$name</li>";
                            }
                                     
                      }
				    	}
                      
                     
					
					?>
				</ol>
			</div>
		</div>
	</div>
	<div class="prdt"> 
		<div class="container">
			<div class="prdt-top">
				<div class="col-md-9 prdt-left" style="    width: 100%;">
					
					  <?php  
					  if (isset($_GET['id'])) { $id = $_GET['id'];}
					  $th = "";
					  if( $id < 6 && $id>0)
				    	{
				    	   $th = "WHERE product_type=$id";
				    	} 
					    if ($result = $db->query("SELECT * FROM `product` $th")) 
                      {
                          $i = 0;
                          while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
                            {
                                if($i == 0 )
                                {
                                    echo "<div class=\"product-one\">";
                                } else if( $i % 3 == 0)
                                {
                                   echo "<div class=\"clearfix\"></div></div><div class=\"product-one\">"; 
                                }
                                
                                $image = $myrow['product_image'];
                                $product_image = "img_product/".$image;
                                $name = $myrow['product_name'];
                                $price = $myrow['product_price'];
                                $id = $myrow['product_id'];
                    	echo "<div class=\"col-md-4 product-left p-left\">
							<div class=\"product-main simpleCart_shelfItem\">
								<a href=\"single.php?id=$id\" class=\"mask\"><img class=\"img-responsive zoom-img\" src=\"$product_image\" alt=\"\"></a>
								<div class=\"product-bottom\">
									<h3>$name</h3>
									<h4><span data-product=$id class=\"item_add cart_order_add\"><i></i></span> <span class=\" item_price\">$price P</span></h4>
								</div>
								
							</div>
						</div>";
						$i = $i + 1;
						}
						}?>
					</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	require('footer.php');
?>
