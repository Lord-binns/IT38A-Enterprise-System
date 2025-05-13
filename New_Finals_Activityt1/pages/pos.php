<?php
// Start session at the beginning
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../pages/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartRetail POS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/pos.css">
    <style>
        .card-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); 
            gap: 20px; 
            padding: 20px; 
            margin: 0 auto; 
            width: 60%; 
        }
        .card { 
            width: 100%; 
            border: none; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            transition: transform 0.2s; 
        }

    </style>
</head>

<body>
<div class="top-bar">
    <button class="open-btn" onclick="toggleSidebar()">☰ Menu</button>
    <input type="text" class="search-input" placeholder="Search...">

    <!-- Notification Button -->
    <button class="open-btn" style="display: flex; align-items: center; gap: 6px; background-color:rgb(2, 2, 1); color: white;">
        <i class="fas fa-bell"></i>
        <span style="font-weight: bold;">Notifications</span>
    </button>

      <!-- Logo Image -->
      <div class="col-md-6 text-center mb-6">
        <img src="https://scontent.fcgy1-2.fna.fbcdn.net/v/t39.30808-6/495575465_1851078032345688_8325333469187138347_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeGh8HtMMvuQzd7S02DkmsEdkyDSnA32ByKTINKcDfYHIh9zsPhpwe_BWEjykOQOS60H-nsVhsmM0A4smOlgK9wV&_nc_ohc=G5e-l6wNY78Q7kNvwGKJByY&_nc_oc=AdmxsIH3jDFu-0PCHaHVJ8ArnY-UshAnVj48Skyd_cUsaQ82B-1nWPwkon-zPV9ckgk&_nc_zt=23&_nc_ht=scontent.fcgy1-2.fna&_nc_gid=xU2lOYxtOA24eHR9PD2Gtw&oh=00_AfJnOuxPO6GTYukerKemGgZRG8YEqvffuWe3TNelIHpssA&oe=6828BD68" 
             alt="Smart_Retail Logo" style="height: 65px; width: 65px; object-fit: cover; border-radius: 50%; border: 3px solid #ddd;">
      </div>
</div>

<div id="sidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>

  <div class="sidebar-content">
    <div class="sidebar-links">
    <div class="admin-profile">
        <img src="https://i.pinimg.com/736x/c0/a8/2a/c0a82a54db981757a94b1180b2e83a5d.jpg" alt="Admin" class="admin-avatar">
        <p class="admin-name">User Profile</p>
    </div>
    <hr>
      <a href="../pages/user_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      <hr>
      <a href="../pages/pos.php"><i class="fas fa-cash-register"></i> Point of Sales</a>
      <hr>
      <a href="../pages/reports.php"><i class="fas fa-chart-bar"></i> Reports</a>
      <hr>
      <a href="../pages/inventory.php"><i class="fas fa-boxes"></i> Inventory</a>
      <hr>
      <a href="../pages/refunds_returns.php"><i class="fas fa-undo"></i> Refunds & Returns</a>
    </div>

    <a href="javascript:void(0)" class="logout-link" onclick="showLogoutCard()">
      <i class="fas fa-power-off" style="color: red;"></i> Log out
    </a>
  </div>
</div>

<!-- Dashboard Overview Container (Full-width) -->
<div class="w-100 px-3 mt-4">
  <div class="card shadow p-4 mx-auto" style="max-width: 90%; background-color: white; padding-top:-20px; border-radius: 12px; color: #333;">
    <div class="row align-items-center">
      <!-- Dashboard Heading -->
      <div class="col-md-8 mb-3">
        <h1 style="font-weight: 800; font-size: 3rem; color: red;">🛒 Smart_Retail</h1>
        <p style="font-size: 1.5rem;">"Smarter Stores, Happier Customers"</p>
      </div>

<!-- Display Panel for Selected Product and Total -->
<div class="col-md-4 mb-3 text-right" style="margin-left: -150px;"> 
    <div class="form-control" style="height: 350px; width: 550px; overflow-y: auto; background-color: #f8f9fa; border: 1px solid #ddd; padding: 10px;">
        <h5 style="font-weight: bold;">Smart Retail Receipt</h5>
        <hr style="border-top: 1px dashed #333;">

        <div id="selectedProductsList" style="font-size: 0.9rem; color: #333; text-align: left; padding-left: 10px; font-family: monospace;"></div>
        <hr style="border-top: 1px dashed #333;">
        <p style="font-weight: bold;">Total: ₱ <span id="totalDisplay">0.00</span></p>
        <p style="font-size: 0.7rem; color: #666;">Cash: ₱ <span id="cashDisplay">0.00</span></p>
        <p style="font-size: 0.7rem; color: #666;">Change: ₱ <span id="changeDisplay">0.00</span></p>
        <p style="font-size: 0.7rem; color: #666;">Receipt No: <span id="receiptNumber"></span></p>
        <p style="font-size: 0.7rem; color: #666;">Time: <span id="currentTime"></span></p>
        <p style="font-size: 0.9rem; color: #666;">Cashier: <span id="loggedInUser">User_Name</span></p>
        <p style="font-size: 0.9rem; color: #666;">Thank you for shopping! Please come back again!</p>
         <button class="btn btn-primary mt-2" onclick="proceedPayment()">Proceed</button> 
       
    </div>
</div>



        </div>
      
      </div>
    </div>
  </div>
</div>

<script>
    // Define the addToDisplay function
    function addToDisplay(productTitle, productPrice) {
        // Check if the product already exists in the selected list
        const existingProduct = selectedProducts.find(product => product.name === productTitle);

        if (existingProduct) {
            existingProduct.qty += 1; // Increase quantity if it already exists
        } else {
            // Add new product to the list
            selectedProducts.push({
                name: productTitle,
                price: productPrice,
                qty: 1
            });
        }

        // Update total amount
        totalAmount += productPrice;
        updateDisplay(); // Call the updateDisplay function to refresh the display
    }
</script>

<script>
// Initialize selected products list and total
// Make loggedInUser global
let loggedInUser = "Guest";

document.addEventListener("DOMContentLoaded", function() {
    loggedInUser = "<?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?>";
    document.getElementById('loggedInUser').innerText = loggedInUser;
});


// Initialize selected products list and total
let selectedProducts = [];
let totalAmount = 0;

// Function to generate unique receipt number
function generateReceiptNumber() {
    const now = new Date();
    return 'SR-' + now.getFullYear().toString().slice(-2) + 
           (now.getMonth() + 1).toString().padStart(2, '0') + 
           now.getDate().toString().padStart(2, '0') + 
           now.getHours().toString().padStart(2, '0') + 
           now.getMinutes().toString().padStart(2, '0') + 
           now.getSeconds().toString().padStart(2, '0');
}

// Function to update the display
function updateDisplay() {
    const selectedProductsList = document.getElementById('selectedProductsList');
    selectedProductsList.innerHTML = `<pre style="font-family: monospace; white-space: pre;"> QTY   ITEM                          PRICE\n----------------------------------------------</pre>`;

    selectedProducts.forEach(product => {
        selectedProductsList.innerHTML += `<pre>${product.qty.toString().padEnd(5)} ${product.name.padEnd(28)} ₱${product.price.toFixed(2)}</pre>`;
    });

    document.getElementById('totalDisplay').innerText = totalAmount.toFixed(2);
    document.getElementById('currentTime').innerText = new Date().toLocaleString();
    document.getElementById('receiptNumber').innerText = generateReceiptNumber();
    document.getElementById('loggedInUser').innerText = loggedInUser; // Use global variable here
}

// Function for Proceed button
function proceedPayment() {
    if (totalAmount === 0) {
        alert("Please add items to the receipt before proceeding.");
        return;
    }

    const customerCash = parseFloat(prompt("Enter Customer Cash Amount:"));
    if (isNaN(customerCash) || customerCash <= 0) {
        alert("Invalid cash amount. Please enter a valid number.");
        return;
    }

    const change = customerCash - totalAmount;
    if (change < 0) {
        alert("Insufficient amount. Please enter enough cash.");
        return;
    }

    document.getElementById('cashDisplay').innerText = customerCash.toFixed(2);
    document.getElementById('changeDisplay').innerText = change.toFixed(2);

    const receiptData = {
        receipt_number: document.getElementById('receiptNumber').innerText,
        total_amount: totalAmount,
        customer_cash: customerCash,
        change: change,
        cashier: loggedInUser, // Use the global loggedInUser variable
        products: selectedProducts,
        date_time: new Date().toLocaleString()
    };

    console.log("Receipt Data:", receiptData); // Debugging line

    fetch('../process/receipt-api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(receiptData),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Payment Successful! Receipt saved.");
            resetReceipt();
        } else {
            alert("Error saving receipt. Please try again.");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
}

// Function to reset receipt display after payment
function resetReceipt() {
    selectedProducts = [];
    totalAmount = 0;
    updateDisplay();
    document.getElementById('cashDisplay').innerText = '0.00';
    document.getElementById('changeDisplay').innerText = '0.00';
}





    // Fetch Products and Display
    fetch('../products/products-api.php')
        .then(response => response.json())
        .then(data => {
            const productsContainer = document.getElementById('productsDisplay');
            productsContainer.innerHTML = ''; // Clear existing products

            data.forEach(product => {
                const cardHTML = `
                    <div class="card">
                        <img class="card-img-top" src="${product.img}" alt="${product.title}">
                        <div class="card-body">
                            <h5 class="card-title">${product.title}</h5>
                            <p class="card-text">${product.description}</p>
                            <p class="card-text">Price: ₱${product.rrp}</p>
                            <button class="btn btn-success" 
                                    onclick="addToDisplay('${product.title}', ${product.rrp})">
                                <i class="fas fa-cart-plus"></i> Add to Display
                            </button>
                        </div>
                    </div>
                `;
                productsContainer.innerHTML += cardHTML;
            });
        })
        .catch(error => console.error('Error fetching products:', error));
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const loggedInUser = "<?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?>";
    document.getElementById('loggedInUser').innerText = loggedInUser;
});
</script>



<!-- Product Listing -->
<div id="productsDisplay" class="card-grid"></div>




<script>
    // Sidebar Toggle Function
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        sidebar.style.width = (sidebar.style.width === "300px") ? "0" : "300px";
    }

    // Show Logout Confirmation and Redirect
    function showLogoutCard() {
        if (confirm("Are you sure you want to log out?")) {
            window.location.href = "../pages/logout.php"; // Redirect to your logout page
        }
    }

    // Fetch Products and Display
    fetch('../products/products-api.php')
        .then(response => response.json())
        .then(data => {
            const productsContainer = document.getElementById('productsDisplay');
            productsContainer.innerHTML = ''; // Clear existing products

            data.forEach(product => {
                const cardHTML = `
<!-- Updated Product Card in Product Listing -->
<div class="card">
    <img class="card-img-top" src="${product.img}" alt="${product.title}">
    <div class="card-body">
        <h5 class="card-title">${product.title}</h5>
        <p class="card-text">${product.description}</p>
        <p class="card-text">Price: ₱${product.rrp}</p>
        <button class="btn btn-success" 
                onclick="addToDisplay('${product.title}', ${product.rrp})">
            <i class="fas fa-cart-plus"></i> Proceed to buy
        </button>
    </div>
</div>

                `;
                productsContainer.innerHTML += cardHTML;
            });
        })
        .catch(error => console.error('Error fetching products:', error));

  

   
</script>


<!-- Bootstrap JS (Optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
