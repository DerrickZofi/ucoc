<?php 
error_reporting(E_ALL);
ini_set("display_errors",'On');
?>
<?php include "includes/header.php"; ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['username'];?></small>
                          
                        </h1>

                      
                    </div>

 
                    <div class="col-md-6">
                        <h4>Add Payment</h4>

                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="FUTBGVQWQHADG">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


                    </div>

                    
                </div>
                <!-- /.row -->
<?php include "includes/footer.php"; ?>


