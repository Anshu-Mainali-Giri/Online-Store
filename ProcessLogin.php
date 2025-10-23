<?php
include('functions.php');

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('Login.php');
}

// Validate CSRF token
if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
    setCookieMessage('Security error. Please try again.');
    redirect('Login.php');
}

// Validate and sanitize input
$username = isset($_POST['username']) ? sanitizeInput($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($username) || empty($password)) {
    setCookieMessage('Please fill in all fields.');
    redirect('Login.php');
}

try {
    $dbh = connectToDatabase();
    
    // Use prepared statement to prevent SQL injection
    $statement = $dbh->prepare('SELECT CustomerID, CustomerName, Password FROM Customers WHERE Username = ? LIMIT 1');
    $statement->execute([$username]);
    
    $user = $statement->fetch();
    
    if ($user && verifyPassword($password, $user['Password'])) {
        // Login successful
        session_regenerate_id(true); // Prevent session fixation
        $_SESSION['CustomerID'] = $user['CustomerID'];
        $_SESSION['CustomerName'] = $user['CustomerName'];
        $_SESSION['last_activity'] = time();
        
        setCookieMessage('Welcome back, ' . $user['CustomerName'] . '!');
        redirect('Homepage.php');
    } else {
        // Login failed
        setCookieMessage('Invalid username or password.');
        redirect('Login.php');
    }
    
} catch (Exception $e) {
    if (DEBUG_MODE) {
        setCookieMessage('Database error: ' . $e->getMessage());
    } else {
        setCookieMessage('Login failed. Please try again.');
    }
    redirect('Login.php');
}
?>