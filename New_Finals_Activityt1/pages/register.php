<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>

<div class="login-container">
    <div class="image-container">
        <img src="https://media3.giphy.com/media/jQQRWxSlW1tWvWigA9/giphy.gif?cid=6c09b952r7l69tlcs27kgxgldm98kn1mzjyqyq6y6sr2c9uy&ep=v1_internal_gif_by_id&rid=giphy.gif&ct=g" alt="Registration Image">
    </div>
    
    <div class="form-container">
        <h2>Register Here</h2>
        <form action="../process/register_process.php" method="POST">
            <div class="input-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="input-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <!-- Default role will be set to 'user' -->
            <input type="hidden" name="role" value="user">
            <div class="input-group">
                <button type="submit">Register</button>
            </div>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>

</body>
</html>