
<?php $this->load->view('templates/page_header'); ?>
<?php $this->load->view('templates/page_header_bottom'); ?>

<script>window.twttr = (function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0],
	  t = window.twttr || {};
	if (d.getElementById(id)) return t;
	js = d.createElement(s);
	js.id = id;
	js.src = "https://platform.twitter.com/widgets.js";
	fjs.parentNode.insertBefore(js, fjs);
  
	t._e = [];
	t.ready = function(f) {
	  t._e.push(f);
	};
  
	return t;
  }(document, "script", "twitter-wjs"));</script>
  
  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

</head>

   <div class="main">
		<div class="content">
					<div class="section group">
					<div class="cont-desc span_1_of_2">
					  <div class="product-details">				
						<div class="grid images_3_of_2">
							<div id="container">
							   <div id="products_example">
								   <div id="products">
									<div class="slides_container">
										<div class="slider">
												<div id="slide-1" class="slide">	
											<img class="mySlides" src="<?php echo base_url(); ?>assets/images/slide-1-image.jpg" alt=" " width="auto" />
											<img class="mySlides" src="<?php echo base_url(); ?>assets/images/games/a2.jpg" alt=" "  />
											<img class="mySlides" src="<?php echo base_url(); ?>assets/images/games/a3.jpg" alt=" " />	
											</div>
										</div>		
										</div>
										
									</div>
									
								</div><button class="w3-button w3-display-left"  onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right" onclick="plusDivs(+1)">&#10095;</button>	
							</div>
						</div>
				<div class="desc span_3_of_2">
					<h2>Beats By Dre</h2>
					<p>The Luxe Edition of Beats Solo2 shines in glossy black and delivers even greater comfort thanks to a streamlined, lightweight and durable design. You'll enjoy a more dynamic and wider range of sound, that brings your audio closer to what the artist intended. The flexible, curved headband and ergonomically angled earcups give a custom on ear fit. With a compact folding design for easy portability. Includes a handy carry case to keep your headphones protected when on-the-move. </p>					
					<div class="price">
						<p>Price: <span>$29.99</span></p>
					</div>
				
				<div class="share-desc">
					<div class="share">
						<p>Share Product :</p>
					    	<div class="sharep"><span><iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Flocalhost%2Fpreview.html&layout=button&size=large&mobile_iframe=true&width=74&height=28&appId" width="74" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							 </span>
					    	<span><a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=This%20is%20such%20a%20great%20item%20you%20should%20definitely%20use%20it"   data-size="large">
							  </a></span></div>					    
											</div>
											<div class="sharep"><div class="button"><span><a href="#">Add to Wishlist</a></span></div>
											<div class="button"><span><a href="#">Add to Cart</a></span></div></div>				
					<div class="clear"></div>
				</div>
			</div>
		  </div>
		<div class="product_desc">	
			<div id="horizontalTab">
				<div class="resp-tabs-container">
					<div class="heading">
						<h3>Product Details</h3></div>
					<div class="product-desc">
						<p>Experience improved acoustics and higher fidelity audio no matter what type of music you play.

Easily control your audio using the RemoteTalk cable. You can change songs, adjust the volume and even take calls without picking up your iPhone, iPad or iPod. (Functionality may vary by device. ).

1.36m cord length.
RemoteTalk cord.
In-line volume control.
3.5mm jack .
3.5mm driver.
Carry case.
EAN: 888462603799</p>
								</div>
			
						<br>
				<div class="review">
					<h4>Review by Gedas At</a></h4>
					 <ul>
					 	<li>Price :<img src="<?php echo base_url(); ?>assets/images/price-rating.png" alt="" /></a></li>
					 	<li>Value :<img src="<?php echo base_url(); ?>assets/images/value-rating.png" alt="" /></a></li>
					 	<li>Quality :<img src="<?php echo base_url(); ?>assets/images/quality-rating.png" alt="" /></a></li>
					 </ul>
					 <br>
				  <div class="your-review">
				  	 <h3>How Do You Rate This Product?</h3>
				  	  <p><span>* - Must be included</span></p>
				  	  <form>
					    	<div>
						    	<span><label>Nickname<span class="red">*</span></label></span>
						    	<span><input type="text" value=""></span>
						    </div>
						    <div><span><label>Summary of Your Review<span class="red">*</span></label></span>
						    	<span><input type="text" value=""></span>
						    </div>						
						    <div>
						    	<span><label>Review<span class="red">*</span></label></span>
						    	<span><textarea> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="Submit review"></span>
						  </div>
					    </form>
				  	 </div>				
				</div>
			</div>
		 </div>
	 </div>
	    
        </div>
				<div class="rightsidebar span_3_of_1">
						<div class="categories">
								<ul>
									<h3>Categories</h3>
									<li ><a href="/categories/mobilephone">Mobile Phones</a></li>
									<li><a href="/categories/desktoppc">Desktop Computers</a></li>
									<li><a href="/categories/laptoppc">Laptop Computers</a></li>
									<li><a href="/categories/tv">TV</a></li>
									<li><a href="/categories/accessories">Accessories</a></li>
									<li><a href="/categories/games">Games</a></li>
									<li><a href="/categories/software">Software</a></li>
								</ul>
							  </div>	    				 
 				</div>
 		</div>
 	
    
		 <?php $this->load->view('templates/page_footer'); ?>
		
   <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

