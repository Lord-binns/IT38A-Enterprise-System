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



<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>
    <a href="../pages/dashboard.php"><i class="fas fa-home"></i> DashBoard</a>
    <a href="../pages/borrow_page.php"><i class="fas fa-clock"></i> Inventory</a>
    <a href="../pages/favorites.php"><i class="fas fa-heart"></i> Suppliers</a>
    <a href="../pages/borrow_page.php"><i class="fas fa-clock"></i> Refunds and Returns</a>
    <a href="../pages/favorites.php"><i class="fas fa-heart"></i> User Log</a>
    <a href="../pages/logout.php" onclick="confirmLogout(event)"><i class="fas fa-power-off" style="color: red;"></i> Log out</a>
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