


</head>
<?php if (isset ($_SESSION['success'])) {
    ?> <div class="alert alert-success"> <?php echo $_SESSION['success'];?> </div>
    <?php
} ?>


<?php echo validation_errors('<div class="alert alert-danger" >','</div>'); ?>



   <div class="main">
		<div class="content">
					<div class="section group">
					<div class="cont-desc span_1_of_2">
					  <div class="product-details">				
						<div class="grid images_3_of_2">



                     <img src="<?php echo base_url(); ?>assets/images/<?php echo $product['Nuotrauka']; ?>" alt="" />


                            <p style="font-size: large; "> New Image: <br></p>

                            <?php echo form_open_multipart('upload_controller/do_upload');?>
                            <?php echo "<input type='file' name='userfile' size='20' />"; ?>
                            <?php echo "<input type='submit' name='submit' value='upload' /> ";?>
                            <?php echo "</form>"?>

                            <?php



                            if( $this->session->userdata['image']  != 'Upload failed' &&  $this->session->userdata('image')  ) {


                                echo "<p style='color: darkgreen;'> Image uploaded: <p>";  echo $this->session->userdata['image'];


                            }
                            else
                            {
                                echo $this->session->userdata['image'];
                            }
                            ?>

                            <form method="post" id="edit" class="variantdisplay">

                        </div>
				<div class="desc span_3_of_2">
					Product name:<h2> <input  type="text" style="font-size:10pt;height:50px" name="product_name" value="<?php echo $product['Pavadinimas'];?>" size="30" maxlength="9000">  </h2>
					Short description:<p> <input  type="text" style="font-size:10pt;height:50px" name="product_shortdescr" value="<?php echo $product['TrumpasApras'];?>" size="70" maxlength="9000">  </p>
					<div class="price">
						Price:<p> <span>$ <input type="text" name="product_price" value="<?php echo $product['Kaina'];?>" size="30" maxlength="50"> </span></p>
					</div>
				<div class="product-desc">
                        Description:<p> <input type="text" style="font-size:10pt;height:50px" name="product_description" value="<?php echo $product['Aprasymas'];?>" size="90" maxlength="9000">  </p>
                                </div>
                    <input type="hidden" name="photo" id = "photo" value="<?php echo $product['Nuotrauka']; ?>" />
                    Category:  <select name="product_category1" >


                        <option value="<?php echo $product['Kategorija'];?>"><?php echo $product['Kategorija'];?></option>



                        <?php foreach ($categories as $keys=>$d) :?>
                        <option value="<?php echo  $d->CategoryName;?>"><?php echo  $d->CategoryName;?></option>

                        <?php endforeach;?>


                    </select>

                    </br>
                    </br>

                    <H1>Subcategory:</H1>   <select name="product_category2" >

                    <option value="New Products"><?php echo $product['Kategorija2'];?></option>

                        <option value="New Products">None</option>
                    <option value="New Products">New Products</option>



                    <option value="Featured Products">Featured Products</option>





                    </select>


                    <H1>ID:</H1>   <select name="product_id">

                        <option   value="<?php echo $product['ProduktoID'];?>"><?php echo $product['ProduktoID'];?></option>

                    </select>
<br>
                    <input  type="hidden" style="font-size:10pt;height:50px" name="product_delete" id ="product_delete" value="0" size="30" maxlength="9000">
                    <button name = "update"> Update</button>   <button name = "remove" onclick="ConfirmDelete()"> Remove</button><br />
                    <div class="clear"></div>
				</div>

			</div>
		  </div>
		<div class="product_desc">	
			<div id="horizontalTab">
				<div class="resp-tabs-container">
                    <div class="clear"></div>
			</div>
		 </div>
	 </div>
	    




  <script type="text/javascript">
    function ConfirmDelete() {
       if (confirm('Do you want to delete the product?')) {

           document.getElementById("product_delete").value = "1";


       } else {
           return false;
       }
    }

</script>

   <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

