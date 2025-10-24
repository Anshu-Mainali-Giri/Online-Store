<?php 
session_start();
require_once 'config.php';

// Secure database connection function
function connectToDatabase()
{
    try {
        // Use your InfinityFree database credentials here
        $dbh = new PDO("mysql:host=sql103.infinityfree.com;dbname=if0_40241246_online_store", "if0_40241246", "Ah4N2yqMOJZ");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $dbh;
    } catch (PDOException $e) {
        die('Database connection failed. Please try again later.');
    }
}

function showErrorMessage($errorMessage)
{
	echo "<h4 class = 'errormsg'>Error: " . sanitizeInput($errorMessage) . " </h4>";
}

// run this function on untrusted data before we echo it on the page.
function makeOutputSafe($unsafeString)
{
	$safeOutput = htmlspecialchars($unsafeString, ENT_QUOTES,"UTF-8");
	return $safeOutput;
}	

// this function lets you redirect the user to a different web page.
function redirect($url)
{
	// Validate URL to prevent header injection
	$url = filter_var($url, FILTER_SANITIZE_URL);
	if (!filter_var($url, FILTER_VALIDATE_URL) && !preg_match('/^[a-zA-Z0-9\/_.-]+\.php(\?[a-zA-Z0-9&=_-]*)?$/', $url)) {
		$url = 'index.php';
	}
	
	// the header location function will send a user to the specified URL.
	// please note that this function MUST be called before any HTML is displayed on the page or it wont work.
	header("Location: $url");
	
	// we just redirected the user, that means there is no one around to view this page.
	// so we can just stop processing this page.
	exit;
}

// please note that this function MUST be called before any HTML is displayed on the page or it wont work.
function setCookieMessage($message)
{
	$safeMessage = sanitizeInput($message);
	setcookie("Message", $safeMessage, time() + 3600, "/", "", false, true);
}

// please note that this function MUST be called before any HTML is displayed on the page or it wont work.
function getCookieMessage()
{
	$message = $_COOKIE['Message'] ?? '';
	setcookie("Message", "", time() - 3600, "/");
	return sanitizeInput($message);
}	

// please note that this function MUST be called before any HTML is displayed on the page or it wont work.
function deleteCookie($cookieName)
{
	// to delete a cookie, you set the expiry date to a date in the past.
	// in this case set the expiry date to 1 second past midnight 1st of Jan 1970
	setcookie($cookieName,"",1);
}

// this function will return true if $needle is found inside $haystack.
function stringContains($haystack, $needle)
{
	return strpos($haystack, $needle) !== false;
}

// Secure password hashing
function hashPassword($password) {
	return password_hash($password, PASSWORD_HASH_ALGO, ['cost' => PASSWORD_HASH_COST]);
}

// Verify password
function verifyPassword($password, $hash) {
	return password_verify($password, $hash);
}

// Check if user is logged in
function isLoggedIn() {
	return isset($_SESSION['CustomerID']) && !empty($_SESSION['CustomerID']);
}

// Validate session timeout
function validateSession() {
	if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > SESSION_TIMEOUT)) {
		session_unset();
		session_destroy();
		return false;
	}
	$_SESSION['last_activity'] = time();
	return true;
}
?>