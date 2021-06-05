<?php 
error_reporting(E_ALL);
ini_set("display_errors",'On');
?>

<?php
session_start();
?>

<?php
$_SESSION['username'] = null;
$_SESSION['user_firstname'] = null;
$_SESSION['user_lastname']  = null;
$_SESSION['user_password']  = null;
$_SESSION['user_email']     = null;
$_SESSION['user_country']   = null;

header("Location:index.html");

?>