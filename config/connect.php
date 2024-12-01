

<?php 
// $hostname = "sql313.infinityfree.com";
// $username ="if0_36541838";
// $password = "bbnIdRNOOjD";
// $dbname = "if0_36541838_code";

$hostname = "localhost";
$username ="root";
$password = "";
$dbname = "code";

$con = mysqli_connect($hostname,$username,$password,$dbname);

if(!$con){
    echo '<script>alert("Connection failed")</script>'; 
    echo "<script>window.open('login.php','_self')</script>";

    header("Location:http://localhost/arpit_project/admin/error/db.php");
    die();
}



?>