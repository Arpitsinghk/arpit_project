<?php 
include('includes/header.php');
//  include('includes/sidebar.php'); 
include('functions/common_function.php');
if(isset($_SESSION['coustomer'])){
    
    $email = $_SESSION['coustomer'];
    // header('location:login.php');

 
         //Starting the session
        //  $email = $_SESSION['email'];
         
include('./config/connect.php');
$sql="SELECT * from user_signup where email = '$email'";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result); 
}
// include('includes/header.php');
//  include('includes/sidebar.php');      
 ?>
    
<div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">DASHMIN</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_iteam(); ?></sup></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Total price: &#8377;<?php total_cart_price(); ?>/-</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
            //calling function
            cart();
            ?>
            <!-- second child -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary ps-3">
           
            <ul class="navbar-nav d-flex bd-highlight">
                    <li class="nav-item p-2 flex-grow-1 bd-highlight">
                    <?php
                                if(isset($_SESSION['coustomer'])){ 
                                    $image = $data['image'];
                                    echo "<img src='./admin/assets/img/$image' class='rounded-circle' style='width:40px; height:40px;'>";
                                    } 
                            ?>
                        <a class="nav-links text-decoration-none text-white ms-2" href="index.php">Welcome
                            
                            <?php
                         if(isset($_SESSION['coustomer'])){    
                         echo '<abbr title="click to logout"><a href="logout.php" class="text-decoration-none text-warning h6">'.ucfirst($data['fname'].$data['lname']).'</a></abbr>';  }
                         else{
                            echo "<span class='text-light h6'>Guest</span>";
                         }
                        ?>
                     </a>
                     <?php
                         if(isset($_SESSION['coustomer'])){ 
                          echo "<a class='nav-links text-decoration-none text-white ms-2' href='logout.php'>Logout</a>";
                         }
                         else{
                            echo "<a class='nav-links text-decoration-none text-white ms-2' href='login.php'>Login</a>";
                         }
                        ?>
                    </li>
                </ul>
            </nav>
</div>
            <!-- third child -->

            <div class="bg-light mt-4">
                <h3 class="text-center">Hidden Store</h3>
                <p class="text-center">Communication is the heart of E-commerce and Community</p>
            </div>

            <!-- fourth child -->
            <form action="" method="post">
            <div class="container">
                <div class="row">
                    
                    <table class="table table-bordered text-center">
                        
                        
                            <!-- php  code to display dynamic data -->
                            <?php
                                $get_ip_add = getIPAddress();
                                $total_price =0;
                                $cart_query ="select * from `cart_details` where ip_address ='$get_ip_add'";
                                $result = mysqli_query($con,$cart_query);
                                $result_count = mysqli_num_rows($result);
                                if($result_count>0){
                                    echo "<thead>
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                        <th colspan='2'>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>";
                               while($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products ="select * from `product` where pid ='$product_id'";
                                $result_products = mysqli_query($con,$select_products);
                                    while($row_product_price = mysqli_fetch_array($result_products)) {

                                    $product_price = array($row_product_price['price']); //[200,300]
                                    $price_table = $row_product_price['price'];
                                    $product_title = $row_product_price['pname'];
                                    $product_image = $row_product_price['image'];
                                    $product_values = array_sum($product_price); //[500]
                                    $total_price+= $product_values; //[500]
                                 
                            
                            ?>
                            <tr>
                                <td class=" pt-2"><?php echo $product_title ?></td>
                                <td class=""><img src="./admin/assets/img/<?php echo $product_image ?>" style="width:80px; height:80px;"></td>
                                <td class="pt-5"><input type="text" name="qty" class="form-input w-50"></td>
                                <?php
                                $get_ip_add = getIPAddress();
                                if(isset($_POST['update_cart'])){
                                    $quantites = $_POST['qty'];
                                    $update_cart = "update `cart_details` set quantity = $quantites WHERE
                                    ip_address = '$get_ip_add'";
                                    $result_products_quantity = mysqli_query($con,$update_cart);
                                    $total_price=$total_price*$quantites;
                                    
                                }

                                ?>
                                <td class=" py-5">&#8377;<?php echo $price_table ?></td>
                                <td class=" py-5"><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                  
                                <td class="d-flex gap-2 border-0 py-5">
                                    <input type="submit" value="Update Cart" name="update_cart" class="btn btn-sm btn-primary">
                                    <input type="submit" value="Remove Cart" name="remove_cart" class="btn btn-sm btn-danger">
                                </td>
                            </tr>
                            <?php
                               }
                            }
                        }
                        else{
                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                        }
                            ?>
                        </tbody>
                    </table>

                    <div class="d-flex mb-5">
                        <?php 
                            $get_ip_add = getIPAddress();
                            
                            $cart_query ="select * from `cart_details` where ip_address ='$get_ip_add'";
                            $result = mysqli_query($con,$cart_query);
                            $result_count = mysqli_num_rows($result);
                            if($result_count>0){
                                echo " <h4 class='px-3'>Subtotal:<strong class='text-info'>$total_price/-</strong></h4>
                                <input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-info px-3 py-2 mx-3 border-0'>
                                <button class='bg-secondary px-3 py-2 border-0 text-light'><a href='checkout.php' class=' text-light text-decoration-none'>Checkout</a></button>
                                ";

                            }
                            else{
                                echo "
                                <input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-info px-3 py-2 mx-3 border-0'>";
                            }
                            if(isset($_POST['continue_shopping'])){
                                echo "<script>window.open('index.php','_self')</script>";
                            }
                        ?>
                        </div>
                </div>
            </div>
            </form>

            <!-- function to remove iteam -->
            <?php
            function remove_cart_item(){
                global $con;
                if(isset($_POST['remove_cart'])){
                    foreach($_POST['removeitem'] as $remove_id){
                        // echo $remove_id;
                        $delete_query="delete from `cart_details` where product_id=$remove_id";
                        $run_delte =mysqli_query($con,$delete_query);
                        if($run_delte){
                            echo "<script>alert('This item is Remove from cart sucessfully')</script>";
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
               
                }
            }
            echo remove_cart_item();
            
            
            ?>

            <?php include('includes/footer.php'); ?>