<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../includes/styles.css">
</head>
<body>
<div class="container-sm">
<div class="container mt-5">
    <h2>Create Task</h2>
    <form  action="admin_dashboard.php" method="POST">
        <div class="form-group">
            <label for="taskName">Task Name:</label>
            <input type="text" class="form-control" id="taskName" name="taskName" required>
        </div>

        <div class="form-group">
            <label for="taskDescription">Task Description:</label>
            <textarea class="form-control" id="taskDescription" name="taskDescription" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Start</label>
                <input type="date" class="form-control" name="start_date" placeholder="Start Date:" >
        </div>
        <div class="form-group">
            <label for="start_date">End Date </label>
                <input type="date" class="form-control" name="end_date"  placeholder="End Date:" >
           
        </div>



        <div class="form-group">
            <label for="assignedUser">Assign To:</label>
            <select class="form-control" id="assignedUser" name="assignedUser" required>
                <?php
                include_once('../includes/connection.php');
                $query = "SELECT uid, name, email FROM users";
                $query_run = mysqli_query($connection, $query);
                if (mysqli_num_rows($query_run)) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div> 

        <button type="submit" class="btn btn-primary" name="create_task" value= "Create_task">Create Task</button>
    </form>
</div>

</div>


    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
