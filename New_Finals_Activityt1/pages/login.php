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
        <div class="image-container">
            <img src="ttps://cdna.artstation.com/p/assets/images/images/015/412/288/original/alexandra-vezhnovets-library.gif?1548239266" alt="Registration Image">
        </div>
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
            <p>Don't have an account? <a href="../pages/register.php">Register here</a></p>
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