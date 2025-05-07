<?php
session_start();
require '../database/database.php';

// Get the login credentials from POST request
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Database connection (assumed)
$conn = new mysqli("localhost", "root", "", "binns");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get user details by username
$sql = "SELECT id, first_name, last_name, password, role FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);

// Bind parameters to the prepared statement
$stmt->bind_param('s', $username); // 's' means string parameter

// Execute the query
$stmt->execute();

// Store the result
$stmt->store_result();

// Check if the user exists
if ($stmt->num_rows > 0) {
    // Bind result variables
    $stmt->bind_result($id, $first_name, $last_name, $db_password, $role);

    // Fetch the result
    $stmt->fetch();

    // Verify the password
    if (password_verify($password, $db_password)) {
        // Correct password, create session variables
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirect based on role
        if ($role === 'admin') {
            header("Location: ../admin_pages/dashboard.php");
        } else {
            header("Location: ../pages/user_dashboard.php");
        }
        exit();
    } else {
        $_SESSION['error'] = "Invalid credentials. Please try again.";
        header("Location: ../pages/login.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Username not found. Please try again.";
    header("Location: ../pages/login.php");
    exit();
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>
