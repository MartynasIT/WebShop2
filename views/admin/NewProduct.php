<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>

</head>
<?php if (isset ($_SESSION['success'])) {
    ?> <div class="alert alert-success"> <?php echo $_SESSION['success'];?> </div>
    <?php
} ?>


<?php echo validation_errors('<div class="alert alert-danger" >','</div>'); ?>

<form method="post" id="edit" class="variantdisplay">

    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="cont-desc span_1_of_2">
                    <div class="product-details">

                        <div class="desc span_3_of_2">
                            <p> Product Name:<br> <input type="text" style="font-size:10pt;height:50px" name="product_name" value="" size="30" maxlength="9000">  </p>
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



                            <option value="Phone">PS4</option>



                            <option value="Accesories">Xbox One</option>



                            <option value="Desktop PC">PS4</option>



                            <option value="Game">PC</option>



                            <option value="Laptop">Dell</option>


                            </select>
                           
                            <div class="product-desc">
                               <p>  Full Desicription: <br> <input type="text" style="font-size:10pt;height:50px" name="product_description" value="" size="90" maxlength="9000"></p>
                            </div>
                            <div class="clear"></div><div class="grid images_3_of_2">
                        <p> Image: <br></p>  <input type="text" style="font-size:10pt;height:50px" name="product_image" value="" size="30" maxlength="50">
                        <br>
<input type = "file" name = "image" accept="image/*" />
         
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

