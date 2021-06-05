
<?php 
error_reporting(E_ALL);
ini_set("display_errors",'On');
?>

<?php ob_start();?>
<?php session_start(); ?>
<?php include "db.php";?>

<?php
        if(isset($_POST['create_user'])){
          
           $username = $_POST['username'];
           $password = $_POST['user_password'];

           $username = mysqli_real_escape_string($connection,$username);
           $password = mysqli_real_escape_string($connection,$password);
           
           $query = "SELECT * FROM users WHERE username = '$username' ";
           $select_query = mysqli_query($connection, $query);
           if(!$select_query){
             die("query failed".mysqli_error($connection));
           }

           while($row = mysqli_fetch_array($select_query)){
           $db_username = $row['username'];
           $db_user_firstname = $row['user_firstname'];
           $db_user_lastname  = $row['user_lastname'];
           $db_user_password = $row['user_password']; 
           $db_user_email    = $row['user_email'];
           $db_user_country  = $row['user_country'];

           }

           if(password_verify($password,$db_user_password)){
            $_SESSION['username'] = $db_username;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname']  = $db_user_lastname;
            $_SESSION['user_password']  = $db_user_password;
            $_SESSION['user_email']     = $db_user_email;
            $_SESSION['user_country']   = $db_user_country;

            header("Location:admin");

          }else{
            header("Location:index.html");
          }
          
        }
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UCOC</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Helvetica" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo"><a href="index.html"><img height="80px" class="img-fluid" src="assets/img/Web logo.jpg" alt=""></a></h1>
    

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="membership.html">Membership</a></li>
          <li><a href="register.html">Register</a></li>
          <li><a href="account.html">Login</a></li>
          <li><a href="contact.html">Contact</a></li>

        </ul>

      </nav><!-- .nav-menu -->

      <a href="index.html" class="get-started-btn ml-auto">DONATE</a>

    </div>
  </header><!-- End Header -->
<!-- ======= Hero Section ======= -->
<div class="container">
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">


      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/banner.jpg)">
          <div class="carousel-container">
            <div class="container">
          
            </div>
          </div>
        </div>

       
      </div>
    </div>
  </section><!-- End Hero -->
</div>

  <div class="container mt-4 padding">
            <div class="row text-center">
                <div class="col-12">
                    <h2>Member Login</h2>
                </div>

            </div>
        </div>
      
        <div class="container padding">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form action="" method="post">

                        <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="user_password" class="form-control" placeholder="Enter Your Password">
                        </div>

                        <div class="form-group text-center ">
                            <input type="submit" name="create_user" value="LOGIN" class="btn btn-primary px-5">
                            <span><a href="register.html">Create an account </a></span>
                        </div>
 
                    </form>

                </div>
            </div>
        </div>

  <!-- ======= Footer ======= -->
  <footer class="footer-class">
    
    <div class="container">
      <div class="row justify-content-center last">
          <div class="col-md-12 text-center">
              
              <p>
                  The Uganda Community Organization in California (UCOC) is a 501(c)(3) non-profit organization registered in the state of California.
              </p>
          </div>

              <hr>
              <h5 class="middle">&copy; UCOC 2020</h5>
          
      </div>
  
    </div>
 
</footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>