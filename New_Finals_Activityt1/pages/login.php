<?php
session_start();
$errorMessage = '';
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../CSS/login.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="login-container">
    <!-- Form goes first -->
    <div class="form-container">
        <img src="https://scontent.fcgy2-4.fna.fbcdn.net/v/t39.30808-6/495575465_1851078032345688_8325333469187138347_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=127cfc&_nc_ohc=vNFRfgc4k4wQ7kNvwG7sIP3&_nc_oc=AdnenXQ6F7RZa6oqPUGSoCr3pYTpeMkvNLCaI5yRkoBepw1k8LEZOgSds5HGQ0s2HBQ&_nc_zt=23&_nc_ht=scontent.fcgy2-4.fna&_nc_gid=LH2t53CIHP8ckqbJaF721w&oh=00_AfJiJfrv7l6zsfW78Q7boZjcX6uu1CWfJHRMXGDuMiFcGQ&oe=681F82E8" alt="Login Image" style="width: 250px; height: 250px; margin-bottom: 1px;">
        <h2>Login here</h2>
        <form action="../process/login_process.php" method="POST">
            <!-- Username Field with Icon -->
            <div class="input-group-icon">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>

            <!-- Password Field with Icon & Eye Icon Inside -->
            <div class="input-group-icon password-group">
                <i class="fas fa-lock"></i>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword()">
                        <i class="fas fa-eye-slash" id="eye-icon"></i> <!-- Eye icon for password visibility toggle -->
                    </span>
                </div>
            </div>

            <!-- Login Button -->
            <div class="input-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>

    <!-- ⬇️ MOVE this INSIDE the .login-container -->
    <div class="image-container">
        <img src="https://media.istockphoto.com/id/1186575622/photo/businessman-or-groom-tying-shoe-laces-preparing.jpg?s=612x612&w=0&k=20&c=LOmbkpFDv-WFfUkGzYcCcUqwYxqTz1A3K9SS4xdxW34=" alt="Registration Image">
        <div class="register-overlay">
            <h1>New Here?</h1>
            <p>Enter your personal details and start a journey with us</p>
            <a href="../pages/register.php">
                <button>Sign Up</button>
            </a>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');  // Change to eye-slash icon
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');  // Revert to eye icon
        }
    }
</script>

<!-- Warning Pane -->
<?php if (!empty($errorMessage)): ?>
    <div class="warning-pane show-warning" id="warningPane">
        <?= $errorMessage; ?>
        <button class="close-btn" onclick="document.getElementById('warningPane').style.display='none'">✖</button>
    </div>
<?php endif; ?>

</body>
</html>
