<?php

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
                        <!-- <form class="d-flex"> -->
                            <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data" /> -->
                            <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                            <!-- <input class="btn btn-outline-light" type="submit" value="Search" name="search_data_product"> -->
                        <!-- </form> -->
                    </div>
                </div>
            </nav>

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
                               
                         echo '<abbr title="click to logout"><a href="index.php" class="text-decoration-none text-warning h6">'. ucfirst($data['fname'].$data['lname']).'</a></abbr>';  }
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