<?php 
 $email = $_SESSION['email'];
        $con = mysqli_connect($hostname,$username,$password,$dbname);
         
        $sql="SELECT * from user_signup where email = '$email'";
        $result = mysqli_query($con,$sql);
        $data = mysqli_fetch_assoc($result); 
        
?>
<div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

      
    


<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3 d-flex align-items-start">
                <img src="<?php echo BASE_URL ?>/assets/img/images.png" class="ms-1" style="width:35px; height:35px;"><h3 class="text-primary"></i>Admin Panel</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?php echo BASE_URL ?>/assets/img/<?php echo $data['image'];  ?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $data['fname'];  ?></h6>
                        <span><?php echo $data['role'];  ?></span>
                    </div>
                </div>
                <ul class="navbar-nav w-100 menu-sample">
                    
                    <li><a href="<?php echo BASE_URL ?>/index.php" class="nav-item nav-link menu-item-sample active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a></li>
                    <li><a href="<?php echo BASE_URL ?>/user/list.php" class="nav-item nav-link text-black menu-item-sample "><i class="fa fa-table me-2"></i>User</a></li>
                    <li><a href="<?php echo BASE_URL ?>/category/list.php" class="nav-item nav-link menu-item-sample "><i class="fa fa-table me-2"></i>Category</a></li>
                    <li><a href="<?php echo BASE_URL ?>/subcategory/list.php" class="nav-item nav-link menu-item-sample "><i class="fa fa-table me-2"></i>Sub Category</a></li>
                    <li><a href="<?php echo BASE_URL ?>/product/list.php" class="nav-item nav-link menu-item-sample"><i class="fa fa-table me-2"></i>Product</a></li>
                   
                </ul>
            </nav>
        </div>
        <script>
          $('.main-nav-list li').on('click', function () {
                $('li.active').removeClass('active');
                $(this).addClass('active');
            });   

        </script>

        