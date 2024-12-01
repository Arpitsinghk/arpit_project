<?php include('../includes/header.php');
//  include('../includes/body.php');
//  include('../includes/sidebar.php'); 
 ?>

<?php
$cname = $status =  $agree="";  
$cnameErr = $statusErr = $agreeErr=""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
// if(isset($_POST['add_category'])){
    // if($cnameErr == "" && $statusErr == "" && $agreeErr == ""){
  
 
    //fname Field Validation  
    if (empty ($_POST["cname"])) {  
        $cnameErr = "Category Name is required";  
        } else {  
              $cname =$_POST["cname"];  
        } 
  
           //lname Field Validation  
       if (empty ($_POST["status"])) {  
        $statusErr = "Status is required";  
        } else {  
              $status =$_POST["status"];  
        } 
  
           //Email Field Validation  
       if (empty ($_POST["agree"])) {  
        $agreeErr = "Terms & condition is required";  
        } else {  
              $agree =$_POST["agree"];  
        } 
  
    }

    // }
// }
include('../config/config.php');

 include('../includes/body.php');
 include('../includes/sidebar.php'); 

?>



<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3 mx-4">
    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href='list.php'>Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
                        <form action="add.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="cname" class="form-control" id="floatingInput">
                            <label for="floatingInput">Category Name</label>
                            <span class="error"><?php echo $cnameErr; ?><span> 
                        </div>
                       
                        <div class="form-floating mb-3">
                                <select name="status" class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected disabled>Status</option>
                                    <option value="1" name="status">Active</option>
                                    <option value="0" name="status">Pending</option>
                                </select>
                                <label for="floatingSelect">Works with selects</label>
                                <span class="error"><?php echo $statusErr; ?><span>
                            </div>
                       
                       
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="agree" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Accept our <a href="#">Terms and conditions</a></label><br>
                                <span class="error"><?php echo $agreeErr; ?><span>
                            </div>
                            </div>
                        <button type="submit" name="add_category" class="btn btn-primary py-3 w-100 mb-4">Add Data</button>
                        </form>
                    </div>

                </div>
            </div>
        </div> 

<?php include('../includes/footer.php')?>