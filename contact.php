<?php 
// include('functions/common_function.php');
include('includes/header.php');
 include('includes/sidebar.php'); 
 ?>
 
<div class="container-fluid com">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb pt-4 ms-3">
    <li class="breadcrumb-item"><a class="text-light text-decoration-none" href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a class="text-light text-decoration-none" href="#">Contact us</a></li>
  </ol>
</nav> 

  <div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-9 border p-4 bg-light rounded">
      <h1 class="mb-3 text-info text-center">Contact Us</h1>
      <form>
        <div class="row g-3">
          <div class="col-md-6">
            <label for="your-name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="your-name" name="your-name" required>
          </div>
          <div class="col-md-6">
            <label for="your-surname" class="form-label">Your Surname</label>
            <input type="text" class="form-control" id="your-surname" name="your-surname" required>
          </div>
          <div class="col-md-6">
            <label for="your-email" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="your-email" name="your-email" required>
          </div>
          <div class="col-md-6">
            <label for="your-subject" class="form-label">Your Subject</label>
            <input type="text" class="form-control" id="your-subject" name="your-subject">
          </div>
          <div class="col-12">
            <label for="your-message" class="form-label">Your Message</label>
            <textarea class="form-control" id="your-message" name="your-message" rows="5" required></textarea>
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-md-6">
                <button data-res="<?php echo $sum; ?>" type="submit" class="btn btn-info w-100 fw-bold con border-0" >Send</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<?php
include('includes/footer.php');
?>
   