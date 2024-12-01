<?php

// include('functions/common_function.php');
// $invalid=0;
// $error=0;
// $login=0;
// $match=0;


$fname = $lname = $email = $password = $cpassword = $gender = $image = "";
$fnameErr = $lnameErr = $emailErr =  $passwordErr  = $cpasswordErr = $genderErr = $imageErr = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['signup_submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $gender=$_POST['gender'];
    // $image=$_POST['image'];
    // $image=$_FILES['image']['name'];
    // $temp_name = $_FILES['image']['tmp_name'];
    // move_uploaded_file($temp_name,".$image");
//Name Validation  
if (empty($_POST["fname"])) {  
  $fnameErr = "Username is required";  
} else {  
  $fname = $_POST["fname"];    
} 
//Last Name Validation  
if (empty($_POST["lname"])) {  
  $fnameErr = "Username is required";  
} else {  
  $fname = $_POST["lname"];    
} 


//Email Field Validation  
if (empty ($_POST["email"])) {  
  $emailErr = "Email is required";  
} else {  
  $email =$_POST["email"];  
} 

//Password Field Validation  
if (empty ($_POST["password"])) {  
    $passwordErr = "Password is required";  
  } else {  
    $password =$_POST["password"];  
  }  

  //Confirm Password Field Validation  
if (($_POST["password"]) == ($_POST["cpassword"])) {  
   if(empty($_POST["cpassword"])) {
    $cpasswordErr = "Password is required";    
  }
  else{
    $cpassword =$_POST["cpassword"];
  }
}  
  else{
    $match=1;
  }

    // Gender is required 
if(empty($_POST["gender"])){
    $genderErr = "Gender is required";
} 
else{
    $gender = $_POST["gender"];
}

//         // Image Field validation

// // if(empty($_POST["image"])){
// //     $imageErr = "Image is required";
// // }
// // else{
// //     $image = $_post["image"];
// // }
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
    <li class="breadcrumb-item active" aria-current="page"><a class="text-light text-decoration-none" href="#">User SignUp</a></li>
  </ol>
</nav> 

  <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6 py-5">
 
<?php get_submit(); ?>
                    <div class="bg-light rounded p-5 p-sm-5">
                   
                    <form method="post" action="signup.php" enctype="multipart/form-data">
                    
                    <div class="sol mx-auto text-center display-3">
                            <p class="pt-1 ms-1 text-white"><i class="fa-solid fa-user-plus"></i></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="text-decoration-none mx-auto ">
                                <h3 class="text-primary my-3">User Signup</h3>
                            </a></div>
                        <div class="form-floating mb-3">
                            <input type ="text" name="fname" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
                            <label for="floatingInput">Name</label>
                            <span class="error"> <?php echo $fnameErr; ?> </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type ="text" name="lname" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
                            <label for="floatingInput">Last Name</label>
                            <span class="error"> <?php echo $lnameErr; ?> </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type ="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
                            <label for="floatingInput">Email address</label>
                            <span class="error"> <?php echo $emailErr; ?> </span>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password"   class="form-control password-input" id="floatingPassword" placeholder="Password" >
                            <i class="toggle-password fa fa-eye"></i>
                            <label for="floatingPassword">Password</label>
                            <span class="error"> <?php echo $passwordErr; ?> </span>
                        </div>
                
                        <div class="form-floating mb-4">
                            <input type="password" name="cpassword"   class="form-control password-input" id="floatingPassword" placeholder="Password" >
                            <i class="toggle-password fa fa-eye"></i>
                            <label for="floatingPassword">Confirm Password</label>
                            <span class="error"> <?php echo $passwordErr; ?> </span>
                        </div>

                        <fieldset class="row mb-3">
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

                               

                        <div class="form-floating mb-3">
                        <input type="file" name="image" class="form-control pol" mulitple/>
                        <label class="form-label" for="floatingInput">Single Image upload</label>
                    </div>
                    
                       <div class="d-flex align-items-center justify-content-between ms-1 mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="agree" class=" form-check-input" checked id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Accepts our <a href="#">Terms and conditions</a></label><br> 
                            </div>
                        </div> 
                        <button type="submit" name="signup_submit" class="btn btn-info text-white fs-5 w-100 con border-0">Sign Up</button>
                    
                        <p class="text-center mt-4">Already have an Account?<a href="login.php" class="ms-1 text-decoration-none">Login Now</a></p>
                    </form>
                    </div>
                </div>
            </div>
        </div>


<?php

include('includes/footer.php'); ?>