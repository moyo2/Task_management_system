<?php
// Start session to access session variables
session_start();

// Include database connection file
include_once('includes/connection.php');

// Assuming you have stored the logged-in user's name in a session variable
$name = $_SESSION['name']; // Adjust this according to how you store the username in the session

// Fetch leave status for the logged-in user
$query = "SELECT * FROM status WHERE name = '$name'";
$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Status</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Leave Status for <?php echo $name; ?></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["start_date"] . "</td>";
                        echo "<td>" . $row["end_date"] . "</td>";
                        echo "<td>" . $row["reason"] . "</td>";
                        // Style the status column based on its value
                        $statusClass = '';
                        switch ($row["Status"]) {
                            case 'Approved':
                                $statusClass = 'text-success';
                                break;
                            case 'Rejected':
                                $statusClass = 'text-danger';
                                break;
                            case 'Pending':
                                $statusClass = 'text-warning';
                                break;
                            default:
                                $statusClass = 'text-muted';
                                break;
                        }
                        echo "<td class='$statusClass'>" . $row["Status"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No leave status found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close database connection
mysqli_close($connection);
?>
