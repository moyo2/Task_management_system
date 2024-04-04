<?php
include_once('../includes/connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // Get the user IDs and statuses from the form
        $user_statuses = $_POST['status'];

        // Loop through each user status
        foreach ($user_statuses as $user_id => $status) {
            if ($status === 'present') {
                // Insert data into the present table
                $current_date_time = date('Y-m-d H:i:s');
                $query = "INSERT INTO present (name, date, ) VALUES ('$user_id', '$current_date_time')";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    echo "Error: " . mysqli_error($connection);
                }
            }
        }

        // Redirect back to the same page
        header("Location: admin_dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Mark Users
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch users from the users table
                                $query = "SELECT * FROM users";
                                $result = mysqli_query($connection, $query);

                                // Check if users exist
                                if (mysqli_num_rows($result) > 0) {
                                    // Loop through each user
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['id'] . '</td>';
                                        echo '<td>' . $row['name'] . '</td>';
                                        echo '<td>';
                                        echo '<button type="submit" class="btn btn-success mr-2" name="status[' . $row['id'] . ']" value="present">Present</button>';
                                        echo '<button type="submit" class="btn btn-danger" name="status[' . $row['id'] . ']" value="absent">Absent</button>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="3" class="text-center">No users found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <input type="submit" name="submit" value="Submit" style="display: none;"> <!-- Hidden submit button -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
