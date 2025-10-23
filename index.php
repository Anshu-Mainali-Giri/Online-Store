<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EliteShop | Premium Online Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--Header-->
    <?php
include 'includes/header_menu.php';
include 'includes/check-if-added.php';
?>
    <!--Header ends-->
    <div id="content">
        <div id="bg" class=" ">
            <div class="container" style="padding-top:150px">
            <div class="mx-auto p-5 text-white" id="banner_content" style="border-radius: 0.5rem;" >
            <h1 class="display-4 fw-bold mb-4">Discover Premium Quality</h1>
            <p class="lead mb-4">Curated collection of premium products with up to 50% OFF</p>
            <a href="products.php" class="btn btn-warning btn-lg px-5 py-3"><i class="fas fa-shopping-bag me-2"></i>Explore Collection</a>

            </div>
            </div>

        </div>
    </div>
    <div class="text-center pt-5 pb-3 animate-on-scroll">
        <h2 class="title display-5 fw-bold">Shop by Category</h2>
        <p class="text-muted fs-5">Discover our premium collection across different categories</p>
    </div>
    <!--menu highlights start-->
 <div class="container pt-3">
        <div class="row text-center ">
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#watch" class="category-item d-block">
                    <img src="images/watch.jpg" class="img-fluid" alt="" style="border-radius:16px">
                    <div class="h5 pt-3 fw-bold text-center">
                      Watches
                   </div>
                 </a>
             </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#shirt" class="category-item d-block">
                  <img src="images/clothing.jpg" class="img-fluid" alt="" style="border-radius:16px">
                     <div class="h5 pt-3 fw-bold text-center">
                        Clothing
                     </div>
                  </a>
             </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#shoes" class="category-item d-block">
                 <img src="images/shoes.jpg" class="img-fluid" alt="" style="border-radius:16px">
                <div class="h5 pt-3 fw-bold text-center">
                    Shoes
                 </div>
             </a>
             </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#headphones" class="category-item d-block">
                 <img src="images/headphones.jpg" class="img-fluid" alt="" style="border-radius:16px">
                 <div class="h5 pt-3 fw-bold text-center">
                    Headphones
                 </div>
              </a>
            </div>
        </div>
    </div>

    <!--menu highlights end-->
    <!--footer -->
    <?php include 'includes/footer.php'?>
    <!--footer end-->




</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Scroll animations
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('animated');
    }
  });
}, observerOptions);

document.querySelectorAll('.animate-on-scroll').forEach(el => {
  observer.observe(el);
});

// Modal animations
if(window.location.href.indexOf('#login') != -1) {
  const loginModal = new bootstrap.Modal(document.getElementById('login'));
  loginModal.show();
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
    
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>




</html>