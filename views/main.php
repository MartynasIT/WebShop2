
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
                 <?php if ( $p->Kategorija2 == 'New Products') :?>
                 	
				<div class="grid_1_of_4 images_1_of_4">
					 <a  href='<?php echo site_url('shop/product/'.$p->ProduktoID); ?>'><img src="<?php echo base_url(); ?>assets/images/<?php echo $p->Nuotrauka;?>" alt="" /></a>
					 <h2><?php echo $p->Pavadinimas;?></h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$<?php echo $p->Kaina;?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="<?php echo site_url('shop/add_cart/'.$p->ProduktoID); ?>">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 
				</div>

                 <?php endif;?>
                <?php endforeach;?>

          </div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Featured Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
                <?php foreach ($products as $keys=>$d) :?>
                 <?php if ( $d->Kategorija2 == 'Featured Products') :?>
				<div class="grid_1_of_4 images_1_of_4">
                    <a  href='<?php echo site_url('shop/product/'.$d->ProduktoID); ?>'><img src="<?php echo base_url(); ?>assets/images/<?php echo $d->Nuotrauka;?>" alt="" /></a>
					 <h2><?php echo $d->Pavadinimas;?></h2>
					<div class="price-details">
				       <div class="price-number">
                           <p><span class="rupees">$<?php echo $d->Kaina;?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="<?php echo site_url('shop/add_cart/'.$d->ProduktoID); ?>"> Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>

                    <?php endif;?>
                <?php endforeach;?>
            </div>

 </div>
</div>
<?php $this->load->view('templates/page_footer'); ?>
</body>
</html>