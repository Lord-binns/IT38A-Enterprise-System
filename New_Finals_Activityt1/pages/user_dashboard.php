<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Ensure Bootstrap is linked -->
    <link rel="stylesheet" href="../CSS/dashboard.css">
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
      <a href="../pages/suppliers.php"><i class="fas fa-cash-register"></i> Point of Sales</a>
      <hr>
      <a href="../pages/reports.php"><i class="fas fa-chart-bar"></i> Reports</a>
      <hr>
      <a href="../pages/inventory.php"><i class="fas fa-boxes"></i> Inventory</a>
      <hr>
      <a href="../pages/refunds_returns.php"><i class="fas fa-undo"></i> Refunds & Returns</a>
   
    </div>

    <a href="../pages/logout.php" class="logout-link" onclick="confirmLogout(event)">
      <i class="fas fa-power-off" style="color: red;"></i> Log out
    </a>
  </div>
</div>

<!-- Dashboard Overview Container (Full-width) -->
<div class="w-100 px-3 mt-4">
  <div class="card shadow p-4 mx-auto" 
       style="max-width: 90%; background-color: white; border-radius: 12px; color: #333;">
              
    <div class="row align-items-center">
      <!-- Dashboard Heading -->
      <div class="col-md-8 mb-3">
      <h1 style="font-weight: 800; font-size: 3rem; color: red;">🛒 Smart_Retail</h1>
        <p style="font-size: 1.5rem;">"Smarter Stores, Happier Customers"</p>
      </div>

      <!-- Logo Image -->
      <div class="col-md-4 text-center mb-3">
        <img src="https://scontent.fcgy2-4.fna.fbcdn.net/v/t39.30808-6/495575465_1851078032345688_8325333469187138347_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=127cfc&_nc_ohc=vNFRfgc4k4wQ7kNvwG7sIP3&_nc_oc=AdnenXQ6F7RZa6oqPUGSoCr3pYTpeMkvNLCaI5yRkoBepw1k8LEZOgSds5HGQ0s2HBQ&_nc_zt=23&_nc_ht=scontent.fcgy2-4.fna&_nc_gid=LH2t53CIHP8ckqbJaF721w&oh=00_AfJiJfrv7l6zsfW78Q7boZjcX6uu1CWfJHRMXGDuMiFcGQ&oe=681F82E8" 
             alt="Smart_Retail Logo" style="height: 200px; width: 200px; object-fit: cover; border-radius: 50%; border: 3px solid #ddd;">
      </div>
    </div>
    
  </div>
</div>





<script>
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    if (sidebar.style.width === "300px") {
        sidebar.style.width = "0";
    } else {
        sidebar.style.width = "300px";
    }
}
</script>

</body>
</html>
