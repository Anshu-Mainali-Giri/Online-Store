<?php
include('functions.php');
$cookieMessage = getCookieMessage();
$pageTitle = 'Login - Online Shop';
$headerTitle = 'Login to Your Account';
include('header.php');
?>

<div class="auth-container">
    <div class="auth-box">
        <h2>Log In</h2>
        <form action="ProcessLogin.php" method="POST" class="auth-form">
            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>" />
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required maxlength="50" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required maxlength="255" />
            </div>

            <div class="form-actions">
                <button type="submit" class="primary-button">Log In</button>
            </div>

            <div class="form-links">
                <p>Don't have an account? <a href="SignUp.php">Sign up now</a></p>
            </div>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>