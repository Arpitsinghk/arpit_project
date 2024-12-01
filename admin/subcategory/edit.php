
<?php


include('../includes/header.php');
include('../includes/body.php');
 include('../includes/sidebar.php'); 
 

 include('../config/dbcon.php');
?>

<?php
if(isset($_GET['id'])){
$id = $_GET['id'];

$sql = "SELECT * FROM `subcategory` where `sid` = '$id'";

$result = mysqli_query($con,$sql);

if(!$result){
    die("query failed".mysqli_error($con));
}
else{
    $row = mysqli_fetch_assoc($result);
    
}
}

 ?>
<?php

if(isset($_POST['subcategory_update'])){
  
    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

  $cname = $_POST["cname"];
  $status = $_POST["status"];
   
  $sql="UPDATE `subcategory` SET `cname`='$cname',`status`='$status',`updated_at`='$createend' WHERE `cid`='$idnew'";
  $result=mysqli_query($con,$sql);
  if(!$result){
    die("query failed".mysqli_error($con));  
    
  }
  else{
    echo 'successfulyy';
   
  }
  } 
?>



<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3 mx-4">
    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href='list.php'>Sub Category</a></li>
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
                        <form action="<?php echo BASE_URL ?>/config/config.php?id_new=<?php echo $id ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="subname" value="<?php echo $row['subname'];?>" class="form-control" id="floatingInput">
                            <label for="floatingInput">Sub Category Name</label> 
                        </div>
                        
                        <div class="form-floating mb-3">
                                <select name="substatus" class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    
                                    <option value="1"<?php if($row['substatus'] == "1"){ echo "selected"; } ?>>Active</option>
                                    <option value="0"<?php if($row['substatus'] == "0"){ echo "selected"; } ?>>Pending</option>
                                    
                                    
                                </select>
                                <label for="floatingSelect">Works with selects</label>
                            </div>

                       <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Terms and conditions</label>
                            </div>
                            </div>

                        <button type="submit" name="subcategory_update" class="btn btn-primary py-3 w-100 mb-4">Update Data</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
         
<?php

include('../includes/footer.php');
?>