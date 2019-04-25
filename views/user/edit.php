<p>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</p>
<?php $attributes = array("name" => "registrationform");
echo form_open("user/edit", $attributes);?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            
<table class="p-b-14 p-l-14">

    <tr>  
      <td><label  for="name">First Name</label></td>  <td><input class="input100" name="firstname" class="form-control" placeholder="First Name" type="text" value="<?php echo $user['firstname'];?>" /> <span style="color:red"><?php echo form_error('firstname'); ?></span></td>
    </tr>    
    <tr>
        <td><label for="name">Last Name</label></td><td><input class="input100" class="form-control" name="lastname" placeholder="Last Name" type="text" value="<?php echo $user['lastname'];?>"  /> <span style="color:red"><?php echo form_error('lastname'); ?></span></td>
    </tr>
    
    <tr>
        <td><label for="city">Country</label></td><td><input class="input100" class="form-control" name="country" placeholder="Country" type="text" value="<?php echo $user['country'];?>"  /> <span style="color:red"><?php echo form_error('country'); ?></span></td>
    </tr>
    <tr>
        <td><label for="city">City</label></td><td><input class="input100" class="form-control" name="city" placeholder="City" type="text" value="<?php echo $user['city'];?>"  /> <span style="color:red"><?php echo form_error('city'); ?></span></td>
    </tr>
    <tr>
        <td><label for="address">Address</label></td><td><input class="input100" class="form-control" name="address" placeholder="Address" type="text" value="<?php echo $user['address'];?>"  /> <span style="color:red"><?php echo form_error('address'); ?></span></td>
    </tr>

    <tr>
        <td><label for="telephoneno"> Telephone No.</label></td><td><input class="input100" class="form-control" name="telephoneno" placeholder="Telephone No." type="text" value="<?php echo $user['telephoneno'];?>"  /> <span style="color:red"><?php echo form_error('telephoneno'); ?></span></td>
    </tr>


        <td><label for="subject">Password</label></td><td><input class="input100" class="form-control" name="password" placeholder="Password" type="password" /> <span style="color:red"><?php echo form_error('password'); ?></span></td>
    </tr>    
    <tr>    
        <td class="p-t-13"><label for="subject">Confirm Password</label></td><td><input class="input100" class="form-control" name="cpassword" placeholder="Confirm Password" type="password" /> <span style="color:red"><?php echo form_error('cpassword'); ?></span></td>
    </tr>    
    <tr>    
     <td></td>   <td class="p-t-13 p-b-14 p-l-71"><button class="login100-form-btn" name="edit" type="submit">Confirm</button></td>
    </tr>
    </div>
    </div>
    </div>
        <div class="container-login100-form-btn p-b-15 ">    
    <span class="register-form-title p-b-15 ">
						Edit your details
                    </span> </div></div>
                    
</table>    <div class="flex-col-c">
						
</div>
<?php echo form_close(); ?>
 
<p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
