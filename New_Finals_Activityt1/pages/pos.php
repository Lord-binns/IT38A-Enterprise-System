<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Ensure Bootstrap is linked -->
    <link rel="stylesheet" href="../CSS/pos.css">
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
        <img src="https://scontent.fcgy2-4.fna.fbcdn.net/v/t39.30808-6/495575465_1851078032345688_8325333469187138347_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=127cfc&_nc_ohc=vNFRfgc4k4wQ7kNvwG7sIP3&_nc_oc=AdnenXQ6F7RZa6oqPUGSoCr3pYTpeMkvNLCaI5yRkoBepw1k8LEZOgSds5HGQ0s2HBQ&_nc_zt=23&_nc_ht=scontent.fcgy2-4.fna&_nc_gid=LH2t53CIHP8ckqbJaF721w&oh=00_AfJiJfrv7l6zsfW78Q7boZjcX6uu1CWfJHRMXGDuMiFcGQ&oe=681F82E8" 
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
  <div class="card shadow p-4 mx-auto" style="max-width: 90%; background-color: white; border-radius: 12px; color: #333;">
    <div class="row align-items-center">
      <!-- Dashboard Heading -->
      <div class="col-md-8 mb-3">
        <h1 style="font-weight: 800; font-size: 3rem; color: red;">🛒 Smart_Retail</h1>
        <p style="font-size: 1.5rem;">"Smarter Stores, Happier Customers"</p>
      </div>

    
    </div>
  </div>
</div>


<!-- Card Container -->
<div class="container card-container">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card about-card">
                <img src="https://i.pinimg.com/originals/5f/e9/14/5fe914ff84aeea70d67609587b2ec38c.gif" class="card-img-top" alt="Image 2">
                <div class="card-body text-center">
                    <h3 class="card-title"> Sales Report</h3>
                    <h5 class="card-text"> </h5>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card about-card">
                <img src="https://i.pinimg.com/originals/74/fe/58/74fe58b6918fa081662612578de66dc1.gif" class="card-img-top" alt="Team Syn-Tech">
                <div class="card-body text-center">
                    <h3 class="card-title">Bussiness Tips</h3>
                    <h5 class="card-text">  </h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card about-card">
                <img src="https://i.pinimg.com/originals/0e/e9/61/0ee961aa770d96ac9d36b22bc28f3e64.gif" class="card-img-top" alt="Team Syn-Tech">
                <div class="card-body text-center">
                    <h3 class="card-title">Manage Users</h3>
                    <h5 class="card-text">  </h5>
                </div>
            </div>
        </div>





<!-- Logout Confirmation Card (Initially Hidden) -->
<div id="logoutCard" class="card" style="max-width: 80%; margin: auto; display: none; position: absolute; top: 20%; left: 50%; transform: translateX(-50%); z-index: 9999;">
    <div class="card-body text-center">
        <h5 class="card-title">Are you sure you want to log out?</h5>
        <a href="../pages/logout.php" class="btn btn-danger">Log out</a>
        <button class="btn btn-secondary" onclick="hideLogoutCard()">Cancel</button>
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

function showLogoutCard() {
    document.getElementById('logoutCard').style.display = 'block';
}

function hideLogoutCard() {
    document.getElementById('logoutCard').style.display = 'none';
}
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Popper.js (required for Bootstrap) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
