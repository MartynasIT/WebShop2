
<?php $this->load->view('templates/slider'); ?>
<style>




    .tutorial-table th {
        background-color: #f5f5f5;
        padding: 20px 20px;
        text-align: center;
    }

    .tutorial-table td {
        border-bottom: #f0f0f0 1px solid;
        background-color: #ffffff;
        padding: 10px 50px;
    }



    .btn-submit {
        margin-top: 20px;
        padding: 10px 20px;
        background: #FFF;
        border: #aaa 1px solid;
        border-radius: 4px;
        margin: 20px 0px;
    }

    #min {
        float: left;
        width: 30px;
        padding: 5px 10px;
        margin-right: 14px;
    }

    #slider-range {
        width: 90%;
        float: left;
        margin: -20px 0px 5px 0px;
    }

    #max {
        float: right;
        width: 40px;
        padding: 5px 10px;

    }

</style>

<?php

$min = 0;
$max = 1000;

if (! empty($_POST['min_price'])) {
    $min = $_POST['min_price'];
}

if (! empty($_POST['max_price'])) {
    $max = $_POST['max_price'];


}

?>

<div align="center"</div>
<h2>Price filter</h2>
    </div>
    <link rel="stylesheet"
          href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script type="text/javascript">

        $(function() {
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 3000,
                values: [ <?php echo $min; ?>, <?php echo $max; ?> ],
                slide: function( event, ui ) {
                    $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                    $( "#min" ).val(ui.values[ 0 ]);
                    $( "#max" ).val(ui.values[ 1 ]);
                }
            });
            $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) );
        });
    </script>
    </div>

    <div class="form-price-range-filter" align="center">
        <form method="post" action="">
            <div>
                <br>
                <br>
                <input type="" id="min" name="min_price"
                       value="<?php echo $min; ?>">
                <div id="slider-range"></div>
                <input type="" id="max" name="max_price"
                       value="<?php echo $max; ?>">
            </div>
            <div>
                <input type="submit" name="submit_range"
                       value="Filter Product" class="btn-submit">
            </div>
        </form>
    </div>


    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="heading">
                    <h3>Filtered Products</h3>

                </div>


                <div class="clear"></div>
            </div>

            <div class="section group">

    <?php

    $conn = mysqli_connect("localhost", "root", "", "GadgetPro");

    $result = mysqli_query($conn, "select * from produktai where Kaina BETWEEN '$min' AND '$max'" );

    $count = mysqli_num_rows($result);
    //$output = '';
    if ($count > 0) {
    ?>




 <?php

		while ($row = mysqli_fetch_array($result)) {
				?>

                <div class="grid_1_of_4 images_1_of_4">
                    <a  href='<?php echo site_url('shop/product/'.$row['ProduktoID']); ?>'><img src="<?php echo base_url(); ?>assets/images/<?php echo $row['Nuotrauka'];?>" alt="" /></a>
                    <h2><?php echo $row['Pavadinimas'];?></h2>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="rupees">$<?php echo $row['Kaina'];?></span></p>
                        </div>
                        <div class="add-cart">
                            <h4><a href="<?php echo site_url('shop/add_cart/'.$row['ProduktoID']); ?>">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>

                </div>





<?php

		} // end while
}


    else {
        ?>
        <div class="no-result">No Results</div>
        <?php
    }

    mysqli_free_result($result);

    mysqli_close($conn);


    ?>



        </div>


    </div>
</div>
</body>
</html>