




<?php 
include_once('../includes/connection.php');
include_once('../includes/header.php');

?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if(!$query_run){
        die("Query failed: " . mysqli_error($connection));
    }
    else{
        $row = mysqli_fetch_assoc($query_run);
    }
}
?>

<?php
// update button
if(isset($_POST['update'])){
    // Get form data
    $taskName = $_POST['taskName'];
    $taskDescription = $_POST['taskDescription'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    // Update query 
    $query = "UPDATE `task` SET  uid = '$taskName', description ='$taskDescription', 
              start_date = '$start_date', end_date = '$end_date' WHERE `id` = '$id'";

    // Execute the query
    $query_run = mysqli_query($connection, $query);
    if(!$query_run){
        die("Query failed: " . mysqli_error($connection));
    }
    else{
        header('LOCATION:admin_dashboard.php?update_msg=You have successfully updated the task.');
    }
}
?>

<?php include_once('../includes/connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Task</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../includes/styles.css">

</head>
<body>
    
<div class="container-sm">
<div class="container mt-5">
    <h2>Update Task</h2>
    <form action="update_task.php?id=<?php echo $id;?>" method="POST">
        <div class="form-group">
            <label for="taskName">Task Name:</label>
            <input type="text" class="form-control" id="taskName" name="taskName" value="<?php echo $row['uid']; ?>" required>
        </div>

        <div class="form-group">
            <label for="taskDescription">Task Description:</label>
            <textarea class="form-control" id="taskDescription" name="taskDescription" rows="4" cols="50"><?php echo $row['description']; ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control" name="start_date" value="<?php echo $row['start_date']; ?>">
        </div>
        
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>">
        </div>
        
        <input type="submit" class="btn btn-success" name="update" value="Update">
    </form>
</div>
</div>
</body>
</html>
