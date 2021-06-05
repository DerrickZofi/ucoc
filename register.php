<?php 
error_reporting(E_ALL);
ini_set("display_errors",'On');
?>

<?php session_start();?>
<?php include "db.php";?>
<?php include "admin/functions.php";?>
<?php
if(isset($_POST['create_user'])){

    $username       = trim($_POST['username']);
    $user_names = trim($_POST['user_names']);
    $user_address  = trim($_POST['user_address']);
    $user_city     = trim($_POST['user_city']);
    $user_state   = trim($_POST['user_state']); 
    $user_zipcode = trim($_POST['user_zipcode']);
    $user_telephone = trim($_POST['user_telephone']);
    $user_password  = trim($_POST['user_password']);
    $user_email     = trim($_POST['user_email']);
    $first_kid     = trim($_POST['first_kid']);
    $second_kid = trim($_POST['second_kid']);
    $third_kid = trim($_POST['third_kid']);
    $forth_kid = trim($_POST['forth_kid']);

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=> 10));
    $query = "INSERT INTO users(username,user_names,user_address,user_city,user_state,user_zipcode,user_telephone,user_role,user_password,user_email,first_kid,second_kid,third_kid,forth_kid) ";
    $query.="VALUES('$username','$user_names','$user_address','$user_city','$user_state','$user_zipcode','$user_telephone','subscriber','$user_password','$user_email','$first_kid','$second_kid','$third_kid','$forth_kid')";
    $create_register = mysqli_query($connection,$query);
    
    header("Location:account.html");

    /*
    $error = [
              'username' => '',
              'user_firstname' => '',
              'user_lastname' => '',
              'user_email'=> '',
              'user_country'=>'',
              'user_password'=>''

    ];

    if($username == ''){
        $error['username'] = 'username  cannot be empty';
        
        
    }

    if($user_password==''){
       $error['user_password'] = 'password cant be empty';
       
    }

    if($user_firstname == ''){
      $error['user_firstname'] = 'field cannot be empty';
      
    }
    if($user_lastname == ''){
       $error['user_lastname'] = 'field cannot be empty';
       
    }

    if($user_email == ''){
      $error['user_email'] = "field cannot be empty";
      //header("Location:../register.html");
    }
    
    if($user_country == ''){
        $error['user_country'] = "field cannot be empty";
        
    }


    foreach($error as $key => $value){
         if(empty($value)){
           unset($error[$key]);
         }
         if(empty($error)){
             register_user($username,$user_firstname,$user_lastname,$user_email,$user_country,$user_password);
         }
    }*/
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
<div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2>Create an account</h2>
                    <p>Fill in the form below to create your personal account</p>

                </div>
                
            </div>
</div>

        <div class="container padding">
            <div class="row">
                <div class="col-md-6">

                    <form action=""  method="post">
                    
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control"
                            value="<?php echo isset($error['username']) ? $error['username'] : ''?>">
                             <a><?php echo isset($error['username']) ? $error['username'] : ''; ?></a>
                        </div>
                         
                        <div class="form-group">
                        <label for="names">Names</label>
                        <input type="text" name="user_names" class="form-control">
                        </div> 

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="user_address" class="form-control">
                            
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="user_city" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="user_state" class="form-control">
                
                        </div>

                        <div class="form-group">
                            <label for="ZipCode">Zip Code</label>
                            <input type="text" name="user_zipcode" class="form-control">
                        </div>

                        <div class="form-group">
                         <label for="telephone">Telephone(home/cell)</label>
                         <input type="tel" name="user_telephone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="user_password" class="form-control">
                
                        </div>

                        <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="email" name="user_email" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="kids">List names and ages of household members you are registering (Must be 18 and above)</label>
                        <label for="kids">Names</label>
                        <input type="text" name="first_kid" class="form-control">

                        <label for="kids">Names</label>
                        <input type="text" name="second_kid" class="form-control">

                        <label for="kids">Names</label>
                        <input type="text" name="third_kid" class="form-control">

                        <label for="kids">Names</label>
                        <input type="text" name="forth_kid" class="form-control">
                        </div>


                        <div class="form-group">
                            <input type="submit" name="create_user" value="register" class="btn btn-info">
                        </div>
                            
                        </form>
                </div>
            </div>
        </div>

<!--<div class="container">
      <div class="row">
          <div class="col-md-12">
              <p class="title">
                List names and ages of household of family members you are registering (Must be 18 and above)
              </p>
          </div>
      </div>
</div>-->




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