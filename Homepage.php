<?php
include('functions.php');
$cookieMessage = getCookieMessage();
$pageTitle = 'Online Shop - Home';
$headerTitle = 'Welcome to Our Online Shop';
include('header.php');
?>

<div class="search-section">
	<form action="ProductList.php" method="GET">
		<input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>" />
		<input type="text" name="search" placeholder="Search Products" value="<?php echo isset($_GET['search']) ? sanitizeInput($_GET['search']) : ''; ?>" />
		<input type="submit" value="Search" />
	</form>
</div>

<div class="recent-products">
	<h2>Your Recent Purchases</h2>
	<div class="products-grid">
	<?php
		$dbh = connectToDatabase();
		
		// Get the 10 most recently purchased products
		$statement = $dbh->prepare('
			SELECT DISTINCT p.ProductID, p.Description, p.Price, b.BrandName, COUNT(op.ProductID) AS TimesOrdered 
			FROM Products p 
			JOIN OrderProducts op ON p.ProductID = op.ProductID 
			JOIN Orders ON op.OrderID = Orders.OrderID 
			JOIN Brands b ON p.BrandID = b.BrandID 
			GROUP BY p.ProductID 
			ORDER BY Orders.OrderID DESC 
			LIMIT 10
		');
		
		$statement->execute();
		
		while($row = $statement->fetch()) {
			$ProductID = (int)$row['ProductID'];
			$Description = sanitizeInput($row['Description']);
			$Price = number_format((float)$row['Price'], 2);
			$BrandName = sanitizeInput($row['BrandName']);
			$OrderCount = (int)$row['TimesOrdered'];
			
			echo "<div class='productBox'>";
			echo "<a href='ViewProduct.php?ProductID=$ProductID' class='product-link'>";
			echo "<div class='product-image'>";
			echo "<img src='images/product_$ProductID.jpg' alt='$Description' onerror=\"this.src='images/no-image.jpg'\" />";
			echo "</div>";
			echo "<div class='product-info'>";
			echo "<h3 class='product-title'>$Description</h3>";
			echo "<p class='brand-name'>by $BrandName</p>";
			echo "<div class='product-footer'>";
			echo "<span class='price'>$$Price</span>";
			if ($OrderCount > 0) {
				echo "<span class='order-count'>Ordered $OrderCount time" . ($OrderCount > 1 ? "s" : "") . "</span>";
			}
			echo "</div>";
			echo "</div>";
			echo "</a>";
			echo "<form method='POST' action='AddToCart.php' class='buy-form'>";
			echo "<input type='hidden' name='csrf_token' value='" . generateCSRFToken() . "' />";
			echo "<input type='hidden' name='ProductID' value='$ProductID' />";
			echo "<button type='submit' name='BuyButton' class='buy-button'>Add to Cart</button>";
			echo "</form>";
			echo "</div>";
		}
	?>
	</div>
</div>

<?php include('footer.php'); ?>