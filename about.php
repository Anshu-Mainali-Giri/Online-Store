<?php
require ("includes/common.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EliteShop | Premium Online Store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
</head>
<body style="overflow-x:hidden;">
  <?php
        include 'includes/header_menu.php';
    ?>
  <div>
    <div class="container mt-5 ">
      <div class="row justify-content-around">
        <div class="col-md-5 mt-3">
          <h3 class="title pt-3">Our Story</h3>
          <hr class="mb-4" />
          <img
            src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=400&q=80"
            class="img-fluid d-block rounded-4 mx-auto shadow-lg">
          <p class="mt-4 lead">EliteShop was founded with a simple vision: to bring premium quality products directly to your doorstep. We believe that everyone deserves access to exceptional products without compromising on quality or style.</p>
          <p>Our carefully curated collection features the latest trends in fashion, technology, and lifestyle products. From premium watches to cutting-edge headphones, we ensure every item meets our high standards of quality and design.</p>
          <p>With over 10,000 satisfied customers worldwide, we continue to grow and evolve, always putting our customers' satisfaction first.</p>
        </div>
        <div class="col-md-5 mt-3">
          <div class="pt-3">
            <h1 class="title">Why Choose Us?</h1>
            <h4 class="text-muted mb-4">Premium Quality • Fast Delivery • 24/7 Support</h4>
          </div>
          <hr class="mb-4">
          <div class="row g-3 mb-4">
            <div class="col-12">
              <div class="d-flex align-items-center mb-3">
                <i class="fas fa-shield-alt text-primary me-3 fs-4"></i>
                <div>
                  <h6 class="mb-1">Quality Guarantee</h6>
                  <small class="text-muted">All products are thoroughly tested and verified</small>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex align-items-center mb-3">
                <i class="fas fa-shipping-fast text-success me-3 fs-4"></i>
                <div>
                  <h6 class="mb-1">Fast Shipping</h6>
                  <small class="text-muted">Free delivery on orders above $50</small>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex align-items-center mb-3">
                <i class="fas fa-headset text-warning me-3 fs-4"></i>
                <div>
                  <h6 class="mb-1">24/7 Support</h6>
                  <small class="text-muted">Round-the-clock customer assistance</small>
                </div>
              </div>
            </div>
          </div>
          <p class="text-muted">Our commitment to excellence extends beyond just selling products. We provide comprehensive support, easy returns, and a satisfaction guarantee that ensures you're completely happy with your purchase.</p>

        </div>
      </div>
    </div>
  </div>
  <div class="container pb-3">
  </div>
  <div class="container mt-3 d-flex justify-content-center card pb-3 col-md-6">

    <form class="col-md-12" action="https://formspree.io/f/YOUR_FORM_ID" method="POST" name="_next">
      <h3 class="title pt-3 text-center">Get In Touch</h3>
      <p class="text-center text-muted mb-4">Have questions? We'd love to hear from you!</p>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email"
          name="email">
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="5"></textarea>
      </div>
      <input type="hidden" name="_next" value="http://localhost:8888/Online-Store/about.php" />
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>


  </div>
  <!--footer -->
  <?php include 'includes/footer.php'?>
  <!--footer end-->


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function () {
    $('[data-toggle="popover"]').popover();
  });
  $(document).ready(function () {

    if (window.location.href.indexOf('#login') != -1) {
      $('#login').modal('show');
    }

  });
</script>
<?php if(isset($_GET['error'])){ $z=$_GET['error']; echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>"; echo "
<script type='text/javascript'>alert('".$z."')</script>";} ?>
<?php if(isset($_GET['errorl'])){ $z=$_GET['errorl']; echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>"; echo "
<script type='text/javascript'>alert('".$z."')</script>";} ?>
</html>
