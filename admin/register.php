<?php

$invalid=0;
$user=0;
$error=0;
$login=0;
$same=0;

$name = $email = $password = $cpassword = $gender = $image = $agree ="";
$nameErr = $emailErr = $passwordErr = $cpasswordErr = $genderErr = $imageErr = $agreeErr = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $gender = $_POST['gender'];
    
    $agree = $_POST['agree'];

//   Name Empty validation 
if(empty($_POST['name'])){
    $nameErr = "Name is Required";
}
else{
    $name=$_POST['name'];
}

//   Email Empty validation
if(empty($_POST['email'])){
    $emailErr = "Email is required";
}
else{
    $email = $_POST['email'];
}

//   Password Empty validation
if(empty($_POST["password"])){
    $passwordErr = "Password is required";
}
else{
    $password =$_POST['password'];
}

//   confirm Password Empty validation
if ($_POST["password"] == $_POST["cpassword"]){
if(empty($_POST['cpassword'])){
    $cpasswordErr = "Confirm password is required";    
}
else{
    $cpassword = $_POST['cpassword'];
}
}
else{
    $same =1;
}

//   Gender Empty validation
if(empty($_POST['gender'])){
    $genderErr = 'Gender is required';
}
else{
    $gender = $_POST['gender'];
}

//   Agree Empty validation
if(empty($_POST["agree"])){
    $agreeErr = "Terms and condition is required";
}
else{
    
    $agree = $_POST["agree"];
}





if(isset($_POST["submit"])){
    if($nameErr == "" && $emailErr == "" && $passwordErr == "" && $cpasswordErr =="" && $genderErr == "" && $imageErr == "" && $agreeErr == ""){ 
      include('./config/dbcon.php');
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $gender = $_POST['gender'];
    
    
    $ImageName = $_FILES['image']['name'];
    $fileElementName = 'image';
    $path = "./assets/img/";
    $location = $path . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $location);


    $sql="SELECT * FROM user_signup where email = '$email'";
    $result = mysqli_query($con,$sql);
    if($result){
       $num = mysqli_num_rows($result); 
    if($num>0){
        $user=1;
    }
    else{
    $sql = "INSERT INTO user_signup(name,email,password,cpassword,role,gender,image) 
    VALUES('$name','$email','$password','$cpassword','Admin','$gender','$ImageName')";
    $result = mysqli_query($con,$sql);
    if($result){
        $login=1;
        header('location:login.php');
    }
        else{
        die(mysqli_error($con));
    }
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
    <title>Admin Register</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body class="bg-info">

  <?php  
  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show  w-50 text-center mx-auto" role="alert">
    <strong>success!</strong> You are successfully logged in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if($user){
        echo '<div class="alert alert-danger alert-dismissible fade show  w-50 text-center mx-auto" role="alert">
        <strong>Oh no sorry!</strong> User already exists.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
  if($same){
    echo '<div class="alert alert-danger alert-dismissible fade show w-50 text-center mx-auto" role="alert">
    <strong>Error !</strong>Password and confirm password must be same.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
 if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show  w-50 text-center mx-auto" role="alert">
    <strong>Error!</strong>  Invalid credentials.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
 if($error){
    echo '<div class="alert alert-danger alert-dismissible fade show  w-50 text-center mx-auto" role="alert">
    <strong>Error!</strong> Please fill all the required information.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
  <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    
                    <form method="post" action="register.php" enctype="multipart/form-data">
                    <div class="sol  mx-auto text-center display-1">
                            <p class=" text-white"><i class="bi bi-person-lock "></i></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="text-decoration-none mx-auto ">
                                <h3 class="text-primary my-3">Admin Register</h3>
                            </a></div>
                        <div class="form-floating mb-3">
                            <input type ="text" name="name" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
                            <label for="floatingInput">Name</label>
                            <span class="error"> <?php echo $nameErr; ?> </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type ="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
                            <label for="floatingInput">Email address</label>
                            <span class="error"> <?php echo $emailErr; ?> </span>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password"   class="form-control" id="floatingPassword" placeholder="Password" >
                            <label for="floatingPassword">Password</label>
                            <i class="toggle-password fa fa-eye"></i>
                            <span class="error"> <?php echo $passwordErr; ?> </span>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="cpassword"   class="form-control" id="floatingPassword" placeholder="Password" >
                            <label for="floatingPassword">Confirm Password</label>
                            <i class="toggle-password fa fa-eye"></i>
                            <span class="error"> <?php echo $cpasswordErr; ?> </span>
                        </div>
                        <fieldset class="row mb-3">
                        <span class="error"> <?php echo $genderErr; ?> </span>
                                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                    
                                    <div class="col-sm-10 ">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="gridRadios1" value="Male" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="gridRadios2" value="Female">
                                            <label class="form-check-label" for="gridRadios2">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="gridRadios2" value="Other">
                                            <label class="form-check-label" for="gridRadios2">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                        
                        <div class="form-floating mb-4">
                            <input type="file" name="image"   class="form-control" id="floatingPassword" placeholder="Image" >
                            <label for="floatingPassword">Image</label>
                            <span class="error"> <?php echo $imageErr; ?> </span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Accept Term and conditions</label><br>
                                <span class="error"> <?php echo $agreeErr; ?> </span>
                            </div>
                           
                        </div>
                        <button type="submit" name="submit" class="btn btn-info text-white fs-5 py-3 w-100 ">Sign Up</button>
                        <p class="text-center mt-2">Create an Account?<a href="login.php" class="ms-1 text-decoration-none">Login Now</a></p>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
$(document).ready(function () {
    $(".toggle-password").click(function () {
        var passwordInput = $($(this).siblings(".password-input"));
        var icon = $(this);
        if (passwordInput.attr("type") == "password") {
            passwordInput.attr("type", "text");
            icon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            passwordInput.attr("type", "password");
            icon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
})
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>