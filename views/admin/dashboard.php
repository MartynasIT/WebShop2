
<?php $this->load->view('templates/PageHeaderAdmin.php'); ?>

<?php $this->load->view('templates/CategoriesAdmin'); ?>
<?php $this->load->view('templates/AdminSlider'); ?>

<?php if (isset ($_SESSION['success'])) {
    ?> <div class="alert alert-success"> <?php echo $_SESSION['success'];?> </div>
    <?php
} ?>


<?php echo validation_errors('<div class="alert alert-danger" >','</div>'); ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<a id="edit"><h3>Edit Products</h3></a>

    		</div>

    		
    		<div class="clear"></div>
    	</div>

	      <div class="section group">
	      	<?php foreach ($products as $keys=>$p) :?>

                 	
				<div class="grid_1_of_4 images_1_of_4">
					 <a  href='<?php echo site_url('Admin/product/'.$p->ProduktoID); ?>'><img src="<?php echo base_url(); ?>assets/images/<?php echo $p->Nuotrauka;?>" alt="" /></a>
					 <h2><?php echo $p->Pavadinimas;?></h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$<?php echo $p->Kaina;?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href='<?php echo site_url('Admin/product/'.$p->ProduktoID); ?>'>Edit</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 
				</div>


                <?php endforeach;?>

          </div>
    </div>
 </div>
<?php $this->load->view('templates/page_footer'); ?>
</body>
</html>