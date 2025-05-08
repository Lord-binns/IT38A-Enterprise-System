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
      <a href="../admin_pages/refunds_returns.php"><i class="fas fa-undo"></i> Refunds & Returns</a>
      <hr>
      <a href="../admin_pages/user_log.php"><i class="fas fa-user-clock"></i> User Log</a>
    </div>

    <a href="javascript:void(0)" class="logout-link" onclick="showLogoutModal(event)">
  <i class="fas fa-power-off" style="color: red;"></i> Log out
</a>
  </div>
</div>

<!-- Dashboard Overview Container (Full-width) -->
<div class="w-100 px-3 mt-4">
  <div class="card shadow p-4 mx-auto" style="max-width: 80%; background-color: #f0f0f0; border-radius: 12px;">

    <div class="row align-items-center">
      
      <!-- Dashboard Heading -->
      <div class="col-md-4 mb-3">
        <h1 style="font-weight: 700; font-size: 2.5rem; color: #333;">📊 Welcome Back Admin Binns!</h1>
        <p style="color: #666;">Admin dashboard quick and organized interface for SmartRetail.</p>
      </div>

      <!-- System Status Card -->
      <div class="col-md-4 mb-3">
        <div class="card text-white bg-success shadow-sm text-center">
          <div class="card-body">
            <h5 class="card-title">System Status</h5>
            <p class="card-text">All systems operational</p>
            <i class="fas fa-check-circle fa-2x"></i>
          </div>
        </div>
      </div>

      <!-- Notifications Card -->
      <div class="col-md-4 mb-3">
        <div class="card text-white bg-warning shadow-sm text-center">
          <div class="card-body">
            <h5 class="card-title">Notifications</h5>
            <p class="card-text">3 pending supplier updates</p>
            <i class="fas fa-bell fa-2x"></i>
          </div>
        </div>
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
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card about-card">
                <img src="  https://i.pinimg.com/originals/d8/b8/4a/d8b84aef92673675ad6ffbd8d582f8b6.gif" class="card-img-top" alt="Team Syn-Tech">
                <div class="card-body text-center">
                    <h3 class="card-title">Add new Product</h3>
                    <h5 class="card-text">  </h5>
                </div>
            </div>
        </div>
      
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card about-card">
                <img src="https://i.pinimg.com/originals/1a/a4/bd/1aa4bd174b9226673c061b01f1b64b1f.gif" class="card-img-top" alt="Team Syn-Tech">
                <div class="card-body text-center">
                    <h3 class="card-title">Add new Supplier</h3>
                    <h5 class="card-text">  </h5>
                </div>
            </div>
        </div>
 
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card about-card">
                <img src="https://i.pinimg.com/originals/2d/f3/ed/2df3edaaab82b315c155165a0f00d2ee.gif" class="card-img-top" alt="Image 3">
                <div class="card-body text-center">
                    <h3 class="card-title">Create New Invoice</h3>
                    <h5 class="card-text"></h5>
                </div>
            </div>
        </div>
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