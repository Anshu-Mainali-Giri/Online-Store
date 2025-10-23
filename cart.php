<?php
require "includes/common.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EliteShop | Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'includes/header_menu.php';
?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="title text-center mb-4">Shopping Cart</h2>
            <?php
$sum = 0;
$user_id = $_SESSION['user_id'];
$query = " SELECT products.price AS Price, products.id, products.name AS Name, products.image AS Image FROM users_products JOIN products ON users_products.item_id = products.id WHERE users_products.user_id='$user_id' and status='Added To Cart'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) >= 1) {
    ?>
            <div class="cart-items">
                <?php
while ($row = mysqli_fetch_array($result)) {
        $sum += $row["Price"];
        $id = $row["id"] . ", ";
        echo "<div class='card cart-item mb-3'>";
        echo "<div class='card-body'>";
        echo "<div class='row align-items-center'>";
        echo "<div class='col-md-2'>";
        echo "<img src='{$row['Image']}' class='img-fluid rounded' alt='{$row['Name']}' style='height: 80px; width: 80px; object-fit: cover;'>";
        echo "</div>";
        echo "<div class='col-md-4'>";
        echo "<h6 class='mb-1'>{$row['Name']}</h6>";
        echo "<small class='text-muted'>Item #{$row['id']}</small>";
        echo "</div>";
        echo "<div class='col-md-3'>";
        echo "<h6 class='text-primary mb-0'>\${$row['Price']}</h6>";
        echo "</div>";
        echo "<div class='col-md-3 text-end'>";
        echo "<a href='cart-remove.php?id={$row['id']}' class='btn btn-outline-danger btn-sm'><i class='fas fa-trash'></i> Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    $id = rtrim($id, ", ");
    ?>
                <div class="card cart-total">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0">Total Amount</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary mb-0">$<?php echo $sum; ?></h4>
                            </div>
                            <div class="col-md-3 text-end">
                                <a href='success.php' class='btn btn-primary btn-lg'><i class='fas fa-check'></i> Confirm Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
} else {
    echo "<div class='text-center py-5'>";
    echo "<img src='images/emptycart.png' class='img-fluid mb-4' style='height: 200px; opacity: 0.7;'>";
    echo "<h4 class='text-muted'>Your cart is empty</h4>";
    echo "<p class='text-muted'>Add some items to get started!</p>";
    echo "<a href='products.php' class='btn btn-primary'>Start Shopping</a>";
    echo "</div>";
}
?>
        </div>
    </div>
</div>
        <!--footer -->
         <?php include 'includes/footer.php'?>
        <!--footer end-->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {

if(window.location.href.indexOf('#login') != -1) {
  $('#login').modal('show');
}

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
