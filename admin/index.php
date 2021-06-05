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
                </div>
                <!-- /.row -->
<?php include "includes/footer.php"; ?>