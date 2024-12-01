<?php
// include('http://localhost/arpit_project/admin/includes/sidebar.php');
// include('includes/header.php');
?>
 
 <?php 
include '../includes/header.php';
include('../includes/body.php');
include '../includes/sidebar.php'; 
include('../config/dbcon.php');
include('../config/config.php');

if($total !=0){
?>

<div class="container-fluid pt-4 px-4">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">User</li>
  </ol>
</nav>


<div class="bg-light rounded p-4">
                   
                    
                    <a class="btn btn-info text-white mb-4" href="add.php">Add data</a>
                    <div class="table-responsive">
                        <table class="table text-start align-top text-center table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white bg-dark">
                                    <th class="align-middle" scope="col">User Id</th>
                                    <th class="align-middle" scope="col">First Name</th>
                                    <th class="align-middle" scope="col">Last Name</th>
                                    <th class="align-middle" scope="col">Email</th>
                                    <th class="align-middle" scope="col">Role</th>
                                    <!-- <th class="align-middle" scope="col">Password</th> -->
                                    <th class="align-middle" scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?PHP
                                $i=0;
                             while($result = mysqli_fetch_assoc($data)){
                                        $id = $result['uid'];
                                        $fname= $result['fname'];
                                        $lname = $result ['lname'];
                                        $email = $result ['email'];
                                        $role =$result ['role'];
                                        // $password =$result ['password'];
                                        $i++;
                                        // <td>$password</td>
                                        echo '<tr>

                                        <td>'.$i.'</td>
                                        <td>'.strtoupper($fname).'</td>
                                        <td>'.strtoupper($lname).'</td>
                                        <td>'.$email.'</td>
                                        <td>'.$role.'</td>
                                        
                                        <td class="d-flex gap-2"><a href="edit.php?id='.$id.'" class="btn btn-sm btn-primary">Update</a>
                                        <a href="delete.php?deleteid='.$id.'" class="btn btn-sm btn-danger">Delete</a></td>
                                        </tr>';
                                        
                                }
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