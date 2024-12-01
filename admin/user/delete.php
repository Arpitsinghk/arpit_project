<?php

include('../config/dbcon.php');
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM user_name where `id`='$id'";
    $result = mysqli_query($con,$sql); 
    if($result){
        echo 'successfulyy';
    echo '<script type ="text/JavaScript">';  
    echo 'alert("JavaScript Alert Box by PHP")';  
    echo '</script>';  
    
        header('location:list.php');

    }
    else{
        die(mysqli_error($con));
    }
}
?>

                                        