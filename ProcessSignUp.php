<?php
include('functions.php');

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('SignUp.php');
}

// Validate CSRF token
if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
    setCookieMessage('Security error. Please try again.');
    redirect('SignUp.php');
}

// Validate and sanitize input
$customerName = isset($_POST['customer_name']) ? sanitizeInput($_POST['customer_name']) : '';
$username = isset($_POST['username']) ? sanitizeInput($_POST['username']) : '';
$email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

// Validation
$errors = [];

if (empty($customerName) || strlen($customerName) < 2) {
    $errors[] = 'Full name must be at least 2 characters long.';
}

if (empty($username) || strlen($username) < 3) {
    $errors[] = 'Username must be at least 3 characters long.';
}

if (!isValidEmail($email)) {
    $errors[] = 'Please enter a valid email address.';
}

if (strlen($password) < 8) {
    $errors[] = 'Password must be at least 8 characters long.';
}

if ($password !== $confirmPassword) {
    $errors[] = 'Passwords do not match.';
}

if (!empty($errors)) {
    setCookieMessage(implode(' ', $errors));
    redirect('SignUp.php');
}

try {
    $dbh = connectToDatabase();
    
    // Check if username or email already exists
    $statement = $dbh->prepare('SELECT COUNT(*) FROM Customers WHERE Username = ? OR Email = ?');
    $statement->execute([$username, $email]);
    
    if ($statement->fetchColumn() > 0) {
        setCookieMessage('Username or email already exists.');
        redirect('SignUp.php');
    }
    
    // Hash password and insert user
    $hashedPassword = hashPassword($password);
    
    $statement = $dbh->prepare('INSERT INTO Customers (CustomerName, Username, Email, Password) VALUES (?, ?, ?, ?)');
    $statement->execute([$customerName, $username, $email, $hashedPassword]);
    
    setCookieMessage('Account created successfully! Please log in.');
    redirect('Login.php');
    
} catch (Exception $e) {
    if (DEBUG_MODE) {
        setCookieMessage('Database error: ' . $e->getMessage());
    } else {
        setCookieMessage('Registration failed. Please try again.');
    }
    redirect('SignUp.php');
}
?>