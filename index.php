<?php
	require('header.php');
?>
	
	<!--banner-starts-->
	<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
			    <li>
					<img src="images/bnr-1.jpg" alt=""/>
				</li>
				<li>
					<img src="images/bnr-2.jpg" alt=""/>
				</li>
				<li>
					<img src="images/bnr-3.jpg" alt=""/>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--banner-ends--> 
	<!--Slider-Starts-Here-->
	<script src="js/responsiveslides.min.js"></script>
	<script>
	// You can also use "$(window).load(function() {"
	$(function () {
		// Slideshow 4
		$("#slider4").responsiveSlides({
			auto: true,
			pager: true,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			before: function () {
				$('.events').append("<li>before event fired.</li>");
			},
			after: function () {
				$('.events').append("<li>after event fired.</li>");
			}
		});

	});
	</script>
	<!--End-slider-script-->
	<!--product-starts-->
	<div class="product"> 
		<div class="container" style="margin-bottom: 25px; margin-top: 10px;">
			<div class="product-top" ;">
				<?php  
					  
					  include ("bd.php");
					    if ($result = $db->query("SELECT * FROM `product` limit  8")) 
                      {
                         
                          $i = 0;
                          while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
                            {
                                if($i == 0 )
                                {
                                    echo "<div class=\"product-one\">";
                                } else if( $i % 4 == 0)
                                {
                                   echo "<div class=\"clearfix\"></div></div><div class=\"product-one\">"; 
                                }
                                
                                $image = $myrow['product_image'];
                                $name = $myrow['product_name'];
                                $price = $myrow['product_price'];
                                $id = $myrow['product_id'];
                    	echo "<div class=\"col-md-3 product-left\">
							<div class=\"product-main simpleCart_shelfItem\">
								<a href=\"single.php?id=$id\" class=\"mask\"><img class=\"img-responsive zoom-img\" src=\"$image\" alt=\"\"></a>
								<div class=\"product-bottom\">
									<h3>$name</h3>
									<h4><span class=\"item_add cart_order_add\" data-product=$id><i></i></a> <span class=\" item_price\">$price P</span></h4>
								</div>
								
							</div>
						</div>";
						$i = $i + 1;
						}
						}?>
						
				</div>					
			</div>
		</div>
	
	<!--product-end-->

<?php
	require('footer.php');
?>
