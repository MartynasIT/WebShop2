
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

                        <p> Image: <br></p>

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

                        <div class="desc span_3_of_2">
                            <p> Product Name:<br> <input type="text" style="font-size:10pt;height:30px" name="product_name" value="" size="30" maxlength="9000">  </p>
                            <p> Short Description: <input type="text" style="font-size:10pt;height:50px" name="product_shortdescr" value="" size="70" maxlength="9000">  </p>
                            <div class="price">
                                <p>Price: <br> <span>$ <input type="text" name="product_price" value="" size="30" maxlength="50"> </span></p>
                            </div>

                         <p> Category: <br>  <select name="product_category1" >

                                <option value="None">None</option>



                                 <?php foreach ($categories as $keys=>$d) :?>
                                     <option value="<?php echo  $d->CategoryName;?>"><?php echo  $d->CategoryName;?></option>

                                 <?php endforeach;?>



                             </select></p>

<p>Subcategory: <br>  <select name="product_category2" ">

                            <option value="none">None</option>

                            <option value="New Products">New Products</option>



                            <option value="Featured Products">Featured Products</option>


                            </select>
                           
                            <div class="product-desc">
                               <p>  Full Desicription: <br> <input type="text" style="font-size:10pt;height:50px" name="product_description" value="" size="90" maxlength="9000"></p>
                            </div>
                            <div class="clear"></div><div class="grid images_3_of_2">
         
                        </div>
                        </div>
                    </div>
                </div>
              </p>
                <div class="product_desc">
                    <div id="horizontalTab">
                        <div class="resp-tabs-container">

                            <div class="clear">

                            <br/>

                        
                         <button class="login100-form-btn" name = "add"> Create a new product</button>

                            </br>
                            </br>

                           

</form>

<br>

</div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

