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
</div>


<div id="sidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>

  <div class="sidebar-content">
    <div class="sidebar-links">

    <div class="admin-profile">
    <img src="https://i.pinimg.com/736x/4e/ba/de/4ebadeafda17ccd4bb6257b86c9f9c09.jpg" alt="Admin" class="admin-avatar">
    <p class="admin-name">Admin Profile</p>
</div>
<hr>
      <a href="../admin_pages/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      <hr>
      <a href="../admin_pages/reports.php"><i class="fas fa-chart-bar"></i> Reports</a>
      <hr>
      <a href="../admin_pages/inventory.php"><i class="fas fa-boxes"></i> Inventory</a>
      <hr>
      <a href="../admin_pages/suppliers.php"><i class="fas fa-truck"></i> Suppliers</a>
      <hr>
      <a href="../admin_pages/refunds_returns.php" style="color: yellow; "><i class="fas fa-undo"></i> Refunds & Returns</a>
      <hr>
      <a href="../admin_pages/user_log.php"><i class="fas fa-user-clock"></i> User Log</a>
    </div>

    <a href="javascript:void(0)" class="logout-link" onclick="showLogoutModal(event)">
  <i class="fas fa-power-off" style="color: red;"></i> Log out
</a>
  </div>
</div>








<!-- Logout Confirmation Modal -->
<div id="logoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to log out?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="../pages/logout.php" class="btn btn-danger">Log out</a>
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

function showLogoutModal() {
    $('#logoutModal').modal('show');
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