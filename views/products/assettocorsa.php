
<?php $this->load->view('templates/page_header'); ?>
<?php $this->load->view('templates/page_header_bottom'); ?>
<link href="<?php echo base_url(); ?>assets/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<script src="<?php echo base_url(); ?>assets/js/slides.min.jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/slideis.js"></script>
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
<script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
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
											<img class="mySlides" src="<?php echo base_url(); ?>assets/images/games/a1.jpg" alt=" " width="auto" />
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
					<h2>Assetto Corsa</h2>
					<p>Assetto Corsa v1.16 introduces the new "Laguna Seca" laser-scanned track, 7 new cars among which the eagerly awaited Alfa Romeo Giulia Quadrifoglio! </p>					
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
						<p>Assetto Corsa is a racing simulation that attempts to offer a realistic driving experience with a variety of road and race cars through detailed physics and tyre simulation on race tracks recreated through laser-scanning technology. It supports a range of peripherals like mouse, keyboard, wheels, gamepads, triple-displays, TrackIR head tracking and VR head-mounted displays as well as Nvidia 3D Vision and professional motion systems. The software can be extended through modded third-party content.

The game allows to adjust realism settings fitting the experience of the player, ranging from artificial to "factory" or entirely disabled assists. A variety of session modes and session settings are available for offline and online play. Offline campaign, special events, custom championships, hotlap, quick race, drift, drag and race weekend sessions can be played alone or against AI. A server manager tool allows to create servers for online sessions, LAN sessions are also supported.

When joining an offline/online session players can adjust their car through a setup interface. Depending on the car this includes gear ratios, tyre compounds, tyre pressures, fuel, suspension settings like anti-roll bars, wheel rates, ride height, packer rates, travel range, damper settings like bump stops and rebounds, heave dampers, alignment setting, drivetrain settings for differential lock and preload, hybrid settings, adjustments to the wings, brake bias, brake power, engine limiter, etc. Assists like traction control and ABS, turbo boost, KERS, ERS and engine brake settings and brake bias can be adjusted on the fly through hot-keys.</p>
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

