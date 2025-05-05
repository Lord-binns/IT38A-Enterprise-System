<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
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
      overflow-y: auto;
    }

    header {
      display: flex;
      align-items: center;
      gap: 1rem;
      flex-wrap: wrap;
      margin-bottom: 1rem;
    }

    header input,
    header select {
      font-size: 1.2rem;
      padding: 0.5rem;
    }

    header input {
      width: 250px;
    }

    header input {
      width: 750px; /* Increased width for the search bar */
    }

    header button {
      font-size: 1.5rem;
      padding: 0.5rem 1rem;
      cursor: pointer;
    }

    .dashboard-header {
      display: flex;
      flex-direction: column; /* Stack the elements vertically */
      align-items: flex-start; /* Align items to the left */
      margin-bottom: 1.5rem;
    }

    .dashboard-header h1 {
      font-size: 2rem;
      font-weight: bold;
    }

    .dashboard-header p {
      font-size: 1rem;
      color: #666;
      margin-top: 0.5rem; /* Adds space between the title and the description */
    }

    .dashboard-header select {
      font-size: 1.5rem;
      padding: 0.75rem;
      margin-top: 1rem; /* Adds space between the paragraph and the dropdown */
    }

    .metrics {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 2rem;
    }

    .card {
      flex: 1 1 200px;
      padding: 30px; /* Increased padding for larger cards */
      border-radius: 8px;
      color: white;
      font-weight: bold;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.8rem; /* Same font size for all cards */
    }

    .blue { background-color: #007bff; }
    .gold { background-color: #b8860b; }
    .green { background-color: #28a745; }
    .red { background-color: #dc3545; }
    .teal { background-color: #20c997; }

    .quick-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 20px; /* Increased gap for more spacing */
      margin-top: 2rem; /* Space above the quick actions */
    }

    .quick-actions button {
      padding: 20px 30px; /* Increased padding for larger buttons */
      font-size: 1.6rem; /* Increased font size */
      border: 1px solid #ccc;
      background: white;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s ease;
      min-width: 200px; /* Ensures buttons are a minimum size */
    }

    .quick-actions button:hover {
      background-color: #f2f2f2;
    }

  </style>
</head>
<body>
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
        <a href="../pages/logout.php" class="logout">Log out</a>
      </nav>
    </aside>

    <main class="main-content">
      <!-- Top header with search and notification -->
      <header>
        <input type="search" placeholder="Search...">
        <button>🔔</button>
      </header>

      <!-- Dashboard title and Today's Report beside it -->
      <section class="dashboard-header">
        <h1>Dashboard</h1>
        <p>A quick data overview of the inventory</p>
        <select>
          <option>Today's Report</option>
        </select>
      </section>

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
