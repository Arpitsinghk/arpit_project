

<?php 
$hostname = "localhost";
$username ="root";
$password = "";
$dbname = "code";

$con = mysqli_connect($hostname,$username,$password,$dbname);

if(!$con){
    echo '<script>alert("Connection Failed!!")</script>'; 
    echo "<script>window.open('login.php','_self')</script>";
    // header("Location:http://localhost/arpit_project/admin/error/db.php");
    die();
}



?>