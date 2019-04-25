<div class="header_bottom">
	     	<div class="menu">
	     		<ul>

			    	<li><a href="<?php echo site_url('shop'); ?>">Home</a></li>
			    	<li><a href="/information/about">About</a></li>
					<li><a href="/information/delivery">Delivery</a></li>
					<li><a href="/information/orders_and_returns">Orders and Returns</a></li>
			    	<li><a href="/information/news">News</a></li>
                    <li><a href="/questions/faq">Frequently Asked Questions</a></li>
                    <li><a href="<?php echo site_url('shop/filter'); ?>">Filter</a></li>
                    <li><a href="<?php echo site_url('shop/chat'); ?>">Chat</a></li>
				
					<li><form action="<?php echo site_url('search/search_keyword');?>" method = "post">
                        <input style="display: block; width: 200px;  margin: 0 0 0em; margin-left: 35px;  margin-top: 1em;   ;" type="text" name = "keyword" />
                        <input type="submit" style="display: block; margin-left: 240px; margin-top: -20px; " value = "Product Search" />


                      </form></li>


			    	<div class="clear"></div>
     			</ul>
	     	</div>

	     	<div class="clear"></div>
	     </div>
	<div class="header_slide">
			<div class="header_bottom_left">
				<div class="categories">
				  <ul>
                      
                      <h3>Categories</h3>
                      <?php foreach ($categories as $keys=>$p) :?>
				      <li><a href="<?php echo base_url(); ?>Shop/category/<?php echo  $p->CategoryName;?>"><?php echo  $p->CategoryName;?></a></li>

                      <?php endforeach;?>
				  </ul>
				</div>

			   </div>
			 </br>
