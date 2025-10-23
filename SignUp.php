<?php
include('functions.php');
$cookieMessage = getCookieMessage();
$pageTitle = 'Sign Up - Online Shop';
$headerTitle = 'Create Your Account';
include('header.php');
?>

<div class="auth-container">
    <div class="auth-box">
        <h2>Sign Up</h2>
        <form action="ProcessSignUp.php" method="POST" class="auth-form">
            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>" />
            
            <div class="form-group">
                <label for="customer_name">Full Name</label>
                <input type="text" id="customer_name" name="customer_name" required maxlength="100" />
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required maxlength="50" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required maxlength="255" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required minlength="8" maxlength="255" />
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required minlength="8" maxlength="255" />
            </div>

            <div class="form-actions">
                <button type="submit" class="primary-button">Sign Up</button>
            </div>

            <div class="form-links">
                <p>Already have an account? <a href="Login.php">Log in here</a></p>
            </div>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>