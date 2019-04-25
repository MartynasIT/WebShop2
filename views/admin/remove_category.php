
</head>
<?php if (isset ($_SESSION['success'])) {
    ?> <div class="alert alert-success"> <?php echo $_SESSION['success'];?> </div>
    <?php
} ?>


<form method="post" id="remove_category" class="variantdisplay">
    <h4 id="createuser" style=" margin: 0; position: absolute; left: 37%;font-size: 19px;"> Remove a category</h4>
    </br>
    </br>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <table>
                    <tr>
                        Category:  <select name="category" >

                            <?php foreach ($categories as $keys=>$p) :?>

                            <option value="<?php echo $p->CategoryName;?>"><?php echo $p->CategoryName;?></option>

                            <?php endforeach;?>


                            <input  type="hidden" style="font-size:10pt;height:50px" name="category_delete" id ="category_delete" value="0" size="30" maxlength="9000">
                        </select>

                    <tr>
                         <td class="p-t-13 p-b-14 p-l-71"><button class="login100-form-btn" name="remove_category" id="category_delete" onclick="ConfirmDelete()" type="submit">Remove</button></td>
                    </tr>
            </div>
        </div>
    </div>

    </table>



    <script type="text/javascript">
        function ConfirmDelete() {
            if (confirm('Do you want to delete category?')) {

                document.getElementById("category_delete").value = "1";


            } else {
                return false;
            }
        }

    </script>

<p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
<div class="clear"></div>
<?php $this->load->view('templates/page_footer'); ?>