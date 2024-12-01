
<?php


include('../includes/header.php');
include('../includes/body.php');
 include('../includes/sidebar.php'); 
 

 
?>
<?php 
$hostname = "localhost";
$username ="root";
$password = "";
$dbname = "crud";

$con = mysqli_connect($hostname,$username,$password,$dbname);

if(!$con){
    echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 

    header("Location:http://localhost/arpit_project/admin/error/db.php");
    die();
}



?>

<?php

 if(isset($_POST['add_product'])){  
  
      $total = ($_FILES["image"]["name"]);

     foreach ($total as $key => $value) {
        $name =   implode(",", $_FILES['image']['name']); 
        $tmpFile = $_FILES['image']['tmp_name'][$key];
      
       if ($tmpFile != ""){
          $newFilePath = "../assets/img/" . $_FILES['image']['name'][$key];
          if(move_uploaded_file($tmpFile, $newFilePath)) {
            print_r($newFilePath);
            
            }
       }
     }
    
     $sql="UPDATE `gallery` SET `image`='$name' WHERE id = '74'";
     $result=mysqli_query($con,$sql) or die();
        if($result){
        //   header('location:http://localhost/arpit_project/admin/product/list.php');
        }
        else{
         die(mysqli_error($con));
        }
     
     }  

?>




<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3 mx-4">
    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>/index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href='list.php'>Product</a></li>
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

                        <form action="adit.php" method="post" enctype="multipart/form-data">
                        
                            
                            <div class="form-floating mb-3">
                            <input type="file" name="image[]" cslass="form-control" multiple/>
                                <!-- <input type="text" name="photo[]" value="<?php //echo $row['photo']; ?>" class="form-control" multiple> -->
                                <label for="floatingInput">Multiple Image uploaded</label>
                            </div>
                               
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Terms and conditions</label>
                            </div>
                            </div>
                        <button type="submit" name="add_product" class="btn btn-primary py-3 w-100 mb-4">Add Data</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
         
<?php


include('../includes/footer.php');
?>

