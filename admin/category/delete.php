<?php

include('../config/dbcon.php');
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM category where `cid`='$id'";
    $result = mysqli_query($con,$sql); 
    if($result){
         header('location:list.php');

    }
    else{
        
        die(mysqli_error($con));
    }
}
?>

                                        