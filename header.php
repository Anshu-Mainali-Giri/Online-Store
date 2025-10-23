<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'functions.php';

// Validate session
if (!validateSession()) {
    // Session expired, redirect to login if on protected page
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title><?php echo isset($pageTitle) ? sanitizeInput($pageTitle) : 'Online Shop'; ?></title>
    <link rel="stylesheet" type="text/css" href="shopstyle.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="header">
        <h1><?php echo isset($headerTitle) ? sanitizeInput($headerTitle) : 'Online Shop'; ?></h1>
        <?php
            if (isset($cookieMessage) && $cookieMessage) {
                echo "<div class='message'>" . sanitizeInput($cookieMessage) . "</div>";
            }
        ?>
    </div>

    <div class="navigation">
        <div class="nav-left">
            <a href="Homepage.php" class="nav-link">Home</a>
            <a href="ProductList.php" class="nav-link">Products</a>
            <a href="ViewCart.php" class="nav-link">Cart</a>
        </div>
        <div class="nav-right">
            <?php
            if (isLoggedIn()) {
                $firstLetter = strtoupper(substr($_SESSION['CustomerName'], 0, 1));
                echo "<div class='user-menu'>";
                echo "<div class='user-menu-trigger'>";
                echo "<div class='user-avatar'>" . sanitizeInput($firstLetter) . "</div>";
                echo "<span class='welcome-text'>Welcome, " . sanitizeInput($_SESSION['CustomerName']) . "!</span>";
                echo "</div>";
                echo "<div class='user-menu-content'>";
                echo "<a href='Profile.php' class='user-menu-item'><i>👤</i> My Profile</a>";
                echo "<a href='ChangePassword.php' class='user-menu-item'><i>🔒</i> Change Password</a>";
                echo "<a href='MyOrders.php' class='user-menu-item'><i>📦</i> My Orders</a>";
                echo "<div class='user-menu-divider'></div>";
                echo "<a href='Logout.php' class='user-menu-item'><i>🚪</i> Logout</a>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<a href='Login.php' class='nav-link'>Login</a>";
            }
            ?>
        </div>
    </div>
</body>
</html>