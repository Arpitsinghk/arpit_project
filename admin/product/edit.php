
<?php


include('../includes/header.php');
include('../includes/body.php');
 include('../includes/sidebar.php'); 
 

 include('../config/dbcon.php');
?>

<?php
if(isset($_GET['id'])){
$id = $_GET['id'];

$sql = "SELECT * FROM `product` where `pid` = '$id'";

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

                        <form action="<?php echo BASE_URL ?>/config/config.php?id_new=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" value="<?php echo $row['pname'];?>" name="pname" class="form-control" id="floatingInput">
                            <label for="floatingInput">Product Name</label> 
                        </div>

                        <!-- Sub category -->

                        <div class="form-floating mb-3">
                        <?php
                        $conn = mysqli_connect("localhost","root","","coded") or die("connection failed");
                           $sql1 =  "SELECT * FROM subcategory";
                        $result1 = mysqli_query($conn,$sql1) or die("Query unsucessful.");

                    if(mysqli_num_rows($result1) > 0){
                        echo '<select name="subname" class="form-select">';
                        while($row1 = mysqli_fetch_assoc($result1)){     
                    if($row['subid'] == $row1['sid']){
                    $select = "selected";
                    }
                    else{
                        $select ="";
                    }
                    
                    echo "<option {$select} value='{$row1['sid']}'>{$row1['subname']}</option>";
                        }
                        echo"</select>";
                    } 
                    
                    ?>
                    <label for="floatingSelect">Sub Category Id</label>
                    </div>
                       
                    <div class="form-floating mb-3">
                        <?php
                        $conn = mysqli_connect("localhost","root","","coded") or die("connection failed");
                           $sql3 =  "SELECT * FROM category";
                        $result3 = mysqli_query($conn,$sql3) or die("Query unsucessful.");

                    if(mysqli_num_rows($result3) > 0){
                        echo '<select name="subid" class="form-select">';
                        while($row3 = mysqli_fetch_assoc($result3)){     
                    if($row['catname'] == $row3['cid']){
                    $select = "selected";
                    }
                    else{
                        $select ="";
                    }
                    
                    echo "<option {$select} value='{$row3['cid']}'>{$row3['cname']}</option>";
                        }
                        echo"</select>";
                    } 
                    
                    ?>
                    <label for="floatingSelect">Category Id</label>
                    </div>

                    
                        <div class="form-floating mb-3">
                            <input type="number" value="<?php echo $row['price'];?>" name="price" class="form-control" id="floatingInput">
                            <label for="floatingInput">Price</label> 
                        </div>
                        <div class="form-floating mb-3">
                                <select name="pstatus" class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    
                                    <option value="1"<?php if($row['pstatus'] == "1"){ echo "selected"; } ?>>Active</option>
                                    <option value="0"<?php if($row['pstatus'] == "0"){ echo "selected"; } ?>>Pending</option>
                                    
                                    
                                </select>
                                <label for="floatingSelect">Status</label>
                            </div>

                                <!-- single image -->
                            
                            <div class="form-floating mb-3">
                            <input type="file" name="image" class="form-control"/>
                                <input type="hidden" name="image_old" value="<?php echo $row['image'];?>" class="form-control" disabled>
                                <img src="<?php echo BASE_URL ?>../assets/img/<?php echo $row['image']; ?>" class='sol' height=50px width=50px>
                                <label for="floatingInput">Single Image uploaded</label>
                            </div>
                            
                                <!-- multiple image -->
                               
                            <div class="form-floating mb-3">
                            <input type="file" name="photo[]" value="<?php echo $row['photo']; ?>" class="form-control" multiple/>
                                <input type="hidden" name="photo[]" value="<?php echo $row['photo']; ?>" class="form-control" disabled>
                                <?php
                                     
                                                echo "<div class='sol'>";
                                                // echo "<div class=' w-100'>";
                                                $image = explode(",",$row['photo']);
                                                foreach($image as $img){
                                                    echo "<img src ='../assets/img/$img' height=50px width=50px >";
                                                }
                                                echo '</div>';
                                            
                                            ?>
                                <label for="floatingInput">Multiple Image uploaded</label>
                            </div>
                               
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Terms and conditions</label>
                            </div>
                            </div>
                        <button type="submit" name="update_product" class="btn btn-primary py-3 w-100 mb-4">Add Data</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
         
<?php
include('../config/config.php');
include('../includes/footer.php');
?>