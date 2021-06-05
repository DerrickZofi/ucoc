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
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    

                        <?php
                        if(isset($_SESSION['username'])){
                           $username = $_SESSION['username'];
                           
                           $query = "SELECT * FROM users WHERE username = '$username' ";
                           $select_username = mysqli_query($connection,$query);
                           while($row = mysqli_fetch_assoc($select_username)){
                               $username = $row['username'];
                               $user_names = $row['user_names'];
                               $user_city = $row['user_city'];
                               $user_state = $row['user_state'];
                               $user_zipcode = $row['user_zipcode'];
                               $user_telephone = $row['user_telephone'];
                               $user_email  = $row['user_email'];
                               $user_password = $row['user_password'];
                               $first_kid = $row['first_kid'];
                               $second_kid = $row['second_kid'];
                               $third_kid = $row['third_kid'];
                               $forth_kid = $row['forth_kid'];
                           }

                        }
                        
                        ?>

                        <?php
                         if(isset($_POST['submit'])){
                             
                             $username = trim($_POST['username']);
                             $user_names = trim($_POST['user_names']);
                             $user_city = trim($_POST['user_city']);
                             $user_state = trim($_POST['user_state']);
                             $user_zipcode = trim($_POST['user_zipcode']);
                             $user_telephone = trim($_POST['user_telephone']);
                             $user_email  = trim($_POST['user_email']);
                             $first_kid = trim($_POST['first_kid']);
                             $second_kid = trim($_POST['second_kid']);
                             $third_kid = trim($_POST['third_kid']);
                             $forth_kid = trim($_POST['forth_kid']);
                             $user_password = trim($_POST['user_password']);

                             if(!empty($user_password)){
                             $query = "SELECT user_password FROM users WHERE username = '$username' ";
                             $query_password = mysqli_query($connection,$query);
                             $row = mysqli_fetch_array($query_password);
                             $db_user_password = $row['user_password'];
                             if($user_password != $db_user_password){
                                 $user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>10));
                             }

                             }

                             $query = "UPDATE users SET ";
                             $query.="username = '$username', ";
                             $query.="user_names = '$user_names', ";
                             $query.="user_city = '$user_city', ";
                             $query.="user_state = '$user_state', ";
                             $query.="user_zipcode = '$user_zipcode', "; 
                             $query.="user_telephone = '$user_telephone',";
                             $query.="user_email   = '$user_email',";
                             $query.="user_password = '$user_password' ";
                             $query.="first_kid     = '$first_kid', ";
                             $query.="second_kid = '$second_kid', ";
                             $query.="third_kid = '$third_kid', ";
                             $query.="forth_kid = '$forth_kid', ";
                             $query.="WHERE username = '$username' ";
                             $update_profile = mysqli_query($connection,$query);
                             if(!$update_profile){
                                 die("query failed".mysqli_error($connection));
                             }

                         }
                        ?>

                        <form action="" method="post">
                          
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text"  name="username" class="form-control" value="<?php echo $username;?>">
                        </div>
                        <div class="form-group">
                            <label for="names">Names</label>
                            <input type="text"  name="user_names"  value="<?php echo $user_names; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="city">Address</label>
                        <input type="text"  value="<?php echo $user_city;?>" name="user_city" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" value="<?php echo $user_state; ?>" name="user_state" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" value="<?php echo $user_zipcode; ?>" name="user_zipcode" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input type="text" value="<?php echo $user_telephone; ?>" name="user_telephone" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="user_email" value="<?php echo $user_email; ?>" class="form-control">
                        </div>
                
                        <div class="form-group">
                        <label for="kids">Children</label>
                        <label for="kids">Names</label>
                        <input type="text" name="first_kid" value="<?php echo $first_kid; ?>" class="form-control">

                        <label for="kids">Names</label>
                        <input type="text" name="second_kid" value="<?php echo $second_kid; ?>" class="form-control">

                        <label for="kids">Names</label>
                        <input type="text" name="third_kid" value="<?php echo $third_kid; ?>"class="form-control">

                        <label for="kids">Names</label>
                        <input type="text" name="forth_kid" value="<?php echo $forth_kid; ?>" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" value="" name="user_password" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="update" class="btn btn-primary">
                        </div>
    
                        </form>
                      
                    </div>
                </div>
                <!-- /.row -->
<?php include "includes/footer.php"; ?>