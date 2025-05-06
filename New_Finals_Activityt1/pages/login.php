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
    <link rel="stylesheet" href="../CSS/login.css"> <!-- 🔥 Restored CSS link -->
</head>
<body>
<div class="login-container">
    <!-- Form goes first -->
    <div class="form-container">
        <h2>Login here</h2>
        <form action="../process/register_process.php" method="POST">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <button type="submit">Login</button>
            </div>
        </form>
       
    </div>
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



    <!-- Warning Pane -->
    <?php if (!empty($errorMessage)): ?>
        <div class="warning-pane show-warning" id="warningPane">
            <?= $errorMessage; ?>
            <button class="close-btn" onclick="document.getElementById('warningPane').style.display='none'">✖</button>
        </div>
    <?php endif; ?>
</body>
</html>