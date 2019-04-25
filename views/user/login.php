<p>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</p>
 

<?php $attributes = array("name" => "loginform");
echo form_open("user/login", $attributes );?>

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
            
            <table><tr><td><label for="signin"><span class="login100-form-title">
						Sign In</td></label>
					</span></tr>
    <tr>   
        <td> <label for="email">Email</label></td><td ><input class="input100" class="form-control" name="email" placeholder="Email-ID" type="text" /> <span style="color:red"><?php echo form_error('email'); ?></span></td>
    </tr>    
    <tr>    
        <td><label for="subject">Password</label></td><td><input  class="input100" class="form-control" name="password" placeholder="Password" type="password" /> <span style="color:red"><?php echo form_error('password'); ?></span></td>
    </tr>        
    <tr>    
        <td></td>
        <td class="p-t-13 p-l-143"><button class="login100-form-btn" name="submit" type="submit">Login</button></td>        
    </tr><tr>
    <div class="container-login100-form-btn p-b-20 ">    
    <span class="login100-form-title bottom=675">
						Sign In
					</span> </div></div>
    </div>
    </div>
</table>   

    <div class="flex-col-c">
						<span class="txt1 p-b-9" >
							Don’t have an account?
						</span>

						<a href="/user/register" class="txt3" >
							Sign up now
						</a></div>
<?php echo form_close(); ?>
 
<p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
