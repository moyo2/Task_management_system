
<html >  
<center><h3>Assigned Tasked</h3></center>
<table class = "table">
<tr>
    <th>S.No</th>
    <th>Task ID</th>
    <th>Description</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>
<?php 
include_once('../includes/connection.php');
$sno =1;
$query = "SELECT * FROM task";
$query_run = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($query_run)){
    ?>
    <tr>
        <td><?php echo $sno; ?></td>
        <td><?php echo $row['uid'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><?php echo $row['start_date'] ?></td>
        <td><?php echo $row['end_date'] ?></td>
        <td><?php echo $row['status'] ?></td>
      <td> <a href="edit_task.ph?id=<?php ?>">Edit</a> |<a href="edit_task.ph?id=<?php ?>">Edit</a> </td>
        </tr>
        <?php 
       
        $sno = $sno + 1;
}
?>

</table>

</body>
</html>