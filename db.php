
<?php 
error_reporting(E_ALL);
ini_set("display_errors",'On');
?>

<?php 
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "ucoc";

$connection = mysqli_connect("localhost","root","","ucoc");
if(!$connection){
    die("query failed".mysqli_error($connection));
}
?>