<?php 
error_reporting(0);
 include('../config/dbcon.php');
 
include('../includes/header.php');


  ?>




<?php

$pname = $subid = $pstatus = $price = $std_image = $catname = $agree = $photo =  "";  
$pnameErr = $subidErr = $pstatusErr = $std_imageErr =$catnameErr = $priceErr = $agreeErr = $photoErr ="";  
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
if(isset($_POST['add_product'])){
  if($pnameErr == "" && $subidErr == "" && $pstatusErr == "" && $std_imageErr == ""&& $catnameErr == ""&& $priceErr == ""&& $agreeErr == ""&& $photoErr == "" && $pstatusErr == ""){
            
  
 
    //Sub category Field Validation  
    if (empty ($_POST["pname"])) {  
        $pnameErr = "Product Name is required";  
        } else {  
              $pname =$_POST["pname"];  
        } 
  
           //Category Field Validation  
       if (empty ($_POST["subid"])) {  
        $subidErr = "Category is required";  
        } else {  
              $subid =$_POST["subid"];  
        } 

           //Category Field Validation  
       if (empty ($_POST["catname"])) {  
        $catnameErr = "Sub Category is required";  
        } else {  
              $catname =$_POST["catname"];  
        } 
  
           //substatus Field Validation  
       if (empty ($_POST["pstatus"])) {  
        $pstatusErr = "Status is required";  
        } else {  
              $pstatus =$_POST["pstatus"];  
        } 
       
        //substatus Field Validation  
       if (empty ($_POST["price"])) {  
        $priceErr = "Price is required";  
        } else {  
              $price =$_POST["price"];  
        } 

        //Terms and conditions Field Validation  
       if (empty ($_POST["agree"])) {  
        $agreeErr = "Terms and conditions is required";  
        } else {  
              $agree =$_POST["agree"];  
        } 
        //Photo Field Validation  
       if (empty ($_POST["photo"])) {  
        $photoErr = "Please Upload the Image";  
        } else {  
              $photo =$_POST["photo"];  
        } 
  
    }

    }
}

include('../config/config.php');
?>
<?php
 include('../includes/body.php');
 include('../includes/sidebar.php'); 
?>



 




<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3 mx-4">
    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href='list.php'>Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                        <form action="add.php" method="post" enctype="multipart/form-data">

                                                        <!-- Product Name -->

                        <div class="form-floating mb-3">
                            <input type="text" name="pname" class="form-control" id="floatingInput">
                            <label for="floatingInput">Product Name</label>
                            <span class="error"><?php echo $pnameErr; ?><span> 
                        </div>
                        
                                                        <!-- category -->

                        <div class="form-floating mb-3"> 
                            <select name="subid" class="form-select mb-3" aria-label="Default select example">
                        <option selected disabled>Category</option>
                        <?php
                        $conn = mysqli_connect("localhost","root","","code") or die("connection failed");

                        $sql =  "SELECT * FROM category";
                        
                        $result = mysqli_query($conn,$sql) or die("Query unsucessful.");

                            while($row = mysqli_fetch_assoc($result)){     
                        ?>
                        <option value="<?php echo $row['cid']; ?>"><?php echo $row['cname']; ?></option>
                        <?php } ?>
                        </select>
                        <span class="error"><?php echo $subidErr; ?></span>
                        <label for="floatingSelect">Category Id</label>
                        
                                <!-- Sub category -->

                        <div class="form-floating mb-3"> 
                            <select name="catname" class="form-select mb-3" aria-label="Default select example">
                        <option selected disabled>Sub Category Id</option>

                        <?php
                        if(isset($_GET["cname"])){
                            $catname = $_GET["cname"];
                        }
                        $conn = mysqli_connect("localhost","root","","code") or die("connection failed");

                        $sql =  "SELECT * FROM subcategory";
                        $result = mysqli_query($conn,$sql) or die("Query unsucessful.");

                            while($row = mysqli_fetch_assoc($result)){     
                        ?>
                        <option value="<?php echo $row['sid']; ?>"><?php echo $row['subname']; ?></option>
                        <?php } ?>
                        </select>
                        <span class="error"><?php echo $catnameErr; ?></span>
                        <label for="floatingSelect">Sub Category Id</label>
                        
                        </div>
                                        <!-- price -->


                        <div class="form-floating mb-3">
                            <input type="number" name="price" class="form-control" id="floatingInput">
                            <label for="floatingInput">Price</label>
                            <span class="error"><?php echo $priceErr; ?><span> 
                        </div>

                                        <!-- status -->

                        <div class="form-floating mb-3">
                                <select name="pstatus" class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected disabled>Status</option>
                                    <option value="1" name="pstatus">Active</option>
                                    <option value="0" name="pstatus">Pending</option>
                                </select>
                                <label for="floatingSelect">Status of Product</label>
                                <span class="error"><?php echo $pstatusErr; ?></span>
                            </div>

                                    <!-- multiple image upload     -->

                    <div class="form-floating mb-3">
                        <input type="file" name="photo[]" class="form-control" multiple/>
                        <label for="floatingInput">Multiple Image upload</label>
                        <span class="error"><?php echo $photoErr; ?></span>
                    </div>

                                    <!-- single image upload -->

                    <div class="form-floating mb-3">
                        <input type="file" name="image" class="form-control" mulitple/>
                        <span class="error"><?php echo $photoErr; ?></span>
                        <label for="floatingInput">Single Image upload</label>
                    </div>

                        
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Accept our <a href="#">Terms and conditions</a></label><br>
                                <span class="error"><?php echo $agreeErr; ?></span>
                            </div>
                            </div>
                        
                        <button type="submit" name="add_product" class="btn btn-primary py-3 w-100 mb-4">Add Data</button>
                        </form>

                    </div>

                </div>
            </div>
        </div> 

<?php include('../includes/footer.php')?>