<?php
// save_receipt.php
header('Content-Type: application/json');
require '../config/connection.php'; // Adjust the path to your database connection

// Read the JSON data sent from JavaScript
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $receiptNumber = $data['receiptNumber'];
    $cashier = $data['cashier'];
    $totalAmount = $data['totalAmount'];
    $cashReceived = $data['cashReceived'];
    $changeGiven = $data['changeGiven'];
    $items = $data['items'];

    // Save the receipt to the database
    $stmt = $conn->prepare("INSERT INTO receipts (receipt_number, cashier, total_amount, cash_received, change_given, items) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssddds", $receiptNumber, $cashier, $totalAmount, $cashReceived, $changeGiven, $items);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
    
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data received.']);
}
?>
