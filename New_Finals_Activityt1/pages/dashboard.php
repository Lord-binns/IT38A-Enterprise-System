<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/dashboard.css">
</head>

<body>

<div class="top-bar">
    <button class="open-btn" onclick="toggleSidebar()">☰ Menu</button>
    <input type="text" class="search-input" placeholder="Search...">
</div>


<div id="sidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>

  <div class="sidebar-content">
    <div class="sidebar-links">

    <div class="admin-profile">
    <img src="https://static.vecteezy.com/system/resources/previews/012/210/707/non_2x/worker-employee-businessman-avatar-profile-icon-vector.jpg" alt="Admin" class="admin-avatar">
    <p class="admin-name">Admin</p>
</div>
<hr>
      <a href="../pages/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      <hr>
      <a href="../pages/reports.php"><i class="fas fa-chart-bar"></i> Reports</a>
      <hr>
      <a href="../pages/inventory.php"><i class="fas fa-boxes"></i> Inventory</a>
      <hr>
      <a href="../pages/suppliers.php"><i class="fas fa-truck"></i> Suppliers</a>
      <hr>
      <a href="../pages/refunds_returns.php"><i class="fas fa-undo"></i> Refunds & Returns</a>
      <hr>
      <a href="../pages/user_log.php"><i class="fas fa-user-clock"></i> User Log</a>
    </div>

    <a href="../pages/logout.php" class="logout-link" onclick="confirmLogout(event)">
      <i class="fas fa-power-off" style="color: red;"></i> Log out
    </a>
  </div>
</div>



<script>
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    if (sidebar.style.width === "250px") {
        sidebar.style.width = "0";
    } else {
        sidebar.style.width = "250px";
    }
}
</script>



</body>
</html>