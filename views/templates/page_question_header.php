<!DOCTYPE HTML>
<head>
<link rel="icon" href="images/icon.png">	
<title> FAQ | Home Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo base_url(); ?>assets/css/util.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.accordion.js"></script>

</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
        <div class="account_desc">
					<ul><?php if ($this->session->userdata('is_logged_in')) { 
						   $useris = $this->session->userdata('email'); 
						   echo "<li><a href='/account/myaccount'>Logged in as: $useris</a>" ;
                        } else {
                    ?>    
                        
                    <?php } ?>
					<?php if(!isset($_SESSION['email'])){echo "<li><a href='/user/register'>Register</a></li>"; } else echo ""; ?>
							<?php if(!isset($_SESSION['email'])){echo "<li><a href='/user/login'>Login</a></li>"; } else echo "<li><a href='/user/logout'>Logout</a></li>"; ?>
							<?php if(!isset($_SESSION['email'])){echo null; } else echo "<li><a href='/user/edit'>My Account</a></li>"; ?>
							<?php if(!isset($_SESSION['email'])){echo null; } else echo "<li><a href='/shop/wishlist'>Wishlist</a></li>"; ?>
						</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
				<div class="logo">
						<a href="/shop"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" height=100px width=160px /></a>
					</div>
					
					<div class="welcome">
					
					</div>
            <div class="cart">
                <p><span>Cart:</span><div id="dd" class="wrapper-dropdown-2"> <a href="<?php echo base_url(); ?>shop/cart" style="color: #000000">  <?php echo $_SESSION ['cart'];?> item(s) - $<?php echo $_SESSION ['total'];?>   </a>
                </div></p>

            </div>

	 <div class="clear"></div>
  </div>
  <div class="header_bottom">
	     	<div class="menu">
	     		<ul>
                    <li><a href="/shop">Home</a></li>
                    <li><a href="/information/about">About</a></li>
                    <li><a href="/information/delivery">Delivery</a></li>
                    <li><a href="/information/orders_and_returns">Orders and Returns</a></li>
                    <li><a href="/information/news">News</a></li>
                    <li><a href="/questions/faq">Frequently Asked Questions</a></li>
                    <li><a href="<?php echo site_url('shop/filter'); ?>">Filter</a></li>
                    <li><a href="<?php echo site_url('shop/chat'); ?>">Chat</a></li>

			    	<div class="clear"></div>
     			</ul>
	     	</div>

	     	<div class="clear"></div>
	     </div>