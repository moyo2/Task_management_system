<?php
// database connections
$server = "localhost";
$username = "root";
$password = "";
 $db = "emails";


// Create connection
$database =  mysqli_connect($server, $username, $password,$db );

// Check connection
if ($database ->connect_error) {
  die("Connection failed: " . $database ->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];

$query = "INSERT INTO email_list( name)
VALUES ('$name, $email')";

$result = mysqli_query ($database, $query)
or die('error querying database');

mysqli_close($database);





?>