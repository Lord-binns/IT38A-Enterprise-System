<?php
// receipt-api.php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

// Database connection (adjust as needed)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "binns";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Validate if data is received properly
if (!isset($data) || empty($data)) {
    echo json_encode(['success' => false, 'message' => 'No data received']);
    exit;
}

// Debugging: Log received data (optional)
file_put_contents('receipt-error-log.txt', json_encode($data) . PHP_EOL, FILE_APPEND);

// Check for required data fields
if (isset($data['receipt_number'], $data['total_amount'], $data['customer_cash'], $data['change'], $data['cashier'], $data['date_time'])) {
    // Sanitize inputs
    $receipt_number = $conn->real_escape_string($data['receipt_number']);
    $total_amount = (float)$data['total_amount'];
    $customer_cash = (float)$data['customer_cash'];
    $change = (float)$data['change'];
    $cashier = $conn->real_escape_string($data['cashier']);
    $date_time = $conn->real_escape_string($data['date_time']);

    // Insert receipt into the database
    $sql = "INSERT INTO receipts (receipt_number, total_amount, customer_cash, `change`, cashier, date_time)
            VALUES ('$receipt_number', '$total_amount', '$customer_cash', '$change', '$cashier', '$date_time')";

    if ($conn->query($sql) === TRUE) {
        $response = ['success' => true, 'message' => 'Receipt saved successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Error saving receipt: ' . $conn->error];
    }

} else {
    $response = ['success' => false, 'message' => 'Missing required data fields'];
}

// Output JSON response
echo json_encode($response);

$conn->close();
?>
