<?php
include('functions.php');

// Destroy session and redirect
session_unset();
session_destroy();

// Clear any sensitive cookies
deleteCookie('ShoppingCart');

setCookieMessage('You have been logged out successfully.');
redirect('Homepage.php');
?>