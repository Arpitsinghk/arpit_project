<?php
session_start();
if(isset($_SESSION['coustomer'])){
    
    $email = $_SESSION['coustomer'];
    // header('location:login.php');

 
         //Starting the session
        //  $email = $_SESSION['email'];
         
include('./config/connect.php');
$sql="SELECT * from user_signup where email = '$email'";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result); 
}
  
      ?>

<?php define('BASE_URL','http://localhost/arpit_project');?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
           

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

        <title>Ecommerce Website by using PHP and MySqli</title>
        <style>
            .password-input-container {
    position: relative;
}
.pol {
    display: grid;
    grid-template-columns: repeat(2,1fr);
    gap: 20px;
}

.password-input {
    padding-right: 32px;
}

.toggle-password {
    position: absolute;
    top: 24px;
    right: 10px;
    cursor: pointer;
    z-index: 9999;
}
ol.breadcrumb.pt-4.ms-3 {
    background-color: transparent;
}
            .card-img-top{
                width:100%;
                height:400px;
                object-fit:contain;
            }
        .error{
            color:red;
        }
        .sol{
            border:1px solid skyblue;
            width:100px;
            height:100px;
            border-radius: 50%;
            background-color:skyblue;

        }
        .ellipsis {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .com {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: auto;
}
.con {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	animation: gradient 15s ease infinite;
    background-size: 400% 400%;
	height: auto;
}
.pol{
    background-color: #e9ecef;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

        </style>
    </head>
    <body>