

</head>
<?php if (isset ($_SESSION['success'])) {
    ?> <div class="alert alert-success"> <?php echo $_SESSION['success'];?> </div>
    <?php
} ?>


<form method="post" id="add_category" class="variantdisplay">
<h4 id="createuser" style=" margin: 0; position: absolute; left: 37%;font-size: 19px;"> Create a category</h4>
</br>
</br>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <table>
                <tr>
                    <td><label  for="category">Category Name</label></td>  <td><input class="input100" name="category" class="form-control" placeholder="category" type="text" value="<?php echo set_value('Category'); ?>" /> <span style="color:red"><?php echo form_error('category'); ?></span></td>
                </tr>

                <tr>
                    <td></td>   <td class="p-t-13 p-b-14 p-l-71"><button class="login100-form-btn" name="add_cat" type="submit">Submit</button></td>
                </tr>
        </div>
    </div>
</div>
</table>
</form>

<p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
<div class="clear"></div>
<?php $this->load->view('templates/page_footer'); ?>