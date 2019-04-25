<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 include('application/config/routes.php'); ?>"<?php echo base_url(); ?>
<!DOCTYPE HTML>
<head>
<link rel="icon" href="<?php echo base_url(); ?>assets/images/icon.png">
<title> GadgetPro </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo base_url(); ?>assets/css/util.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo base_url(); ?>assets/css/slider.css" rel="stylesheet" type="text/css" media="all"/>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/startstop-slider.js"></script>

</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			
		<div class="header_top">
					<div class="headertop_desc">
			<div class="account_desc">
					<ul>
						<?php if ($this->session->userdata('is_logged_in')) { 
                            echo '<b>Logged in as:</b> ' . $this->session->userdata('username');
                            echo ' | ' . "<a href=" . site_url('account/logout') . ">Logout</a>";
                        } else {
                    ?>    
                        <a href="<?php echo site_url('account/register'); ?>">Register</a> | 
                        <a href="<?php echo site_url('account/login'); ?>">Login</a>
                    <?php } ?> 
					<?php if(!isset($_SESSION['username'])){echo "<li><a href='/account/register'>Register</a></li>"; } else echo ""; ?>
							<?php if(!isset($_SESSION['username'])){echo "<li><a href='/account/login'>Login</a></li>"; } else echo "<li><a href='/logout'>Logout</a></li>"; ?>

							<?php if(!isset($_SESSION['username'])){echo null; } else echo "<li><a href='/user/edit'>My Account</a></li>"; ?>
							<?php if(!isset($_SESSION['username'])){echo null; } else echo "<li><a href='/shop/wishlist'>Wishlist</a></li>"; ?>
						</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="logo">
				<a href="/"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" /></a>
			</div>