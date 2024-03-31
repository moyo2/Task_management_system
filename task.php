<?php 
session_start();
?>
<?php 
include_once('./includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../includes/styles.css">
</head>

<body>
    <center><h3>Your Tasks </h3></center><br>
    <table class="table" style="background-color: whitesmoke; width: 75vw">
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
        $query = "SELECT * FROM task WHERE id = '{$_SESSION['id']}'";
        $_query_run = mysqli_query($connection, $query);
        $sno = 0; // Initialize serial number counter
        while ($row = mysqli_fetch_assoc($_query_run)) {
            $sno++; // Increment serial number
        ?>
        <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['uid']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['start_date']; ?></td>
            <td><?php echo $row['end_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><a href="#">Update</a></td>
            <td><a href="#">Delete</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
