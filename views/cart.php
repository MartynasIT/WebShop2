<br>
<img src="<?php echo base_url(); ?>assets/images/orders.jpg" alt="learn more"  />

<div class="main">
    <div class="content">

        <?php
        if (empty($products))
            echo "Your cart is empty!";


        ?>
        <div class="content_top" id="content_top"  style ="visibility: hidden;">

<div class="heading">
           <h3>Your Cart</h3>
                 </div>
            <div id="cartitemlist"  >

            <?php
            if (empty($products))
                echo "Your cart is empty!";

            else
            {

                ?>
                <script type="text/javascript">document.getElementById('content_top').style.visibility = 'visible';</script>
                <?php
            }
            ?>



                <table width="100%">



                        <input type="hidden" name="formName" value="UpdateCart">
                        <tbody>
                        <tr>
                            <td valign="top">
                                <table class="cart_table">
                                    <tbody><tr>
                                        <th class="column_size" style="margin-left: 10px; width:160px;" >Product</th>
                                        <th class="column_qty" style="margin: 10px; width:220px;">Quantity</th>
                                        <th class="column_price" >Price</th>

                                        <th>&nbsp;</th>
                                    </tr>
                                    <form method="post">

                                    <?php foreach ($products as $key=>$p) :?>



                                    <tr>
                                        <td class="column_size" >
                                            <a href='<?php echo site_url('shop/product/'.$p->p_id); ?>'> <?php echo $p->name;?></a><br>
                                        </td>
                                        <td class="column_qty">

                                                </a> </button>  <input  type="text" name="Quantity" id="Quantity" style="margin-left: 80px; " value=" <?php echo $p->qty;?>" size="2" maxlength="2" readonly="readonly">
                                            <a style="color: black" href="<?php echo site_url('shop/decrease_cart/'.$p->p_id); ?>">-
                                                </a>
                                            <a style="color: black" href="<?php echo site_url('shop/increase_cart/'.$p->p_id); ?>"> + </a>
                                            <br>
                                        </td>
                                        <td class="column_priccvve">
                                            <p style="margin-left: 0px; ">$<?php echo $p->price;?></p>
                                            </br>
                                        </td>

                                        <td class="column_button">
                                            <button style="margin-left: 80px; " name = "remove"> <a style="color: black" href="<?php echo site_url('shop/remove_cart/'.$p->p_id); ?>"> Remove </a> </button><br>

                                            <?php endforeach;?>
                                    </tr>

                                    <tr>
                                        <td class="column_price subtotal" colspan="3">
                                            <b>Total: $<?php echo $total ?></b><br>
                                        </td>

                                        <td>
                                            <br>
                                        </td>
                                    </tr>

                                    </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">

                              <button  name = "checkout"> Checkout </button>

                            </td>

                        </tr>

                        </tbody>
                </table>

                </form>

            </div>

        </div>
    <li><a href="/Welcome" >Pay</a></li>

    </div>
    <html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
      background-color: #555;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      padding: 10px;
      background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
      opacity: 1;
    }
    </style>
    </head>
    <body>


        </div>
      <input type="submit" name="submit" action="applcation/TxnTest.php" value="Order">
<?php $this->load->view('templates/page_footer'); ?>
</body>
</html>
