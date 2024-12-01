
<?php


include('../includes/header.php');


 

 include('../config/dbcon.php');
?>

<?php
if(isset($_GET['id'])){
$id = $_GET['id'];

$sql = "SELECT * FROM `user_signup` where `uid` = '$id'";

$result = mysqli_query($con,$sql);

if(!$result){
    die("query failed".mysqli_error($con));
}
else{
    $row = mysqli_fetch_assoc($result);
    // print_r($row);
}
}

 ?>
<?php

// if(isset($_POST['update_students'])){
  
//     if(isset($_GET['id_new'])){
//         $idnew = $_GET['id_new'];
//     }

//   $fname1 = $_POST["fname"];
//   $lname1 = $_POST["lname"];
//   $email1 = $_POST["email"];
//   $password1 =$_POST["password"];
   
//   $sql="UPDATE `user_name` SET `fname`='$fname1',`lname`='$lname1',`email`='$email1',`password`='$password1' WHERE `id`='$idnew'";
//   $result=mysqli_query($con,$sql);
//   if(!$result){
//     die("query failed".mysqli_error());  
//     // echo "Data uploaded successfully";
//     //   header('location:http://localhost/arpit_project/admin/user/list.php');
      
//   }
//   else{
//     echo 'successfulyy';
//     // header('location:list.php?update_msg=you have successfully updated.');  
//     // die(mysqli_error($con));
//   }
//   } 
  
?>
<?php
 include('../includes/body.php'); 
 include('../includes/sidebar.php'); 

?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3 mx-4">
    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href='list.php'>User</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            <h3>Edit data</h3>
                        </div>

                        <form action="<?php echo BASE_URL ?>/config/config.php?id_new=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                        
                    
                    <!-- First Name -->

<div class="form-floating mb-3">
    <input type ="text" name="fname" value="<?php echo $row['fname'];?>" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
    <label for="floatingInput">First Name</label>
    
</div>

                    <!-- Last Name -->

<div class="form-floating mb-3">
    <input type ="text" name="lname" value="<?php echo $row['lname'];?>" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
    <label for="floatingInput">Last Name</label>
   
</div>

        <!-- email -->

<div class="form-floating mb-3">
    <input type ="email" name="email" value="<?php echo $row['email'];?>" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
    <label for="floatingInput">Email address</label>
    
</div>

            <!-- Pasword -->

<div class="form-floating mb-4">
    <input type="password" name="password" value="<?php echo $row['password'];?>"  class="form-control password-input" id="floatingPassword" placeholder="Password" >
    <i class="toggle-password fa fa-eye"></i>
    <label for="floatingPassword">Password</label>
   
</div>

            <!-- confirm password -->

<div class="form-floating mb-4">
    <input type="password" name="cpassword" value="<?php echo $row['cpassword'];?>"  class="form-control password-input" id="floatingPassword" placeholder="Password" >
    <i class="toggle-password fa fa-eye"></i>
    <label for="floatingPassword">Confirm Password</label>
    
</div>

                <!-- role -->

<div class="form-floating mb-3">
        <select name="role" class="form-select" id="floatingSelect"
            aria-label="Floating label select example">
            <option selected disabled>Role</option>
<option value="Admin"<?php if($row['role'] == "Admin"){ echo "selected"; } ?>>Admin</option>
<option value="user"<?php if($row['role'] == "user"){ echo "selected"; } ?>>User</option>
           
        </select>
        <label for="floatingSelect">Select Role</label>
       
    </div>


<fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
            <div class="col-sm-10 ">
                <div class="form-check form-check-inline">
                
            <input
            <?php if($row['gender'] == "Male")
                { echo "checked"; } 
                ?>
            class="form-check-input" type="radio" name="gender"
                        id="gridRadios1" value="Male" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-inline ">
                    <input
                    <?php 
                        if($row['gender'] == "Female")
                        { echo "checked"; } 
                    ?>
                    class="form-check-input" type="radio" name="gender"
                        id="gridRadios2" value="Female">
                    <label class="form-check-label" for="gridRadios2">
                        Female
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input
                    <?php 
                        if($row['gender'] == "other")
                        { echo "checked"; } 
                    ?>
                    class="form-check-input" type="radio" name="gender"
                        id="gridRadios2" value="Other">
                    <label class="form-check-label" for="gridRadios2">
                        Other
                    </label>
                </div>
            </div>
        </fieldset>

       

<div class="form-floating mb-3">
<input type="file" name="image" value="<?php echo $row['image'];?>" class="form-control" mulitple/>
<label class="form-label" for="floatingInput">Single Image upload</label>
</div>


<div class="d-flex align-items-center justify-content-between mb-3">
<div class="form-check">
        <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1" checked>
        <label class="form-check-label" for="exampleCheck1">Accepts our <a href="#">Terms and conditions</a></label><br>
       
    </div>
   </div> 
<button type="submit" name="update_students" class="btn btn-primary text-white fs-5 w-100">Update data</button>

  </form>



                        
                    </div>

                </div>
            </div>
        </div>
         
        <?php 
//  $data = $_GET['updateid']; 
//  header('location:http://localhost/arpit_project/admin/user/list.php');
//  header('Location:http://localhost/arpit_project/admin/user/list.php?updateid=' . $data);   
?>
<?php


include('../config/config.php');
// if(isset($_GET[''])
include('../includes/footer.php')?>