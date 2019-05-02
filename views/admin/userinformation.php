
<?php $this->load->view('templates/PageHeaderAdmin.php'); ?>

<?php $this->load->view('templates/CategoriesAdmin'); ?>
<?php $this->load->view('templates/AdminSlider'); ?>

<?php if (isset ($_SESSION['success'])) {
    ?> <div class="alert alert-success"> <?php echo $_SESSION['success'];?> </div>
    <?php
} ?>
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>User Information</h3>

    		</div>

    		
    		<div class="clear"></div>
    	</div>



              </br>
              </br>


        <form method="post" id="Removeuser" class="variantdisplay">
	      	<?php foreach ($user as $keys=>$p) :?>


<table>

<tr>
   <td style="margin: 10px; width:120px;"><h3><?php echo $p->firstname;?></h3></td>
   <td style="margin: 10px; width:120px;"><h3><?php echo $p->lastname;?></h3></td>
   <td style="margin: 10px; width:220px;"><h3><?php echo $p->email;?></h3></td>
    <form action="http://localhost/Admin/removeUser/<?php echo $p->id;?>" onclick="ConfirmDelete()" id ="user_delete">
      
    
  <td style="margin: 10px; padding: 5px; width:120px;"> <button name = "removeUser" id="user_delete" onclick="return confirm('Are you sure you want to Remove?');" type="submit" > Remove</button><br /></td>
   </form>
</tr>
</table>


                <?php endforeach;?>
            </form>

        <p style="font-family: 'Arial Black'; font-size: large; color: #990000;"><?php echo $links; ?></p>

          </div>
    </div>
 </div>

   <script type="text/javascript">
        function ConfirmDelete() {
            if (confirm('Do you want to delete the user?')) {

                document.getElementById("user_delete").value = "1";


            } else {
                document.getElementById("user_delete").value = "0";
            }
        }

    </script>
 
</body>
</html>