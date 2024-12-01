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
                        <img class="rounded-circle" src="<?php echo BASE_URL ?>/assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?php echo BASE_URL ?>/index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="<?php echo BASE_URL ?>/user/list.php" class="nav-item nav-link text-black"><i class="fa fa-table me-2"></i>User</a>
                    <a href="<?php echo BASE_URL ?>/category/list.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Category</a>
                    <a href="<?php echo BASE_URL ?>/subcategory/list.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Sub Category</a>
                    <a href="<?php echo BASE_URL ?>/product/list.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Product</a>
                   
                </div>
            </nav>
        </div>