

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



   <div class="main">
		<div class="content">
					<div class="section group">
					<div class="cont-desc span_1_of_2">
					  <div class="product-details">				
						<div class="grid images_3_of_2">
                         <img src="<?php echo base_url(); ?>assets/images/<?php echo $product['Nuotrauka']; ?>" alt="" />

						</div>
				<div class="desc span_3_of_2">
					<h2> <?php echo $product['Pavadinimas']; ?></h2>
					<p> <?php echo $product['TrumpasApras']; ?> </p>
					<div class="price">
						<p>Price: <span>$ <?php echo $product['Kaina']; ?></span></p>
					</div>
				
				<div class="share-desc">
					<div class="share">
						<p>Share Product :</p>
					    	<div class="sharep"><span><iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Flocalhost%2Fpreview.html&layout=button&size=large&mobile_iframe=true&width=74&height=28&appId" width="74" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							 </span>
					    	<span><a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=This%20is%20such%20a%20great%20item%20you%20should%20definitely%20use%20it"   data-size="large">
							  </a></span></div>					    
											</div>
						   <div class='sharep'><div class='button'><span><a href="<?php echo site_url('shop/add_wishlist/'. $product['ProduktoID']); ?>">Add to Wishlist</a></span></div>

					<div class='button'><span><a href="<?php echo site_url('shop/add_cart/'. $product['ProduktoID']); ?>"> Add to Cart</a></span></div>

											</div>				
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
						<p> <?php echo $product['Aprasymas']; ?></p>
								</div>
			
						<br>

                    <form method="post">
				<div class="review">

					 <br>

                    <div id = 'login' style ="visibility: hidden;">

                        <p style="text-align: center; color: #990000; font-size: medium"> To review you must login!</p>
                    </div>

				  <div class="your-review" id  = "your-review" style ="visibility: hidden;">
				  	 <h3>How Do You Rate This Product?</h3>
				  	  <p><span>* - Must be included</span></p>
				  	  <form>


						    <div>
						    	<span><label>Review<span class="red">*</span></label></span>
                                <textarea rows="4" cols="50" name="review" required>
</textarea>
						    </div>

                          <input id = "pid" name = "pid" type="hidden" value="<?php echo $product['ProduktoID']; ?>">
						   <div>

						   		<span><input name="postreview" type="submit" value="Submit review"></span>
						  </div>
					    </form>
				  	 </div>
				</div>

                        <div id = 'all'>

                        <?php foreach ($reviews as $keys=>$p) :?>

                        </br>



                        <div id = "reviews" style="   border-radius: 25px; border: 2px solid  #990000;  padding: 20px;
  ">


                            <p style="display: inline-block; font-size: large; color: #990000; font-family: 'Arial Black';">  <?php echo $p->cname;?>  </p>



                                <p  style="display: inline; margin-left: 65%; position:relative;">   <?php echo $p->date;?>  </p>


                            </br>
                            </br>


                            <p style="font-size: large; font-family: 'Times New Roman';"> <?php echo $p->review;?> </p>


                        </div>

                        <?php endforeach;?>
                        </div>
			</div>
		 </div>
	 </div>

        </div>

 		</div>
 	

		
   <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>

            <?php
            if ($_SESSION['is_logged_in'] ==  true)
            {

                ?>
                <script type="text/javascript">document.getElementById('your-review').style.visibility = 'visible';</script>
            <?php
            }

            else
            {

            ?>
                <script type="text/javascript">document.getElementById('login').style.visibility = 'visible';</script>
                <script type="text/javascript">document.getElementById('your-review').style.visibility = 'hidden';</script>
            <script type="text/javascript"> $('#your-review').html(''); </script>
                <?php
            }
            ?>
</body>
</html>

