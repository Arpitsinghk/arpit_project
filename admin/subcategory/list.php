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
    <li class="breadcrumb-item active" aria-current="page">Sub Category</li>
  </ol>
</nav>


<div class="bg-light rounded p-4">
                    
                    
                    <a class="btn btn-primary btn-info text-white mb-4" href="add.php">Add data</a>
                    <div class="table-responsive">
                        <table class="table text-center align-top table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-light bg-dark">
                                    <th class="align-middle" scope="col">Id</th>
                                    <th class="align-middle" scope="col">Sub Category name</th>
                                    <th class="align-middle" scope="col">Status</th>
                                    <!-- <th class="align-middle" scope="col">Created_at</th>
                                    <th class="align-middle" scope="col">Updated_at</th> -->
                                    <th class="align-middle" scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?PHP
                                $i=0;
                            while($result2 = mysqli_fetch_assoc($data2)){
                                        $i++;
                                        $sid = $result2['sid']; 
                                        $subname = $result2['subname']; 
                                        ?>
                                      <?php

                                     
                                        $create_at = $result2['created_at'];
                                        $update_at =$result2['updated_at'];
                                    ?>
                                        <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo ucfirst($subname); ?></td>
                                        <td> <?php 
                                        if($result2['substatus'] == "1"){
                                            echo $substatus ="
                                            <div class='form-check form-switch ms-5'>
                                            <input class='form-check-input ' type='checkbox' checked disabled>
                                            </div>";
                                        }
                                        elseif($result2['substatus'] == "0")
                                        { echo $substatus ="
                                            <div class='form-check form-switch ms-5'>
                                            <input class='form-check-input' type='checkbox'  disabled>
                                            </div>"; 
                                            }
                                        ?></td>
                                        <!-- <td><?php //echo $create_at; ?></td> -->
                                        <!-- <td><?php //echo $update_at; ?></td> -->
                                        <?php
                                        echo '<td>
                                        <div class="text-center">
                                        <a href="edit.php?id='.$sid.'" class="btn btn-sm btn-primary">Update</a>
                                        <a href="delete.php?deleteid='.$sid.'" class="btn btn-sm btn-danger">Delete</a>
                                        </div>
                                        </td>
                                        </tr>';
                                      
                                }
                            ?>

                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

                           
<?php include '../includes/footer.php';
?>