<?php
// Start session at the beginning
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../pages/login.php");
    exit();
}

// Inline PDO Database connection (without affecting other pages)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=binns;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch products from the database
$query = "SELECT * FROM products";
$stmt = $pdo->query($query);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartRetail Inventory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/inventory.css">
    <style>
        .table-container {
            margin-top: 50px;
            padding: 20px;
        }

        .card {
            max-width: 100%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
        }

        .qty-high { background-color: #28a745; color: white; }
        .qty-medium { background-color: #ffc107; color: white; }
        .qty-low { background-color: #dc3545; color: white; }

        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<!-- Top Navigation Bar -->
<div class="top-bar">
    <button class="open-btn" onclick="toggleSidebar()">☰ Menu</button>
    <input type="text" class="search-input" placeholder="Search...">
    <button class="open-btn" style="display: flex; align-items: center; gap: 6px; background-color:rgb(2, 2, 1); color: white;">
        <i class="fas fa-bell"></i>
        <span style="font-weight: bold;">Notifications</span>
    </button>
</div>

<!-- Sidebar Navigation -->
<div id="sidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>
    <div class="sidebar-content">
        <div class="admin-profile">
            <img src="https://i.pinimg.com/736x/c0/a8/2a/c0a82a54db981757a94b1180b2e83a5d.jpg" alt="Admin" class="admin-avatar">
            <p class="admin-name">User Profile</p>
        </div>
        <hr>
        <a href="../pages/user_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="../pages/pos.php"><i class="fas fa-cash-register"></i> Point of Sales</a>
        <a href="../pages/reports.php"><i class="fas fa-chart-bar"></i> Reports</a>
        <a href="../pages/inventory.php"><i class="fas fa-boxes"></i> Inventory</a>
        <a href="../pages/refunds_returns.php"><i class="fas fa-undo"></i> Refunds & Returns</a>
        <hr>
        <a href="javascript:void(0)" class="logout-link" onclick="showLogoutCard()">
            <i class="fas fa-power-off" style="color: red;"></i> Log out
        </a>
    </div>
</div>

<!-- Inventory Management Table -->
<div class="table-container">
    <div class="card p-4 inventory-card-unique">
        <h3 class="text-center mb-4">Inventory Management</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price (₱)</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): 
                        $quantityClass = ($product['stock_quantity'] > 100) ? 'qty-high' : 
                                         (($product['stock_quantity'] >= 50) ? 'qty-medium' : 'qty-low');
                    ?>
                    <tr>
                        <td><?= $product['products_id'] ?></td>
                        <td>
                            <img src="<?= !empty($product['img']) ? htmlspecialchars($product['img']) : '../images/default.jpg' ?>" 
                                 alt="Product Image" 
                                 class="product-img">
                        </td>
                        <td><?= htmlspecialchars($product['title']) ?></td>
                        <td><?= htmlspecialchars($product['description']) ?></td>
                        <td>₱<?= number_format($product['rrp'], 2) ?></td>
                        <td><?= htmlspecialchars($product['category']) ?></td>
                        <td><?= $product['created_at'] ?></td>
                        <td><?= $product['updated_at'] ?></td>
                        <td>
                            <button class="btn stock-indicator <?= $quantityClass ?>">
                                <?= $product['stock_quantity'] ?>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Sidebar Toggle Function
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        sidebar.style.width = (sidebar.style.width === "300px") ? "0" : "300px";
    }

    // Logout Confirmation
    function showLogoutCard() {
        if (confirm("Are you sure you want to log out?")) {
            window.location.href = "../pages/logout.php";
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
