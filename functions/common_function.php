<?php
include('./config/connect.php');

// getting products


        
function getproducts(){
    global $con;
    // check condition if isset or not
    if(!isset($_GET["category"])){
        if(!isset($_GET["subcategory"])){
        $select_query = "select * from `product` order by rand() LIMIT 0,8";
        $result_query= mysqli_query($con,$select_query);
       
        
        while($row = mysqli_fetch_assoc($result_query)){
            $product_id = $row['pid'];
            $image = $row['image'];
            $multiple_photo = $row['photo'];
            $pname = $row['pname'];
            $catname = $row['catname'];
            $price = $row['price'];
            $pstatus = $row['pstatus'];
        //     if($pstatus == '1'){
        //     $pstatus1 ="<p class='text-success'>Avilable Now</p>";
        // }
        //     else{
        //     $pstatus2 ="<p class='text-danger'>Not Avilable Now</p>";
        // }
                 
            
            //  if($row['pstatus'] == "1"){
           
           echo "<div class='col-md-4 col-sm-6 mb-2'>
            <div class='bg-light' style='width: 100%;'>
                <img src='./admin/assets/img/$image' style='width:100%; height:250px;'' class='object-fit-fill rounded mx-auto d-block ' alt='...' />
                <div class='card-body'>
                    <h5 class='card-title text-center fs-6 ellipsis'>$pname</h5>
                    <div class='text-center'>
                    
                    <div class='card-text mb-2'>
                    <p class='text-success'>Avilable Now</p>
                    </div>
                        
                 <p class='btn btn-outline-danger style='width:100%;''>Deal of the day</p>
                    
                    <p class='fs-6'>M.R.P:<span class='fs-5 ms-2 text-info'>&#8377;$price/-</span></p>
                    </div>
                    <div class='d-flex justify-content-evenly'>
                    <abbr title='Add to Cart'><a href='index.php?add_to_cart=$product_id' class=''><i class='fa-solid fa-cart-shopping'></i></a></abbr>
                    <abbr title='View More' class='float-right'><a href='product_details.php?product_id=$product_id'><i class='fa-solid fa-mountain-sun'></i></a></abbr>
                </div>
                </div>
            </div>
        </div>";
    }
}
}
}

// }
        ?>


    <?php
    

    function get_unique_categories(){
        global $con;

        if(isset($_GET['category'])){
            $category_id = $_GET['category'];
        $select_query_1 = "select * from `product` where catname =$category_id";
        $result_query_1= mysqli_query($con,$select_query_1);
        $nums_of_rows = mysqli_num_rows($result_query_1);
        if($nums_of_rows == 0){
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }
        while($row = mysqli_fetch_assoc($result_query_1)){
            $product_id = $row['pid'];
            $image = $row['image'];
            $multiple_photo = $row['photo'];
            $pname = $row['pname'];
            $catname = $row['catname'];
            $price = $row['price'];
            $pstatus = $row['pstatus'];
            echo "<div class='col-md-4 col-sm-6 mb-2'>
            <div class='bg-light' style='width: 100%;'>
                <img src='./admin/assets/img/$image' style='width:100%; height:250px;'' class='object-fit-fill rounded mx-auto d-block ' alt='...' />
                <div class='card-body'>
                    <h5 class='card-title text-center fs-6 ellipsis'>$pname</h5>
                    <div class='text-center'>
                    
                    <div class='card-text mb-2'>
                    <p class='text-success'>Avilable Now</p>
                    </div>
                        
                 <p class='btn btn-outline-danger style='width:100%;''>Deal of the day</p>
                    
                    <p class='fs-6'><span class='fs-5'>$price</span></p>
                    </div>
                    <div class='d-flex justify-content-evenly'>
                    <abbr title='Add to Cart'><a href='index.php?add_to_cart=$product_id' class=''><i class='fa-solid fa-cart-shopping'></i></a></abbr>
                    <abbr title='View More' class='float-right'><a href='product_details.php?product_id=$product_id'><i class='fa-solid fa-mountain-sun'></i></a></abbr>
                </div>
                </div>
            </div>
        </div>";
        }
    }
}
    

    function get_unique_Brands(){
        global $con;

        if(isset($_GET['subcategory'])){
            $subcategory_id = $_GET['subcategory'];
        $select_query_1 = "select * from `product` where subid =$subcategory_id";
        $result_query_1= mysqli_query($con,$select_query_1);
        $nums_of_rows = mysqli_num_rows($result_query_1);
        if($nums_of_rows == 0){
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }
        while($row = mysqli_fetch_assoc($result_query_1)){
            $product_id = $row['pid'];
            $image = $row['image'];
            $multiple_photo = $row['photo'];
            $pname = $row['pname'];
            $catname = $row['catname'];
            $price = $row['price'];
            $pstatus = $row['pstatus'];
            echo "<div class='col-md-4 col-sm-6 mb-2'>
            <div class='bg-light' style='width: 100%;'>
                <img src='./admin/assets/img/$image' style='width:100%; height:250px;'' class='object-fit-fill rounded mx-auto d-block ' alt='...' />
                <div class='card-body'>
                    <h5 class='card-title text-center fs-6 ellipsis'>$pname</h5>
                    <div class='text-center'>
                    
                    <div class='card-text mb-2'>
                    <p class='text-success'>Avilable Now</p>
                    </div>
                        
                 <p class='btn btn-outline-danger style='width:100%;''>Deal of the day</p>
                    
                    <p class='fs-6'><span class='fs-5'>$price</span></p>
                    </div>
                    <div class='d-flex justify-content-evenly'>
                    <abbr title='Add to Cart'><a href='index.php?add_to_cart=$product_id' class=''><i class='fa-solid fa-cart-shopping'></i></a></abbr>
                    <abbr title='View More' class='float-right'><a href='product_details.php?product_id=$product_id'><i class='fa-solid fa-mountain-sun'></i></a></abbr>
                </div>
                </div>
            </div>
        </div>";
        }
    }
}



                            // displaying subcategory

    function getbrands(){
        global $con;
        $select_brands = "select * from `subcategory`";
        $result_brands = mysqli_query($con,$select_brands);
        while($row_data = mysqli_fetch_assoc($result_brands)){
            $brand_title = $row_data['subname'];
            $brand_id = $row_data['sid'];
            echo "<li class='nav-item text-center'>
            <a href='index.php?subcategory=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li>";
        }
    }


                        // displaying catgories

    function getcategory(){
        global $con;
        $select_category = "select * from `category`";
                            $result_category = mysqli_query($con,$select_category);
                            while($row_data_1 = mysqli_fetch_assoc($result_category)){
                                $category_title = $row_data_1['cname'];
                                $category_id = $row_data_1['cid'];
                                echo "<li class='nav-item text-center'>
                                <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                            </li>";
                            }
    }

        // search products

        function search_products(){
            global $con;
                if(isset($_GET['search_data_product'])){
                    $search_data_value = $_GET['search_data'];
                $search_query = "select * from `product` where pname like '%$search_data_value%'";
                $result_query= mysqli_query($con,$search_query);
                $nums_of_rows = mysqli_num_rows($result_query);
                if($nums_of_rows == 0){
                    echo "<h2 class='text-center text-danger'>No result match. No Product found on this category.</h2>";
                }
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['pid'];
                    $image = $row['image'];
                    $multiple_photo = $row['photo'];
                    $pname = $row['pname'];
                    $catname = $row['catname'];
                    $price = $row['price'];
                    $pstatus = $row['pstatus'];
                
                   echo "<div class='col-md-4 col-sm-6 mb-2'>
                    <div class='bg-light' style='width: 100%;'>
                        <img src='./admin/assets/img/$image' style='width:100%; height:250px;'' class='object-fit-fill rounded mx-auto d-block ' alt='...' />
                        <div class='card-body'>
                            <h5 class='card-title text-center fs-6 ellipsis'>$pname</h5>
                            <div class='text-center'>
                            
                            <div class='card-text mb-2'>
                            <p class='text-success'>Avilable Now</p>
                            </div>
                                
                         <p class='btn btn-outline-danger style='width:100%;''>Deal of the day</p>
                            
                            <p class='fs-6'>&#8377;<span class='fs-5'>$price</span></p>
                            </div>
                            <div class='d-flex justify-content-evenly'>
                            <abbr title='Add to Cart'><a href='index.php?add_to_cart=$product_id' class=''><i class='fa-solid fa-cart-shopping'></i></a></abbr>
                            <abbr title='View More' class='float-right'><a href='#'><i class='fa-solid fa-mountain-sun'></i></a></abbr>
                        </div>
                        </div>
                    </div>
                </div>";
            }
        }
    }

    // View more Products 

    function view_details(){
        global $con;
        // check condition if isset or not
        if(isset($_GET["product_id"])){
        if(!isset($_GET["category"])){
            if(!isset($_GET["subcategory"])){
                $product_id =$_GET['product_id'];
            $select_query = "select * from `product` where pid=$product_id";
            $result_query= mysqli_query($con,$select_query);
           
            
            while($row = mysqli_fetch_assoc($result_query)){
                $product_id = $row['pid'];
                $image = $row['image'];
                // $multiple_photo = $row['photo'];
                $pname = $row['pname'];
                $catname = $row['catname'];
                $price = $row['price'];
                $pstatus = $row['pstatus'];
                $multiple_photo = explode(",",$row['photo']);
                // foreach($multiple_photo as $img){
                //     echo "<img src ='./admin/assets/img/$img' height150px width=350px >";
                //     // echo "<img src ='../assets/img/$img' height=50px width=50px >";
                // }
               echo "<div class='col-md-4 col-sm-6 mb-2'>
                <div class='bg-light' style='width: 100%;'>
                    <img src='./admin/assets/img/$image' style='width:100%; height:250px;'' class='object-fit-fill rounded mx-auto d-block ' alt='...' />
                    <div class='card-body'>
                        <h5 class='card-title text-center fs-6 ellipsis'>$pname</h5>
                        <div class='text-center'>
                        
                        <div class='card-text mb-2'>
                        <p class='text-success'>Avilable Now</p>
                        </div>
                            
                     <p class='btn btn-outline-danger style='width:100%;''>Deal of the day</p>
                        
                        <p class='fs-6'><span class='fs-5'>$price</span></p>
                        </div>
                        <div class='d-flex justify-content-evenly'>
                        <abbr title='Add to Cart'><a href='index.php?add_to_cart=$product_id' class=''><i class='fa-solid fa-cart-shopping'></i></a></abbr>
                        <abbr title='Go home' class='float-right'><a href='index.php'><i class='fa fa-home' aria-hidden='true'></i>
                        </a></abbr>
                    </div>
                    </div>
                </div>
            </div>";
            ?>
            
            <div class='col-md-8 col-sm-6 mb-2'>
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>Related Products</h4>
                
                <div class='col-md-12 pol'>
                <?php
            foreach($multiple_photo as $img){
                echo "<img src ='./admin/assets/img/$img' class='rounded' width='100%' height='200px' >";
            }
            ?>
                <!-- <img src ='./admin/assets/img/<?php //$img ?>' style="height:50px width:50px;"> -->
                </div>
                </div>
            </div>
        </div>
        <?php
        }}
    }
    }
}
    
    // Get ip function 

     
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
    
    



                        // signup form function    

function get_submit(){

    global $con;
    $fname = $lname = $email = $password = $cpassword = $gender = $image = "";
    $fnameErr = $lnameErr = $emailErr =  $passwordErr  = $cpasswordErr = $genderErr = $imageErr = "";
     
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['signup_submit'])){
          $fname=$_POST['fname'];
          $lname=$_POST['lname'];
          $email=$_POST['email'];
          $password=$_POST['password'];
          $cpassword=$_POST['cpassword'];
          $gender=$_POST['gender'];
          $ip = getIPAddress();

      //Name Validation  
      if (empty($_POST["name"])) {  
        $unameErr = "Username is required";  
      } else {  
        $uname = $_POST["name"];    
      } 
      
      
      //Email Field Validation  
      if (empty ($_POST["email"])) {  
        $emailErr = "Email is required";  
      } else {  
        $email =$_POST["email"];  
      } 
      
      //Password Field Validation  
      if (empty ($_POST["password"])) {  
          $passwordErr = "Password is required";  
        } else {  
          $password =$_POST["password"];  
        }  
      
        //Confirm Password Field Validation 
        if(empty($_POST["cpassword"])){ 
            $cpasswordErr = "Password is required";
        }
        else{    
        if (($_POST["password"]) == ($_POST["cpassword"])) {  
            $cpassword =$_POST["cpassword"];
        }
        else{
            $match=1;
        }
      }  
        
      
          // Gender is required 
      if(empty($_POST["gender"])){
          $genderErr = "Gender is required";
      } 
      else{
          $gender = $_POST["gender"];
      }
      
              // Image Field validation
      
    //   if(empty($_POST["image"])){
    //       $imageErr = "Image is required";
    //   }
    //   else{
    //       $image = $_post["image"];
    //   }
        }
    }
 
    $invalid=0;
    $error=0;
    $login=0;
    $user=0;
    $match=0;


                       // submit
   
if(isset($_POST['signup_submit'])){
    if($fnameErr == "" && $lnameErr == "" && $emailErr == "" && $passwordErr  == "" && $cpasswordErr == "" && $genderErr == ""){
    if($password == $cpassword){
        
        
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $gender=$_POST['gender'];
    
    $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;
    // global $ip;
    

    // path
    // $location = $path.$user_image;

    // // checking empty connection
    // move_uploaded_file($temp_image,$location);

    $signup_query = "SELECT * from `user_signup` where `email` = '$email'";
    $result= mysqli_query($con,$signup_query) or die();
    if($result){
        $num_signup = mysqli_num_rows($result); 
        if($num_signup>0){
            $user=1;
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
    VALUES('$fname','$lname','$email','$password','$ip','user','$gender','$user_image')";
    $result_sign = mysqli_query($con,$query)or die();
    if($result_sign){
        $login=1;
        echo "<script>alert('This item is added sucessfully')</script>";
        echo "<script>window.open('login.php','_self')</script>";
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


   if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success!</strong>you are successfully Signup.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
 if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>  Invalid credentials.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
     if($error){
        echo '
<div class="alert alert-danger alert-dismissible fade show w-100 mx-auto" role="alert">
<strong>Error!</strong> Please fill all the required information.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
        if($user){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oh no sorry!</strong>User already exists.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
     if($match){
        echo '<div class="alert alert-danger alert-dismissible fade show w-100 mx-auto" role="alert">
        <strong>Error!</strong> Your password and confirm password do not match.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }


}


                                    
                                    //cart function    
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress(); 
        $get_product_id = $_GET['add_to_cart'];
        $select_query ="select * from `cart_details` where ip_address ='$ip' and 
        product_id = $get_product_id";
        $result_query = mysqli_query($con,$select_query);
        $nums_of_rows = mysqli_num_rows($result_query);
        if($nums_of_rows>0){
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            $insert_query = "INSERT INTO `cart_details`(product_id,ip_address,quantity)
            values('$get_product_id','$ip',0)";
            $result_query = mysqli_query($con,$insert_query);
            echo "<script>alert('This item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


                            //function to get cart item number

function cart_iteam(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress(); 
        $select_query ="select * from `cart_details` where ip_address ='$ip'";
        $result_query = mysqli_query($con,$select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
        else{
            global $con;
        $ip = getIPAddress(); 
        $select_query ="select * from `cart_details` where ip_address ='$ip'";
        $result_query = mysqli_query($con,$select_query);
        $count_cart_items = mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
    }

                    //total price function 
    function total_cart_price(){
        global $con;
        $get_ip_add = getIPAddress();
        $total_price =0;
        $cart_query ="select * from `cart_details` where ip_address ='$get_ip_add'";
        $result = mysqli_query($con,$cart_query);
       while($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products ="select * from `product` where pid ='$product_id'";
        $result_products = mysqli_query($con,$select_products);
            while($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['price']); //[200,300]
            $product_values = array_sum($product_price); //[500]
            $total_price+= $product_values; //[500]
            }
        }
        echo $total_price;
    }



            ?>


