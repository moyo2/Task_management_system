<?php
// Include database connection file
include_once('includes/connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $start_date = mysqli_real_escape_string($connection, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($connection, $_POST['end_date']);
    $reason = mysqli_real_escape_string($connection, $_POST['reason']);

    // Insert data into database
    $query = "INSERT INTO leave_applications (start_date, end_date, reason) VALUES ('$start_date', '$end_date', '$reason')";
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
</head>
<body>
    <h2>Leave Application Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>
        
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>
        
        <label for="reason">Reason:</label><br>
        <textarea id="reason" name="reason" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
