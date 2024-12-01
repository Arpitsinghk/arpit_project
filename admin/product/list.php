 <?php include '../includes/header.php';
 include('../includes/body.php');
include '../includes/sidebar.php';

include('../config/dbcon.php');
?>


<?php
include('../config/config.php');


// if($total !=0){
   

?>
<div class="container-fluid pt-4 px-4">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Product</li>
  </ol>
</nav>


<div class="bg-light rounded p-4">
                    
                    
                    <a class="btn btn-primary btn-info text-white mb-4" href="add.php">Add data</a>
                    <div class="table-responsive">
                        <table class="table text-center align-middle  table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-light bg-dark">
                                    <th class="align-middle" scope="col">Id</th>
                                    <th class="align-middle" scope="col">Product name</th>
                                    <th class="align-middle" scope="col">Single Image Product</th>
                                    <!-- <th class="align-middle" scope="col">Multiple Image Product</th> -->
                                    <th class="align-middle" scope="col">Category Id</th>
                                    <th class="align-middle" scope="col">Sub Category Id</th>
                                    <th class="align-middle" scope="col">Price</th>
                                    <th class="align-middle" scope="col">Status</th>
                                    <th class="align-middle" scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?PHP
                                $i=0;
                            while($result3 = mysqli_fetch_assoc($data3)){
                                        $i++;
                                        $pid = $result3['pid'];
                                        $photo = $result3['image'];
                                        $pname= $result3['pname'];
                                        $Subid = $result3['subid'];
                                        $catname = $result3['catname'];
                                        $price = $result3['price'];
                                         // fetching name to subcategory table

                                         $conn = mysqli_connect("localhost","root","","code") or die("connection failed");
                                         $sql1 =  "SELECT * FROM `subcategory` WHERE `sid` ='{$Subid}'";
                                         $data1 = mysqli_query($conn, $sql1);
                                      
                                              while($row1 = mysqli_fetch_assoc($data1)){     
                                                 $subcataid = $row1['subname']; 
                                                //  echo $subcataid;
                                               
                                              }
                                            
                                         // fetching name to category table

                                         $sq =  "SELECT * FROM `category` WHERE `cid` ='{$catname}'";
                                            
                                         $result_query = mysqli_query($conn, $sq) or die("connection not pass");
                                         while($row = mysqli_fetch_assoc($result_query)){     
                                                 $com = $row['cname']; 
                                                //  echo $com;
                                                 
                                              }
                                             ?>
                                       
                                         
                                        
                                        <?php
                                         
                                         ?>
                                        


                                        <tr>
                                         <td><?php echo $i; ?></td>
                                         <td><?php echo ucfirst($pname); ?></td>
                                         <td><img src="<?php echo BASE_URL ?>../assets/img/<?php echo $photo ?>" height=100px width=100px></td>
                                        <!-- <td> -->
                                            <!-- multiple image view -->
                                            <?php
                                                // echo "<div class='sol'>";
                                                // // echo "<div class=' w-100'>";
                                                // $image = explode(",",$result3['photo']);
                                                // foreach($image as $img){
                                                //     echo "<img src ='../assets/img/$img' height=50px width=50px >";
                                                // }
                                                // echo '</div>';
                                            ?>
                                           
                                        <!-- </td> -->
                                       
                                        <td><?php echo ucfirst($com); ?></td>
                                        <td><?php echo ucfirst($subcataid); ?></td>
                                        <td>&#8377;<?php echo $price; ?></td>
                                        <td>
                                        <?php 
                                        if($result3['pstatus'] == "1"){
                                            echo $pstatus ="
                                            <div class='form-check form-switch'>
                                            <input class='form-check-input' type='checkbox' checked disabled>
                                            </div>";
                                        }
                                        elseif($result3['pstatus'] == "0")
                                        { echo $pstatus ="
                                            <div class='form-check form-switch'>
                                            <input class='form-check-input' type='checkbox'  disabled>
                                            </div>";; 
                                            }
                                        ?>
                                        </td>
                                       
                                       <td class="">
                                        <div class="d-flex gap-2 p-3">
                                       <a href="edit.php?id=<?php echo $pid ?>" class="btn btn-sm  btn-primary">Update</a>
                                        <a href="delete.php?deleteid=<?php echo $pid ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                        </div>
                                        </tr>
                                        
                                <?php        
                                }
                            // }
                            ?>

                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


            <!-- <td><a href="edit.php?updateid=id" class="btn btn-primary">Update</a> -->
                                        
<?php include '../includes/footer.php';
?>