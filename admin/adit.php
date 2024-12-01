<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<meta charset="utf-8"> 

	<meta name="viewport" content= 
			"width=device-width, initial-scale=1"> 
	
	<link rel="stylesheet" href= 
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 

	<script src=" 
https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> 
	</script> 

	<script src=" 
https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"> 
	</script> 

	<script src=" 
https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> 
	</script> 
</head> 

<body> 
	<center> 
		<div class="container"> 
			<h1 class="text-success">GeeksforGeeks</h1> 
			<h3>Active Item in a List Group</h3> 
		</div> 
	</center> 
	
	<div class="list-group"> 
		<a href="#!" class="list-group-item 
							list-group-item-action 
							flex-column 
							align-items-start active"> 
			
                            <li><a href="<?php echo BASE_URL ?>/index.php" class="nav-item nav-link menu-item-sample active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a></li>
		</a> 
		
		<a href="#!" class="list-group-item 
							list-group-item-action 
							flex-column 
							align-items-start"> 
                            <li><a href="<?php echo BASE_URL ?>/index.php" class="nav-item nav-link menu-item-sample active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a></li>
			
		</a> 
		
		<!-- <a href="#!" class="list-group-item 
							list-group-item-action 
							flex-column align-items-start">  -->
        <ul class="list-group-item 
							list-group-item-action 
							flex-column align-items-start"  navbar-nav w-100 menu-sample">
                    
                            <li><a href="<?php echo BASE_URL ?>/user/list.php" class="nav-item nav-link text-black menu-item-sample "><i class="fa fa-table me-2"></i>User</a></li>            
                            <ul class="list-group-item 
							list-group-item-action 
							flex-column align-items-start"  navbar-nav w-100 menu-sample">
</a>
                    <li><a href="<?php echo BASE_URL ?>/category/list.php" class="nav-item nav-link menu-item-sample "><i class="fa fa-table me-2"></i>Category</a></li>
                    <ul class="list-group-item 
							list-group-item-action 
							flex-column align-items-start"  navbar-nav w-100 menu-sample">
</a>     
                    <li><a href="<?php echo BASE_URL ?>/subcategory/list.php" class="nav-item nav-link menu-item-sample "><i class="fa fa-table me-2"></i>Sub Category</a></li>
                    <ul class="list-group-item 
							list-group-item-action 
							flex-column align-items-start"  navbar-nav w-100 menu-sample">
</a>     
                    <li><a href="<?php echo BASE_URL ?>/product/list.php" class="nav-item nav-link menu-item-sample"><i class="fa fa-table me-2"></i>Product</a></li>
                   
                </ul>
			<!-- <div class="d-flex w-100 justify-content-between"> 
				<h5 class="mb-2 h5"> 
					Machine Learning Foundation With Python 
				</h5> 
				<small>4 days ago</small> 
			</div> 
			
			<p class="mb-2"> 
				Learn about the concepts of Machine Learning, 
				effective machine learning techniques from 
				basics with Python. 
			</p> 
			
			<small> 
				Students, Working Professionals 
				seeking a career in ML 
			</small>  -->
		</a> 
	</div> 
	
	<script> 
		$(".list-group-item").click(function() { 
			
			// Select all list items 
			var listItems = $(".list-group-item"); 
			
			// Remove 'active' tag for all list items 
			for (let i = 0; i < listItems.length; i++) { 
				listItems[i].classList.remove("active"); 
			} 
			
			// Add 'active' tag for currently selected item 
			this.classList.add("active"); 
		}); 
	</script> 
</body> 

</html> 
