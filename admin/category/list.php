<?php
// include('http://localhost/arpit_project/admin/includes/sidebar.php');
// include('includes/header.php');
?>
 
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
    <li class="breadcrumb-item active" aria-current="page">Category</li>
  </ol>
</nav>


<div class="bg-light rounded p-4">
                    
                    
                    <a class="btn btn-primary btn-info text-white mb-4" href="add.php">Add data</a>
                    <div class="table-responsive">
                        <table class="table text-start align-top text-center table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white bg-dark">
                                    <th class="align-middle" scope="col">User Id</th>
                                    <th class="align-middle" scope="col">Category name</th>
                                    <th class="align-middle" scope="col">Status</th>
                                    <!-- <th class="align-middle" scope="col">Created_at</th>
                                    <th class="align-middle" scope="col">Updated_at</th> -->
                                    <th class="align-middle" scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?PHP
                                $i=0;
                            while($result1 = mysqli_fetch_assoc($data1)){
                                        $i++;
                                        $cid = $result1['cid'];
                                        $cname= $result1['cname'];
                                        $status = $result1['status'];
                                        // $createat = $result1['created_at'];
                                        // $createend =$result1['updated_at'];
                                    ?>
                                        <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo ucfirst($cname) ?></td>
                                        <td>
                                        <?php 
                                        if($result1['status'] == "1"){
                                            echo $status ="
                                            <div class='form-check form-switch ms-5'>
                                            <input class='form-check-input' type='checkbox' checked disabled>
                                            </div>";
                                        }
                                        elseif($result1['status'] == "0")
                                        { echo $status ="
                                            <div class='form-check form-switch ms-5'>
                                            <input class='form-check-input' type='checkbox'  disabled>
                                            </div>"; 
                                            }
                                        ?>
                                        </td>
                                        <!-- <td><?php //echo $createat ?></td> -->
                                        <!-- <td><?php //echo $createend ?></td> -->
                                        <td class="">
                                        <div class="text-center">    
                                        <a href="edit.php?id=<?php echo $cid ?>" class="btn btn-sm btn-primary">Update</a>
                                        <a href="delete.php?deleteid=<?php echo $cid ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                        </div>
                                        </tr>
                            <?php
                                }
                            
                            ?>

                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


            <!-- <td><a href="edit.php?updateid=id" class="btn btn-primary">Update</a> -->
                                        
<?php include '../includes/footer.php';
?>