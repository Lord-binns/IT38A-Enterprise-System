<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Sales Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/pos.css">
</head>

<body>
<div class="top-bar">
    <button class="open-btn" onclick="toggleSidebar()">☰ Menu</button>
    <input type="text" class="search-input" placeholder="Search...">
    <button class="open-btn" style="display: flex; align-items: center; gap: 6px; background-color:rgb(2, 2, 1); color: white;">
        <i class="fas fa-bell"></i>
        <span style="font-weight: bold;">Notifications</span>
    </button>
</div>

<div id="sidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>
  <div class="sidebar-content">
    <div class="sidebar-links">
        <div class="admin-profile">
            <img src="https://i.pinimg.com/736x/c0/a8/2a/c0a82a54db981757a94b1180b2e83a5d.jpg" alt="User" class="admin-avatar">
            <p class="admin-name">User Profile</p>
        </div>
        <hr>
        <a href="../pages/user_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <hr>
        <a href="../pages/pos.php"><i class="fas fa-cash-register"></i> Point of Sales</a>
        <hr>
        <a href="../pages/reports.php"><i class="fas fa-chart-bar"></i> Reports</a>
    </div>
    <a href="javascript:void(0)" class="logout-link" onclick="showLogoutCard()">
        <i class="fas fa-power-off" style="color: red;"></i> Log out
    </a>
  </div>
</div>

<div class="container mt-4" style="max-width: 1000px; margin: 0 auto;">
    <h2>Sales Report</h2>
    <div class="card" 
         style="
         width: 100%; 
            border: 1px solid #ddd; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            background-color: #ffffff; 
            margin-bottom: 20px;">
        <div class="card-body" style="padding: 0;">
            <table class="table table-striped" style="width: 100%; margin-bottom: 0;">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        <th>Sale ID</th>
                        <th>Date & Time</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Amount</th>
                        <th>Payment Method</th>
                        <th>Employee</th>
                    </tr>
                </thead>
                <tbody id="salesReportTable">
                    <!-- Sales report data will be dynamically inserted here -->
                </tbody>
            </table>
            <div style="text-align: right; padding: 10px;">
                <button class="btn btn-primary" 
                        style="background-color: #007bff; border: none; padding: 10px 20px; border-radius: 5px;" 
                        onclick="addSale()">Add Sale</button>
            </div>
        </div>
    </div>
</div>


<!-- Logout Confirmation Card -->
<div id="logoutCard" class="card" style="max-width: 80%; margin: auto; display: none; position: absolute; top: 20%; left: 50%; transform: translateX(-50%); z-index: 9999;">
    <div class="card-body text-center">
        <h5 class="card-title">Are you sure you want to log out?</h5>
        <a href="../pages/logout.php" class="btn btn-danger">Log out</a>
        <button class="btn btn-secondary" onclick="hideLogoutCard()">Cancel</button>
    </div>
</div>

<script>
let sales = [];

function renderSalesTable() {
    const tableBody = document.getElementById("salesReportTable");
    tableBody.innerHTML = sales.map((sale, index) => `
        <tr>
            <td>${index + 1}</td>
            <td>${sale.date}</td>
            <td>${sale.product}</td>
            <td>${sale.quantity}</td>
            <td>₱${sale.unit_price.toFixed(2)}</td>
            <td>₱${(sale.quantity * sale.unit_price).toFixed(2)}</td>
            <td>${sale.payment_method}</td>
            <td>${sale.employee}</td>
        </tr>
    `).join("");
}

function addSale() {
    const sale = {
        date: new Date().toLocaleString(),
        product: prompt("Enter Product Name"),
        quantity: parseInt(prompt("Enter Quantity"), 10) || 0,
        unit_price: parseFloat(prompt("Enter Unit Price"), 10) || 0,
        payment_method: prompt("Enter Payment Method (Cash, Card)"),
        employee: "User1" // This can be dynamically set to the logged-in user
    };

    if (sale.product && sale.quantity > 0 && sale.unit_price > 0) {
        sales.push(sale);
        renderSalesTable();
        saveToDatabase(sale);
    } else {
        alert("Invalid input. Sale not added.");
    }
}

function saveToDatabase(sale) {
    // Send data to the server using AJAX (Update this with your API)
    fetch("../api/save_sales_report.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(sale),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log("Sale saved to database.");
        } else {
            console.error("Failed to save sale.");
        }
    });
}

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.style.width = sidebar.style.width === "300px" ? "0" : "300px";
}

function showLogoutCard() {
    document.getElementById('logoutCard').style.display = 'block';
}

function hideLogoutCard() {
    document.getElementById('logoutCard').style.display = 'none';
}
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
