<?php 
include_once('../includes/connection.php');
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Corrected SQL query with backticks
    $query = "DELETE FROM `task` WHERE `id` = '$id'";

    $query_run = mysqli_query($connection, $query);

    // Checking if the query was successful 
    if(!$query_run){
        die ("Query failed: " . mysqli_error($connection));
    }
    else{
        header('LOCATION: admin_dashboard.php?delete_msg=You have successfully deleted the task');
        exit; // exit to stop further execution
    }
}
?>

