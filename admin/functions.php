<?php 
error_reporting(E_ALL);
ini_set("display_errors",'On');
?>

<?php
function escape($string){
    global $connection;
    mysqli_real_escape_string($connection, trim($string));
}

function confirmQuery($result){
    global $connection;
    if(!$result){
        die("query failed".mysqli_error($connection));
    }
}

function username_exist($username){
    global $connection;
    $query = "SELECT username FROM users WHERE username = '$username' ";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result)>0){
        return true;

    }else {
        return false;
    }
}

function email_exist($user_email){
    global $connection;
    $query = "SELECT user_email FROM users WHERE user_email = '$user_email' ";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result)>0){
        return true;

    }else {
        return false;
    }
}

function is_admin($username){
    global $connection;
    $query = "SELECT user_role FROM users WHERE username = '$username' ";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result);
    if($row['user_role']== 'admin'){
        return true;
    }else {
        return false;
    }
}

function register_user($username,$user_firstname,$user_lastname,$user_email,$user_country,$user_password){
    global $connection;
    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=> 10));
    $query = "INSERT INTO users(username,user_firstname,user_lastname,user_email,user_country,user_password,user_role) ";
    $query.="VALUES('$username','$user_firstname','$user_lastname','$user_email','$user_country','$user_password','subscriber')";
    $create_register = mysqli_query($connection,$query);
    
    header("Location:account.html");
}
?>