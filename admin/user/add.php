<?php 
 include('../config/dbcon.php');
include('../includes/header.php');
?>

<?php
$fname = $lname = $email = $password = $cpassword = $role = $gender =  $agree = "";  
$fnameErr = $lnameErr = $emailErr = $passwordErr = $cpasswordErr = $genderErr = $roleErr = $agreeErr ="";  
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
if(isset($_POST['add_submit'])){
   
 
    //fname Field Validation  
    if (empty ($_POST["fname"])) {  
        $fnameErr = "First Name is required";  
        } else {  
              $fname =$_POST["fname"];  
        } 
  
           //lname Field Validation  
       if (empty ($_POST["lname"])) {  
        $lnameErr = "Email is required";  
        } else {  
              $lname =$_POST["lname"];  
        } 
  
           //Email Field Validation  
       if (empty ($_POST["email"])) {  
        $emailErr = "Email is required";  
        } else {  
              $email =$_POST["email"];  
        } 
  
  
     //Address Field Validation  
       if (empty ($_POST["password"])) {  
        $passwordErr = "Password is required";  
        } else {  
          $password =$_POST["password"];  
        } 

     //Role Field Validation  
       if (empty ($_POST["role"])) {  
        $roleErr = "Role is required";  
        } else {  
          $role =$_POST["role"];  
        } 
    
        //agree Field Validation  
       if (empty ($_POST["agree"])) {  
        $agreeErr = "Terms and condition is required";  
        } else {  
          $agree =$_POST["agree"];  
        } 
       
    // }

    // }
// }
include('../config/config.php');
}
}
?>
<?php
 include('../includes/body.php');
 include('../includes/sidebar.php'); 
 
?>


 




<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3 mx-4">
    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href='list.php'>User</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
  </ol>
</nav>
   
  
  <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary">DASHMIN</h3>
                                
                            </a>
                            <h3>Add data</h3>
                        </div>
                        <!-- <span class="error">*required fields</span> -->

                        <form action="add.php" method="post" enctype="multipart/form-data">
                    
                                            <!-- First Name -->
                       
                        <div class="form-floating mb-3">
                            <input type ="text" name="fname" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
                            <label for="floatingInput">First Name</label>
                            <span class="error"> <?php echo $fnameErr; ?> </span>
                        </div>

                                            <!-- Last Name -->

                        <div class="form-floating mb-3">
                            <input type ="text" name="lname" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
                            <label for="floatingInput">Last Name</label>
                            <span class="error"> <?php echo $lnameErr; ?> </span>
                        </div>

                                <!-- email -->

                        <div class="form-floating mb-3">
                            <input type ="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
                            <label for="floatingInput">Email address</label>
                            <span class="error"> <?php echo $emailErr; ?> </span>
                        </div>

                                    <!-- Pasword -->

                        <div class="form-floating mb-4">
                            <input type="password" name="password"   class="form-control password-input" id="floatingPassword" placeholder="Password" >
                            <i class="toggle-password fa fa-eye"></i>
                            <label for="floatingPassword">Password</label>
                            <span class="error"> <?php echo $passwordErr; ?> </span>
                        </div>
                
                                    <!-- confirm password -->

                        <div class="form-floating mb-4">
                            <input type="password" name="cpassword"   class="form-control password-input" id="floatingPassword" placeholder="Password" >
                            <i class="toggle-password fa fa-eye"></i>
                            <label for="floatingPassword">Confirm Password</label>
                            <span class="error"> <?php echo $passwordErr; ?> </span>
                        </div>

                                        <!-- role -->

                        <div class="form-floating mb-3">
                                <select name="role" class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected disabled>Role</option>
                                    <option value="Admin" name="role">Admin</option>
                                    <option value="user" name="role">User</option>
                                </select>
                                <label for="floatingSelect">Select Role</label>
                                <span class="error"><?php echo $roleErr; ?><span>
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
                        <input type="file" name="image" class="form-control" mulitple/>
                        <label class="form-label" for="floatingInput">Single Image upload</label>
                    </div>
        

                       <div class="d-flex align-items-center justify-content-between mb-3">
                       <div class="form-check">
                                <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Accepts our <a href="#">Terms and conditions</a></label><br>
                                <span class="error"><?php echo $agreeErr; ?><span>
                            </div>
                           </div> 
                        <button type="submit" name="add_submit" class="btn btn-primary text-white fs-5 w-100">Add data</button>
                    
                          </form>
                    </div>

                </div>
            </div>
        </div> 

<?php include('../includes/footer.php')?>