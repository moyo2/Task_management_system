<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, "taskvibe_db");
?>
<?php
// Database credentials
$servername = "localhost"; // server IP address
$username = "root";
$password = "";
$database = "taskvibe_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connected successfully";
// }

// // Close connection (optional, as PHP automatically closes it at the end of the script)
 $conn->close();
?>




