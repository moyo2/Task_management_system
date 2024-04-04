<?php
include_once('../includes/connection.php');
include_once('../includes/header.php');

if(isset($_POST['create_task'])){
    // Sanitize input data
    $assignedUser = mysqli_real_escape_string($connection, $_POST['assignedUser']);
    $taskName = mysqli_real_escape_string($connection, $_POST['taskName']);
    $taskDescription = mysqli_real_escape_string($connection, $_POST['taskDescription']);
    $start_date = mysqli_real_escape_string($connection, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($connection, $_POST['end_date']);

    // Prepare query
    $query = "INSERT INTO task VALUES (null, '$taskName','$assignedUser', '$taskDescription', '$start_date', '$end_date','Not started')";
    
    // Execute query
    $query_run = mysqli_query($connection, $query);

    // Check if query execution was successful
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Task created successfully');
        window.location.href ='admin_dashboard.php';
        </script>";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Task not created. Please try again.');
        window.location.href ='create_task.php';
        </script>";
    }
}
?>

<!-- jQuery code -->
<!-- create task sidebar function -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#create_task").click(function(event){
            event.preventDefault(event);
            $("#right_sidebar").load("create_task.php"); 
        })
    });
</script>

<!-- manage task sidebar function -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#manage_task").click(function(event){
            event.preventDefault(event);
            $("#right_sidebar").load("manage_task.php"); 
        })
    });
</script>

<!-- update task sidebar function -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#edit").click(function(event){
            event.preventDefault(event);
            $("#right_sidebar").load("edit_task.php"); 
        })
    });
</script>

<!-- Leave application sidebar function -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#leave_application").click(function(event){
            event.preventDefault(event);
            $("#right_sidebar").load("leave_application.php"); 
        })
    });
</script>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <!-- Dashboard Header -->
      <div class="dashboard-header">
        <h1>TaskVibe</h1>
        <div class="p_header"> 
          <p>Admin Name</p>
          <p> Admin@example.com</p>
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
          <li><a href="admin_dashboard.php" id="dashboard"   type="button" class="link">Dashboard</a></li>
          <li><a href="create_task.php"  id="create_task"     type="button" class="link">Create Task</a></li>
          <li><a href="manage_task.php"  id="manage_task"   type="button" class="link">Manage Task</a></li>
          <li><a href="leave_application.php"  id="leave_application"  type="button" class="link" >Leave Applications</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-9"   id="right_sidebar">
      <!-- Dashboard Content -->
      <div class="dashboard-content" >
        <div class="card card-table">
          <!-- table content  -->
          <h2>Welcome to TaskVibe Dashboard</h2>
          
          <!-- <?php 
          // if(isset($_GET['update_msg'])){
          //   echo "<h6>".$_GET['update_msg']."</h6>";
          // }
          ?>

      <?php 
          // if(isset($_GET['update_msg'])){
