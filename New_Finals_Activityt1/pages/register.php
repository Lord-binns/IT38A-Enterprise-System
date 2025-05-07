<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>

<div class="login-container">
    <div class="image-container">
       <img src="https://static.vecteezy.com/system/resources/thumbnails/023/219/700/small/table-with-stack-of-stylish-sweaters-and-woman-s-shoes-on-grey-background-generative-ai-photo.jpg" alt="Registration Image">
       <div class="register-overlay">
            <h1>Welcome!</h1>
            <p>Already have an account?</p>
            <a href="../pages/login.php">
                <button>Log in</button>
            </a>
        </div>
    </div>
    
    <div class="form-container">
    <h2>Create Account</h2>
    <form action="../process/register_process.php" method="POST">
        <div class="input-group-row">
            <div class="input-group-icon">
                <i class="fas fa-user"></i>
                <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
            </div>
            <div class="input-group-icon">
                <i class="fas fa-user"></i>
                <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
            </div>
        </div>
        <div class="input-group-icon">
            <i class="fas fa-user"></i>
            <input type="text" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="input-group-icon password-group">
            <i class="fas fa-lock"></i>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="fas fa-eye-slash" id="eye-icon"></i>
                </span>
            </div>
        </div>

        <div class="input-group-icon password-group">
    <i class="fas fa-lock"></i>
    <div class="password-wrapper">
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
        <span class="toggle-password" onclick="toggleConfirmPassword()">
            <i class="fas fa-eye-slash" id="confirm-eye-icon"></i>
        </span>
    </div>
</div>

<!-- Agree to terms -->
<div class="input-group-icon">
    <input type="checkbox" id="agree_terms" name="agree_terms" required style="border: 2px solid #000; width: 20px; height: 20px; margin-right: 10px;">
    <label for="agree_terms">
        I agree to the <a href="#">terms of services</a> and <a href="#">privacy policy</a>
    </label>
</div>

        <!-- Default role will be set to 'user' -->
        <input type="hidden" name="role" value="user">
        <div class="input-group">
            <button type="submit">Register</button>
        </div>
    </form>
  
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    }
}

function toggleConfirmPassword() {
    const confirmPasswordInput = document.getElementById('confirm_password');
    const confirmEyeIcon = document.getElementById('confirm-eye-icon');
    if (confirmPasswordInput.type === 'password') {
        confirmPasswordInput.type = 'text';
        confirmEyeIcon.classList.remove('fa-eye-slash');
        confirmEyeIcon.classList.add('fa-eye');
    } else {
        confirmPasswordInput.type = 'password';
        confirmEyeIcon.classList.remove('fa-eye');
        confirmEyeIcon.classList.add('fa-eye-slash');
    }
}
</script>



</body>
</html>