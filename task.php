<?php 
session_start();
include_once('includes/connection.php');
?>
<!DOCTYPE html>
<html>  
<head>
    <title>Assigned Tasks</title>
</head>
<body>
    <center><h3>Assigned Tasks</h3></center>
    <table class="table">
        <tr>
            <th>S.No</th>
            <th>Task ID</th>
            <th>Assigned User</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php 
        $sno = 1;
        $userId = $_SESSION['name'];
        $query = "SELECT * FROM task WHERE name ='$userId'";
        $query_run = mysqli_query($connection, $query);
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                    <td><?php echo $sno++; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['uid']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['start_date']; ?></td>
                    <td><?php echo $row['end_date']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><a href="update_task.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_task.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
            }
        } else {
            echo '<tr><td colspan="9"><center>You have no tasks today</center></td></tr>';
        }
        ?>
    </table>
</body>
</html>
