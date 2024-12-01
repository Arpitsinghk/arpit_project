<?php include('includes/header.php');
//  include('includes/sidebar.php'); 
include('functions/common_function.php');
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
                                <a class="nav-link" href="#">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_iteam(); ?></sup></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?>/-</a>
                            </li>
                        </ul>
                        <form class="d-flex" action="search_product.php" method="GET">
                            <input class="form-control me-2" type="search-" placeholder="Search" aria-label="Search" name="search_data"/>
                            <input class="btn btn-outline-success" type="submit" name="search_data_product" value="Search">
                        </form>
                    </div>
                </div>
            </nav>

            <!-- second child -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary ps-3">
           
            <ul class="navbar-nav d-flex bd-highlight">
                    <li class="nav-item p-2 flex-grow-1 bd-highlight">
                        <a class="nav-links text-decoration-none text-white" href="index.php">Welcome guest</a>
                    </li>
                    <li class="ms-auto nav-item p-2 bd-highlight">
                        <a class="nav-links text-decoration-none text-white" href="login.php">Login</a>
                    </li>
                    
                    <li class="nav-item p-2 bd-highlight">
                        <a class="nav-links text-decoration-none text-white" href="signup.php">Signup</a>
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
            <div class="row mb-4">
                <div class="col-md-10">
                    <!-- product -->
                    <div class="row px-1">
                    <!-- fetching product -->
                <?php
                // calling functions\
                search_products();
                get_unique_categories();
                get_unique_Brands()
                ?>  
               


                    </div>
                </div>
                <div class="col md-2 bg-secondary p-0">
                    <!-- category sidenav -->

                    <ul class="navbar-nav me-auto">
                        <li class="nav-item bg-info text-center">
                            <a href="#" name="category" class="nav-link text-light"><h4>Category</h4></a>
                        </li>
                        
                        <?php
                                getcategory();
                        ?>  
                    </ul>

                    <!-- sub category sidenav -->


                    <ul class="navbar-nav me-auto">
                        <li class="nav-item bg-info text-center">
                            <a href="#"  class="nav-link text-light"><h4>SubCategory</h4></a>
                        </li>

                        <?php
                        getbrands();
                       ?>
                        
                    </ul>
                    


                </div>
            </div>


            <?php include('includes/footer.php'); ?>