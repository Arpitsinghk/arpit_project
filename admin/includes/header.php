<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
}

?>


 <?php  
         //Starting the session
         $email = $_SESSION['email'];
         
         $hostname = "localhost";
         $username ="root";
         $password = "";
         $dbname = "code";
         
         $con = mysqli_connect($hostname,$username,$password,$dbname);
         
$sql="SELECT * from user_signup where email = '$email'";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result); 

  
      ?>

<?php define('BASE_URL','http://localhost/arpit_project/admin');?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN E-commerce Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo BASE_URL ?>/assets/img/images.png" type="image/png" rel="icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Libraries Stylesheet -->
    <link href="<?php echo BASE_URL ?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo BASE_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo BASE_URL ?>/assets/css/style.css" rel="stylesheet">
    <style>
        .error{
                color:red;
        }
        .sol {
    display: flex;
    margin-top: 20px;
    gap: 10px;
}

        .menu-sample {
  list-style: none;
  padding: 5px;
}

.menu-item-sample:hover {
  background-color: red;
}

.menu-item-sample.active {
  background-color: blue;
}
.toggle-password {
    position: absolute;
    top: 24px;
    right: 10px;
    cursor: pointer;
    z-index: 1;
} 
    </style>
</head>

<body>
    