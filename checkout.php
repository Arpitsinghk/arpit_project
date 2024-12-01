<?php
 
// include('functions/common_function.php');
 include('includes/header.php');
//  session_start();
 if(!isset($_SESSION['coustomer'])){
   header('location:login.php');
 }
//  else{
//   header('location:checkout.php');
//  }
 include('includes/sidebar.php'); 

 ?>


 


  <div class="container-fluid com">
  <div class="row align-items-center justify-content-center" >
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb pt-4 ms-3">
    <li class="breadcrumb-item"><a class="text-light text-decoration-none" href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a class="text-light text-decoration-none" href="#">Checkout Page</a></li>
  </ol>
</nav> 
  <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6 py-5">
  
                    
                </div>
            </div>
        </div>


<?php include('includes/footer.php'); ?>