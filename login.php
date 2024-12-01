<?php

// include('functions/common_function.php');

$invalid=0;
$error=0;
$login=0;


$username = $email = $password = "";
$usernameErr = $emailErr =  $passwordErr  = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

// $username="email";
// $password="password";


//Email Validation  
if (empty($_POST["email"])) {  
  $usernameErr = "Email or Username is required";  
} else {  
  $username = $_POST["email"];    
} 


//Empty Field Validation  
if (empty ($_POST["password"])) {  
  $passwordErr = "Password is required";  
} else {  
  $password =$_POST["password"];  
}  

 


  if(isset($_POST['submit'])) {    
    if($usernameErr == "" && $passwordErr == "") {  
      
    include ('config/connect.php');
    $username=$_POST['email'];
    $password=$_POST['password'];
   
    $sql = "SELECT * FROM `user_signup` where email='$username' and password='$password'";
    $result= mysqli_query($con,$sql);
    if($result){
        $num = mysqli_num_rows($result);
        if($num>0){
            echo "login successfull";
            $login=1;
            session_start();
            $_SESSION['coustomer']=$username;
            header('location:index.php');
        }
        else{
            // echo "invalid id";
           $invalid=1;
        }
    }
}
else{
  $error=1;
}
}
}

?>
<?php include('includes/header.php');
 include('includes/sidebar.php'); 
 ?>



 


  <div class="container-fluid com">
  <div class="row align-items-center justify-content-center" >
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb pt-4 ms-3">
    <li class="breadcrumb-item"><a class="text-light text-decoration-none" href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a class="text-light text-decoration-none" href="#">User Login</a></li>
  </ol>
</nav> 
  <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6 py-5">
  <?php  
  if($login){
    echo '<div class="alert alert-Success alert-dismissible fade show" role="alert">
    <strong>success!</strong>you are successfully logged in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
 if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>  Invalid credentials.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
 if($error){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Please fill all the required information.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
                    <div class="bg-light rounded p-5 p-sm-5">
                    
                    <form method="post" action="login.php">
                    <div class="sol mx-auto text-center display-3">
                            <p class=" text-white"><i class="bi bi-person-lock "></i></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="text-decoration-none mx-auto ">
                                <h3 class="text-primary my-3">User Login</h3>
                            </a></div>

                                            <!-- Email address -->

                        <div class="form-floating mb-3">
                            <input type ="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
                            <label for="floatingInput">Email address</label>
                            <span class="error"> <?php echo $usernameErr; ?> </span>
                        </div>

                                            <!-- Password -->

                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control password-input" id="floatingPassword" placeholder="Password" >
                            <i class="toggle-password fa fa-eye"></i>
                            <label for="floatingPassword">Password</label>
                            <span class="error"> <?php echo $passwordErr; ?> </span>
                        </div>
                        
                          
                    
                                               <!-- button -->

                        <button type="submit" name="submit" class="con border-0 btn btn-info text-white fs-5 w-100">Login</button>
                    </form>
                    
                    <p class="text-center mt-4">Create an Account?<a href="signup.php" class="ms-1 text-decoration-none">Signup Now</a></p>
                    </div>
                </div>
            </div>
        </div>


<?php include('includes/footer.php'); ?>