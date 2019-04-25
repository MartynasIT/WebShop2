<p>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</p>
 
 
<?php $attributes = array("name" => "registrationform");
echo form_open("user/register", $attributes);?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
<table>

    <tr>  
      <td><label  for="name">First Name</label></td>  <td><input class="input100" name="firstname" class="form-control" placeholder="First Name" type="text" value="<?php echo set_value('fname'); ?>" /> <span style="color:red"><?php echo form_error('firstname'); ?></span></td>
    </tr>    
    <tr>
        <td><label for="name">Last Name</label></td><td><input class="input100" class="form-control" name="lastname" placeholder="Last Name" type="text" value="<?php echo set_value('lname'); ?>" /> <span style="color:red"><?php echo form_error('lastname'); ?></span></td>
    </tr> 
    <tr>  
      <td><label  for="name">Telephone no.</label></td>  <td><input class="input100" name="telephoneno" class="form-control" placeholder="Telephone no." type="text" value="<?php echo set_value('telephoneno'); ?>" /><?php echo form_error('telephoneno'); ?> <span style="color:red"></span></td>
    </tr>
     <tr>  
      <td><label  for="name">Country</label></td>  <td><input class="input100" name="country" class="form-control" placeholder="Country" type="text" value="<?php echo set_value('country'); ?>" /><?php echo form_error('country'); ?> <span style="color:red"></span></td>
    </tr>    
     <tr>    
        <td><label for="name">City</label></td><td><input class="input100" class="form-control" name="city" placeholder="City" type="text" value="<?php echo set_value('city'); ?>" /><?php echo form_error('city'); ?>  <span style="color:red"></span></td>
    </tr> 
    <tr>
        <td><label for="name">Address</label></td><td><input class="input100" class="form-control" name="address" placeholder="Address" type="text" value="<?php echo set_value('address'); ?>" /><?php echo form_error('address'); ?> <span style="color:red"></span></td>
    </tr>    
      
    <tr>    
        <td><label for="email">Email ID</label></td><td><input class="input100" class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" /> <span style="color:red"><?php echo form_error('email'); ?></span></td>
    </tr>
       
    <tr>    
        <td><label for="subject">Password</label></td><td><input class="input100" class="form-control" name="password" placeholder="Password" type="password" /> <span style="color:red"><?php echo form_error('password'); ?></span></td>
    </tr>    
    <tr>    
        <td class="p-t-13"><label for="subject">Confirm Password</label></td><td><input class="input100" class="form-control" name="cpassword" placeholder="Confirm Password" type="password" /> <span style="color:red"><?php echo form_error('cpassword'); ?></span></td>
    </tr>    
    <tr>    
     <td></td>   <td class="p-t-13 p-b-14 p-l-71"><button class="login100-form-btn" name="submit" type="submit">Signup</button></td>        
    </tr>
    </div>
    </div>
    </div>
        <div class="container-login100-form-btn p-b-35 ">    
    <span class="register-form-title">
						Register
                    </span> </div></div>
                    
</table>    <div class="flex-col-c">
						<span class="txt1 p-b-9" >
							Already have an account?
						</span>

						<a href="/user/login" class="txt3" >
							Log in now
						</a></div>
<?php echo form_close(); ?>
 
<p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
