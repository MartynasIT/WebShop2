
<?php $this->load->view('templates/slider'); ?>



<div class="main">
    <div class="content">

        <?php
        if (empty($products))
            echo "Your wishlist is empty!";


        ?>
        <div class="content_top" id="content_top"  style ="visibility: hidden;">

<div class="heading">
           <h3>Your wishlist</h3><br>
                 </div>

            <div id="cartitemlist"  >

                 
            <?php
            if (empty($products))
                echo "Your wishlist is empty!";

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
                                        <th class="column_size" style="margin-left: 10px; width:220px;" >Product</th>
 
                                        <th class="column_price" >Price</th>

                                        <th>&nbsp;</th>
                                    </tr>
                                    <form method="post">

                                    <?php foreach ($products as $key=>$p) :?>



                                    <tr>
                                        <td class="column_size" >
                                            <a href='<?php echo site_url('shop/product/'.$p->p_id); ?>'><h2><?php echo $p->name;?></h2></a><br>
                                        </td>
                                      
                                        <td class="column_priccvve">
                                            <p style="margin-left: 0px; "><h2>$<?php echo $p->price;?></h2></p>
                                            </br>
                                        </td>

                                        <td class="column_button">
                                           <b> <a style="margin-left: 80px; width:70px; height:50px; color: red; font-weight: bold;" name = "remove"  href="<?php echo site_url('shop/remove_wishlist/'.$p->p_id); ?>"> Remove  </a></b> <br>

                                            <?php endforeach;?>
                                    </tr>

                                    </tbody></table>
                            </td>
                        </tr>
                        

                        </tbody>
                </table>

                </form>

            </div>

        </div>

    </div>

        </div>
<?php $this->load->view('templates/page_footer'); ?>
</body>
</html>