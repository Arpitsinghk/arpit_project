
<?php include 'dbcon.php'; ?>

                        <!-- Add user data -->
<?php 
//   ip address make

  function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



if(isset($_POST['add_submit'])){
    if($fnameErr == "" && $lnameErr == "" && $emailErr == "" && $passwordErr  == "" && $cpasswordErr == "" && $genderErr == ""){
    if($password == $cpassword){
        
        
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password']; 
    $ip = getIPAddress();
    $role=$_POST['role'];
    $gender=$_POST['gender'];
    

    // path
    // $location = $path.$user_image;

    // // checking empty connection
    // move_uploaded_file($temp_image,$location);

    $signup_query = "SELECT * from `user_signup` where `email` = '$email'";
    $result= mysqli_query($con,$signup_query);
    if($result){
        $num_signup = mysqli_num_rows($result); 
        if($num_signup>0){
            $user=1;
            echo "<script>alert('This email already exists')<script>";
        }
        else{
            $user_image = $_FILES['image']['name'];
            //temp name
            $temp_image = $_FILES['image']['tmp_name'];
            $path = './admin/assets/img/';
    $location = $path.$user_image;
    // checking empty connection
    move_uploaded_file($temp_image,$location);
    $query = "INSERT INTO `user_signup`(`fname`,`lname`,`email`,`password`,`user_ip`,`role`,`gender`,`image`) 
    VALUES('$fname','$lname','$email','$password','$ip','$role','$gender','$user_image')";
    $result = mysqli_query($con,$query);
    if($result){
        $login=1;
        echo "<script>alert('This item is added sucessfully')</script>";
        header('location:http://localhost/arpit_project/admin/user/list.php');
    }
    else{
        $invalid=1;
        // die("invalid id");
    }
    
}
}
   
}
else{
    $match=1;
}
    }
else{
  $error=1;
//   echo "<script>alert('Please fill all the required imformation.')</script>";

}
}
?>


                          <!--  show user list -->
                          

<?php
$sql = 'SELECT * FROM user_signup';
$data = mysqli_query($con, $sql);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
?>


                                <!-- update user -->


<?php
                                  
if (isset($_POST['update_students'])) {
    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }

    $fname1 = $_POST["fname"];
    $lname1 = $_POST["lname"];
    $email1 = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $role = $_POST["role"];
    $gender = $_POST["gender"];

    $ImageName = $_FILES['image']['name'];
    $fileElementName = 'image';
    $path = "../assets/img/";
    $location = $path . basename($_FILES['image']['name']);
    $FileType = strtolower(pathinfo($location,PATHINFO_EXTENSION));

    if($_FILES['image']['tmp_name'] != ""){ 
        move_uploaded_file($_FILES['image']['tmp_name'], $location);
        $sql = "UPDATE `user_signup` SET `fname`='$fname1',`lname`='$lname1',`email`='$email1',`password`='$password',`role`='$role',`gender`='$gender',`image`='$ImageName' WHERE `uid`='$idnew'";
        }
        else{
            $sql = "UPDATE `user_signup` SET `fname`='$fname1',`lname`='$lname1',`email`='$email1',`password`='$password',`role`='$role',`gender`='$gender' WHERE `uid`='$idnew'";
   
        }


//     $image = $_FILES['image']['name'];
//     $tmp_name = $_FILES['image']['tmp_name'];
//     $path = "../assets/img/";   
//     $loaction = $path.$tmp_name;
//    if(($_FILES['image']['tmp_name']) != "" ){
//     move_uploaded_file($location,$image);
//    $sql = "UPDATE `user_signup` SET `fname`='$fname1',`lname`='$lname1',`email`='$email1',`password`='$password',`cpassword`='$cpassword',`role`='$role',`gender`='$gender',`image`='$image' WHERE `uid`='$idnew'";
//    }
//    else{
//     $sql = "UPDATE `user_signup` SET `fname`='$fname1',`lname`='$lname1',`email`='$email1',`password`='$password',`cpassword`='$cpassword',`role`='$role',`gender`='$gender' WHERE `uid`='$idnew'";
//    } 


   $result = mysqli_query($con, $sql);
    if (!$result) {
        die("query failed" . mysqli_error($con));
    } else {
        echo 'successfulyy';
        echo '<script type ="text/JavaScript">';
        echo 'alert("JavaScript Alert Box by PHP")';
        echo '</script>';

        header('location:http://localhost/arpit_project/admin/user/list.php');
    }
}

                                    // Add category



if (isset($_POST['add_category'])) {
    if ($cnameErr == "" && $statusErr == "" && $agreeErr == "") {
        $cname = $_POST['cname'];
        $status = $_POST['status'];

        $sql = "INSERT INTO `category`(`cname`,`status`) values ('$cname','$status')";
        $result = mysqli_query($con, $sql) or die();
        if ($result) {
            // echo "Data uploaded successfully";
            header('location:http://localhost/arpit_project/admin/category/list.php');
        } else {
            die(mysqli_error($con));
        }
    }
}
?>

                        <!-- show category list -->
<?php
$sql = 'SELECT * FROM category';
$data1 = mysqli_query($con, $sql);
$total1 = mysqli_num_rows($data1);
$result1 = mysqli_fetch_assoc($data1);
?>

                          <!-- Update category data -->



<?php if (isset($_POST['category_update'])) {
    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }

    $cname = $_POST["cname"];
    $status = $_POST["status"];

    $sql = "UPDATE `category` SET `cname`='$cname',`status`='$status' WHERE `cid`='$idnew'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("query failed" . mysqli_error($con));
    } else {
        echo 'successfulyy';
        header('location:http://localhost/arpit_project/admin/category/list.php');
        
    }
} ?>

                             <!-- sub category -->
<?php 

if (isset($_POST['add_subcategory'])) {
    if ($subnameErr == "" && $substatusErr == "" && $agreeErr == "") {
        $subname = $_POST['subname'];
        
        $substatus = $_POST['substatus'];

        $sql = "INSERT INTO subcategory(subname,substatus) values ('$subname','$substatus')";
        ($result = mysqli_query($con, $sql)) or die();
        if ($result) {
            echo "Data uploaded successfully";
            header('location:http://localhost/arpit_project/admin/subcategory/list.php');
        } else {
            die(mysqli_error($con));
        }
    }
} ?>

                       <!-- show Sub Category list -->


                       <?php
                       $sql = 'SELECT * FROM subcategory';
                       $data2 = mysqli_query($con, $sql);
                       $total2 = mysqli_num_rows($data2);
                       $result2 = mysqli_fetch_assoc($data2);
                       ?>



                        <!-- Update sub category list -->
<?php if (isset($_POST['subcategory_update'])) {
    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }

    $subname = $_POST["subname"];
  
    $substatus = $_POST["substatus"];

    $sql = "UPDATE `subcategory` SET `subname`='$subname',`substatus`='$substatus' WHERE `sid`='$idnew'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("query failed" . mysqli_error($con));
    } else {
        header('location:http://localhost/arpit_project/admin/subcategory/list.php');
    }
} ?>

                          <!--ADD Product -->
   <?php 

   if (isset($_POST['add_product'])) {
       if($pnameErr == "" && $subidErr == "" && $pstatusErr == "" && $priceErr == ""
       && $agreeErr == "" && $photoErr == ""){
       $total = $_FILES["photo"]["name"];

       foreach ($total as $key => $value) {
           $name = implode(",", $_FILES['photo']['name']);
           $tmpFile = $_FILES['photo']['tmp_name'][$key];

           if ($tmpFile != "") {
               $newFilePath = "../assets/img/" . $_FILES['photo']['name'][$key];
               if (move_uploaded_file($tmpFile, $newFilePath)) {
                   print_r($newFilePath);
               }
           }
       }

       $ImageName = $_FILES['image']['name'];
       $fileElementName = 'image';
       $path = "../assets/img/";
       $location = $path . $_FILES['image']['name'];
       move_uploaded_file($_FILES['image']['tmp_name'], $location);

       $pname = $_POST['pname'];
       $subid = $_POST['subid'];
       $catname = $_POST['catname'];
       $price = $_POST['price'];
       $pstatus = $_POST['pstatus'];
       $sql = "INSERT INTO product(image,photo,pname,catname,subid,price,pstatus) values ('$ImageName','$name','$pname','$catname','$subid','$price','$pstatus')";
       ($result = mysqli_query($con, $sql)) or die();
       if($result) {
           header('location:http://localhost/arpit_project/admin/product/list.php');
       } else {
           die(mysqli_error($con));
       }
   }
}
?>

                        <!-- show Product list -->
                        <?php
                        $sql = 'SELECT * FROM product';
                        $data3 = mysqli_query($con, $sql);
                        $total3 = mysqli_num_rows($data3);
                        $result3 = mysqli_fetch_assoc($data3);
                        ?>
                      

                        <!-- Update product list -->
                        <?php if (isset($_POST['update_product'])) {
                            if (isset($_GET['id_new'])) {
                                $idnew = $_GET['id_new'];
                            }
                            
                            $pname = $_POST["pname"];
                            $subname = $_POST["subname"];
                            $subid = $_POST["subid"];
                            $price = $_POST["price"];
                            $pstatus = $_POST["pstatus"];
                            $ImageName = $_FILES['image']['name'];
                            $fileElementName = 'image';
                            $path = "../assets/img/";
                            $location = $path . basename($_FILES['image']['name']);
                            $FileType = strtolower(pathinfo($location,PATHINFO_EXTENSION));
                            
                                if($_FILES['image']['tmp_name'] != ""){ 
                                move_uploaded_file($_FILES['image']['tmp_name'], $location);
                                $sql = "UPDATE `product` SET `image`='$ImageName',`catname` ='$subid',`pname`='$pname',`subid`='$subname',`price`='$price',`pstatus`='$pstatus' WHERE `pid`='$idnew'";
                            }
                            else{
                                $sql = "UPDATE `product` SET `catname` ='$subid',`pname`='$pname',`subid`='$subname',`price`='$price',`pstatus`='$pstatus' WHERE `pid`='$idnew'";
                           }
                            $result = mysqli_query($con, $sql);
                            if (!$result) {
                                die("query failed" . mysqli_error($con));
                            } else {
                                echo '<script>alert sucessfully</script>';
                                header('location:http://localhost/arpit_project/admin/product/list.php');
                            }
                           
                        }
                         ?>       
                        
                        
     <?php if (isset($_POST['update_product'])) {
         $total = $_FILES["photo"]["name"];

         foreach ($total as $key => $value) {
             $name = implode(",", $_FILES['photo']['name']);
             $tmpFile = $_FILES['photo']['tmp_name'][$key];

             if ($tmpFile != "") {
                 $newFilePath = "../assets/img/" . $_FILES['photo']['name'][$key];
                 if (move_uploaded_file($tmpFile, $newFilePath)) {
                     print_r($newFilePath);
          

         $sql = "UPDATE `product` SET `photo`='$name' WHERE pid = '$idnew'";
         ($result = mysqli_query($con, $sql)) or die();
         if ($result) {
         } else {
             die(mysqli_error($con));
         }
     }
    }
}
}

?>
