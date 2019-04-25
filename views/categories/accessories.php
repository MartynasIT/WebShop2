
 <?php $this->load->view('templates/page_head'); ?>
<?php $this->load->view('templates/page_header'); ?>
<?php $this->load->view('templates/page_categories'); ?>
 <?php $this->load->view('templates/slider'); ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
   		
    		<div class="clear"></div>
    	</div>   
		
				<div class="section group">
              <?php foreach ($products as $keys=>$p) :?>
              <?php if ( $p->Kategorija == 'Accessories') :?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href='<?php echo site_url('shop/product/'.$p->ProduktoID); ?>'><img src="<?php echo base_url(); ?>assets/images/<?php echo $p->Nuotrauka;?>" alt="" /></a>
					 <h2><?php echo $p->Pavadinimas;?></h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$<?php echo $p->Kaina;?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview ">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 
				</div>
                  <?php endif;?>
              <?php endforeach;?>

   
			
    </div>
 </div>
		
 </div>
</div>
<?php $this->load->view('templates/page_footer'); ?>
</body>
</html>