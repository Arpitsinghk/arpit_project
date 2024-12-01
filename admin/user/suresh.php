<?php include('../includes/header.php');
 include('../includes/body.php');
 include('../includes/sidebar.php'); 
 include('../config/config.php'); ?>



<?php
$fname = $lname = $email = $password ="";  
$fnameErr = $lnameErr = $emailErr = $passwordErr ="";  
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
if(isset($_POST['add_submit'])){
    if($fnameErr == "" && $lnameErr == "" && $emailErr == "" && $passwordErr == ""){
  
 
    //fname Field Validation  
    if (empty ($_POST["fname"])) {  
        $fnameErr = "fname is required";  
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
    }

    }
}
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
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                         action="<?php //echo BASE_URL ?>/config/config.php" 
                        <div class="form-floating mb-3">
                            <input type="text" name="fname" class="form-control" id="floatingInput" placeholder="First name">
                            <label for="floatingInput">First Name</label> 
                            <span class="error">*<?php echo $fnameErr; ?><span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="lname" class="form-control" id="floatingInput" placeholder="Last name">
                            <label for="floatingInput">Last Name</label> 
                            <span class="error">*<?php echo $lnameErr; ?><span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label> 
                            <span class="error">*<?php echo $emailErr; ?><span>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label> 
                            <span class="error">*<?php echo $passwordErr; ?><span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Terms and conditions</label>
                            </div>
                            </div>
                        <button type="submit" name="add_submit" class="btn btn-primary py-3 w-100 mb-4">Add Data</button>
                        </form>
                    </div>

                </div>
            </div>
        </div> 

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // if (isset($_POST["submit"])){
    // if(isset($stu_name) && $stu_name != "" && isset($stu_add) && $stu_add != "" && isset($stu_class) && $stu_class !="" &&  isset($stu_phone) && $stu_phone !=""){ 
    // if($stu_name != "" && $stu_add != "" && $stu_class !="" && $stu_phone !=""){ 


      $stu_nameErr = $stu_addErr =  $stu_classErr = $stu_phoneErr = "";
  
if(isset($_POST['add_submit'])){
    if($fnameErr == "" && $lnameErr == ""&& $emailErr == ""&& $passwordErr == ""){
       // echo $a;
    // <h3 color = GREEN> <b>You have sucessfully registered1.</b> </h3>";  
  $stu_name = $_POST['sname'];
  $stu_add = $_POST['saddress'];
  $stu_class = $_POST['class'];
  $stu_phone = $_POST['sphone'];

//   if (empty ($_POST["name"])) {  
//     $stu_nameErr = "Error! You didn't enter the Name.";  
//              echo $stu_nameErr;  
// } else {  
//   $stu_name = $_POST["sname"];  
// } 

    //  // first name
    //  if(empty($_POST["sname"] && $stu_name != "")){
    //   $stu_nameErr = "First Name is required";
    // }
    // else{
    //   $stu_name =$_POST["sname"];
    //      if(!preg_match("/^[A-Z]*$/",$stu_name)){
    //       $stu_nameErr = "Only letter and white space are allowed";
    // }
    // }

   
  
$conn = mysqli_connect("localhost","root","","crud") or die("connection failed");

$sql =  "INSERT INTO student(sname,saddress,sclass,sphone) VALUES('{$stu_name}','{$stu_add}','{$stu_class}','{$stu_phone}')";

$result = mysqli_query($conn,$sql) or die("Query unsucessful.");
// header("LOCATION: index.php");
// header('location:index.php');

// if($stu_name == "" || empty($stu_name)){
// header('location:index.php');
// }

mysqli_close($conn);

}
}
}
// }
?>


<?php include('../includes/footer.php')?>