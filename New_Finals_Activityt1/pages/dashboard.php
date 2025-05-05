<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>

</head>
<body>
  <style>
body {
    font-family: 'Segoe UI', sans-serif;
    margin: 0;
    background-color: #f0f0f0;
  }
  
  .dashboard-container {
    display: flex;
    height: 100vh;
  }
  
  .sidebar {
    background-color: #2b2b2b;
    color: white;
    width: 250px;
    padding: 20px;
  }
  
  .sidebar ul {
    list-style: none;
    padding: 0;
  }
  
  .sidebar ul li {
    margin: 15px 0;
    cursor: pointer;
  }
  
  .sidebar .active {
    font-weight: bold;
  }
  
  .main-content {
    flex-grow: 1;
    padding: 20px;
    background-color: white;
  }
  
  .metrics {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
  }
  
  .card {
    padding: 20px;
    border-radius: 8px;
    flex: 1;
    margin: 0 10px;
    color: white;
    font-weight: bold;
  }
  
  .blue { background-color: #007bff; }
  .gold { background-color: #b8860b; }
  .green { background-color: #28a745; }
  .red { background-color: #dc3545; }
  .teal { background-color: #20c997; }
  
  .quick-actions button {
    margin: 10px;
    padding: 15px;
    border: 1px solid #ccc;
    background: white;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.3s ease;
  }
  
  .quick-actions button:hover {
    background-color: #f2f2f2;
  }
  
  </style>
  <div class="dashboard-container">
    <aside class="sidebar">
      <div class="admin-info">
        <div class="avatar"></div>
        <p>Admin</p>
      </div>
      <nav>
        <ul>
          <li class="active">Dashboard</li>
          <li>Inventory</li>
          <li>Sales Reports</li>
          <li>Contact Suppliers</li>
          <li>Refunds & Returns</li>
          <li>Access Logs</li>
        </ul>
        <a href="logout.php" class="logout">Log out</a>
      </nav>
    </aside>

    <main class="main-content">
      <header>
        <input type="search" placeholder="Search...">
        <button>🔔</button>
        <select>
          <option>Today's Report</option>
        </select>
      </header>

      <section class="metrics">
        <div class="card blue">Total Customer: <span>20</span></div>
        <div class="card gold">Total Invoice: <span>15</span></div>
        <div class="card green">Total Product: <span>156</span></div>
        <div class="card red">Total Supplier: <span>10</span></div>
        <div class="card teal">Out of Stock: <span>8</span></div>
      </section>

      <section class="quick-actions">
        <button>Create New Invoice</button>
        <button>Business Tips</button>
        <button>Add New Products</button>
        <button>Manage Users</button>
        <button>Sales Report</button>
        <button>Add New Supplier</button>
      </section>
    </main>
  </div>
</body>
</html>
