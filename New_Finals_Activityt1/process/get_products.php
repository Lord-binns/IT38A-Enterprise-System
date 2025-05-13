<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Your PHP code follows...
header('Content-Type: application/json');
include('../database/database.php'); // Your database connection file

$query = "SELECT product_name, description, image_url FROM products";
$result = mysqli_query($conn, $query);

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

echo json_encode($products);
?>
