<?php
// save_sales_report.php

// Database connection (adjust this with your DB credentials)
$servername = "localhost";
$username = "root";
$password = "";
$database = "binns"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed.']));
}

// Get the JSON data from the request
$data = json_decode(file_get_contents("php://input"), true);

// Validate received data
if (!isset($data['date'], $data['product'], $data['quantity'], $data['unit_price'], $data['payment_method'], $data['employee'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data.']);
    exit();
}

// Sanitize data
$date = $conn->real_escape_string($data['date']);
$product = $conn->real_escape_string($data['product']);
$quantity = (int) $data['quantity'];
$unit_price = (float) $data['unit_price'];
$total_amount = $quantity * $unit_price;
$payment_method = $conn->real_escape_string($data['payment_method']);
$employee = $conn->real_escape_string($data['employee']);

// Insert into salesreport table
$sql = "INSERT INTO salesreports (date_time, product_name, quantity, unit_price, total_amount, payment_method, employee_name) 
        VALUES ('$date', '$product', $quantity, $unit_price, $total_amount, '$payment_method', '$employee')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Sale record saved successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to save sale.']);
}

$conn->close();
?>
