<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom Styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 4px;
      padding: 0;
    }
    .sidebar {
      background-color: #343a40;
      padding: 20px;
      color: #fff;
      height: 100%;
      text-align: left;
    }
    .sidebar h3 {
      margin-bottom: 40px;
      text-align: center;
    }
    .sidebar ul li {
      list-style-type: none;
      margin-bottom: 10px;
      
    }
    .dashboard-header {
      background-color: #007bff;
      color: #fff;
      padding: 20px;
      text-align: left;
      height: 20vh;
      border-bottom-right-radius: 10px;
      border-top-right-radius: 10px;
      border-top-left-radius: 10px;
      position: relative;
    }

    .p_header{
      background-color: #007bff;
      color: #fff;
      margin: 0;
      padding: 0;
      position: absolute;
      top: 20px;
      right: 20px;
      text-align: center;
      width: 20%;
    }

    .dashboard-content {
      margin-top: 20px;
      height: 50vh;
    }
    .card-table {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      height: 35%;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <!-- Dashboard Header -->
      <div class="dashboard-header">
        <h1>TaskVibe</h1>
        <div class="p_header"> 
          <p>User Name</p>
          <p> user@example.com</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <!-- Sidebar -->
      <div class="sidebar">
        <h3>Menu</h3>
        <ul>
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Update Task</a></li>
          <li><a href="#">Apply Leave</a></li>
          <li><a href="#">Leave Status</a></li>
          <li><a href="#">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <!-- Dashboard Content -->
      <div class="dashboard-content">
        <div class="card card-table">
          <!-- table content  -->
          <h2>Welcome to TaskVibe Dashboard</h2>
          
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
