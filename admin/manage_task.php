
<html >  
<center><h3>Assigned Tasked</h3></center>
<table class = "table">
<tr>
    <th>S.No</th>
    <th>Task ID</th>
    <th>Assigned User</th>
    <th>Description</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Status</th>
    <th>Update</th></th>
    <th>Delete</th>


</tr>
<?php 
include_once('../includes/connection.php');
$sno =1;
$query = "SELECT * FROM task";
$query_run = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($query_run)){
    ?>
    <tr>
    <td><?php echo $row['id'];?></td>
        <td><?php echo $row['uid'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['start_date'];?></td>
        <td><?php echo $row['end_date']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><a href="update_task.php?id=<?php echo $row['id'];?>" class = "btn btn-success" >Update</a></td>
        <td><a href="delete_task.php?id=<?php echo $row['id'];?>" class = "btn btn-danger" >Delete</a></td>
        </tr>

<?php
}


?>

</table>

</body>
</html>