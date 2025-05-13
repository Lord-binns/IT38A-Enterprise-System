<?php
header('Content-Type: application/json');

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'your_database_name';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed.']);
    exit();
}

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod == 'GET') {
    $result = $conn->query("SELECT * FROM products");
    $products = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($products);
}

if ($requestMethod == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['product_id'])) { 
        $stmt = $conn->prepare("UPDATE products SET product_name=?, price=?, quantity=? WHERE product_id=?");
        $stmt->bind_param('sdii', $data['product_name'], $data['price'], $data['quantity'], $data['product_id']);
    } else { 
        $stmt = $conn->prepare("INSERT INTO products (product_name, price, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param('sdi', $data['product_name'], $data['price'], $data['quantity']);
    }

    $stmt->execute();
    echo json_encode(['success' => true]);
}

if ($requestMethod == 'DELETE') {
    if (isset($_GET['id'])) {
        $stmt = $conn->prepare("DELETE FROM products WHERE product_id=?");
        $stmt->bind_param('i', $_GET['id']);
        $stmt->execute();
    }

    echo json_encode(['success' => true]);
}

$conn->close();
?>
