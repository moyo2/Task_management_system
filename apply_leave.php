<?php

// Start session to access session variables
session_start();

// Include database connection file
include_once('includes/connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $start_date = mysqli_real_escape_string($connection, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($connection, $_POST['end_date']);
    $reason = mysqli_real_escape_string($connection, $_POST['reason']);
    
    // Calculate number of days
    $start_datetime = new DateTime($start_date);
    $end_datetime = new DateTime($end_date);
    $interval = $start_datetime->diff($end_datetime);
    $days = $interval->days + 1; // Adding 1 to include both start and end dates

     // Get current date as the application date
     $application_date = date("Y-m-d");

    // Assuming you have stored the logged-in user's name in a session variable
    $name = $_SESSION['name']; // Adjust this according to how you store the username in the session

    // Insert data into database
    $query = "INSERT INTO leave_applications (start_date, end_date, reason, name, days, application_date) VALUES ('$start_date', '$end_date', '$reason', '$name', '$days', '$application_date')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Leave application submitted successfully
        // Redirect user to a success page
        header("Location: user_dashboard.php");
        exit(); // Ensure that script execution stops after redirection
    } else {
        // Error occurred
        echo "Error: " . mysqli_error($connection);
    }

    // Close database connection
    mysqli_close($connection);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style placeholders for date inputs */
        input[type="date"]::webkit-input-placeholder {
            color: #999; /* Change placeholder color */
        }

        input[type="date"]:-moz-placeholder {
            color: #999; /* Change placeholder color for Firefox */
        }

        input[type="date"]::-moz-placeholder {
            color: #999; /* Change placeholder color for Firefox */
        }

        input[type="date"]:-ms-input-placeholder {
            color: #999; /* Change placeholder color for Edge */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Leave Application Form</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason:</label>
                        <textarea id="reason" name="reason" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
