<?php

$invalid=0;
$error=0;
$login=0;
$admin=0;


$username = $password = "";
$usernameErr = $passwordErr  = "";

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
      
    include ('config/dbcon.php');
    // $name=$_POST['name'];
    $username=$_POST['email'];
    $password=$_POST['password'];
   
    $sql = "SELECT * FROM `user_signup` where email='$username' and password='$password'";
    $result= mysqli_query($con,$sql);
    while($row1 = mysqli_fetch_assoc($result)){
      $role = $row1['role'];  
      if($role == 'Admin'){ 
        if($result){
        $num = mysqli_num_rows($result);
        if($num>0){
          // echo "login successfull";
            $login=1;
            session_start();
            $_SESSION['email']=$username;
            // $_SESSION['password']=$password;
            header('location:index.php');
        }
        elseif($num == 0){
          // echo "not correct";
            // echo "invalid id";
           $invalid=1;
        }
      }
    }
    else{
      $admin=1;
    }
    }
 
}
else{
  $error=1;
}
}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
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
    </style>
    <title>Admin login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body class="bg-info">

  <?php  
  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show w-50 text-center mx-auto" role="alert">
    <strong>success!</strong> You are successfully logged in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
 if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show w-25 text-center mx-auto" role="alert">
    <strong>Error!</strong>  Invalid credentials.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
 if($error){
    echo '<div class="alert alert-danger alert-dismissible fade show w-50 text-center mx-auto" role="alert">
    <strong>Error!</strong> Please fill all the required information.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
 if($admin){
    echo '<div class="alert alert-danger alert-dismissible fade show w-50 text-center mx-auto" role="alert">
    <strong>Error!</strong> Only admin is allow to login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
  <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    
                    <form method="post" action="login.php">
                    <div class="sol mx-auto text-center display-1">
                            <p class=" text-white"><i class="bi bi-person-lock "></i></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="text-decoration-none mx-auto ">
                                <h3 class="text-primary my-3">Admin Login</h3>
                            </a></div>
                        <div class="form-floating mb-3">
                            <input type ="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
                            <label for="floatingInput">Email address</label>
                            <span class="error"> <?php echo $usernameErr; ?> </span>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password"   class="form-control" id="floatingPassword" placeholder="Password" >
                            <label for="floatingPassword">Password</label>
                            <span class="error"> <?php echo $passwordErr; ?> </span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <!-- <div class="form-check">
                                <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Accept Term and conditions</label>
                                
                            </div> -->
                   
                        </div>
                        <button type="submit" name="submit" class="btn btn-info text-white fs-5 py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center">Create an Account?<a href="register.php" class="ms-1 text-decoration-none">Signup Now</a></p>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>