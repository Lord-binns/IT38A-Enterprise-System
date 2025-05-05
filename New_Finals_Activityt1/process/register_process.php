<?php
// Assuming you have other validation and sanitation for input

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash the password
$role = 'user'; // set default role to 'user'

// Database connection (assumed)
$conn = new mysqli("localhost", "root", "", "binns");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to insert the new user into the database
$sql = "INSERT INTO users (first_name, last_name, username, password, role) VALUES ('$first_name', '$last_name', '$username', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    // Redirect to the login page after successful registration
    header("Location: ../pages/login.php");
    exit(); // Always call exit after header redirect
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>