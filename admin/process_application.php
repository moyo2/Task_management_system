<?php
// Include database connection file
include_once('../includes/connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the approve button is clicked
    if (isset($_POST['approve'])) {
        // Retrieve application ID from the form
        $application_id = mysqli_real_escape_string($connection, $_POST['application_id']);

        // Fetch leave application details
        $query = "SELECT * FROM leave_applications WHERE id = '$application_id'";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Insert approved application details into the status table
            $insert_query = "INSERT INTO status (name, start_date, end_date, reason, Status) VALUES ('{$row['name']}', '{$row['start_date']}', '{$row['end_date']}', '{$row['reason']}', 'Approved')";
            $insert_result = mysqli_query($connection, $insert_query);

            // Delete the application from the leave_applications table
            $delete_query = "DELETE FROM leave_applications WHERE id = '$application_id'";
            $delete_result = mysqli_query($connection, $delete_query);

            if ($insert_result && $delete_result) {
                // Redirect user to a success page or display a success message
                header("Location: admin_dashboard.php");
                exit(); // Ensure that script execution stops after redirection
            } else {
                // Error occurred
                echo "Error: " . mysqli_error($connection);
            }
        } else {
            echo "Leave application not found.";
        }
    }
    // Check if the reject button is clicked
    elseif (isset($_POST['reject'])) {
        // Retrieve application ID from the form
        $application_id = mysqli_real_escape_string($connection, $_POST['application_id']);

        // Fetch leave application details
        $query = "SELECT * FROM leave_applications WHERE id = '$application_id'";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Insert rejected application details into the status table
            $insert_query = "INSERT INTO status (name, start_date, end_date, reason, Status) VALUES ('{$row['name']}', '{$row['start_date']}', '{$row['end_date']}', '{$row['reason']}', 'Rejected')";
            $insert_result = mysqli_query($connection, $insert_query);

            // Delete the application from the leave_applications table
            $delete_query = "DELETE FROM leave_applications WHERE id = '$application_id'";
            $delete_result = mysqli_query($connection, $delete_query);

            if ($insert_result && $delete_result) {
                // Redirect user to a success page or display a success message
                header("Location: admin_dashboard.php");
                exit(); // Ensure that script execution stops after redirection
            } else {
                // Error occurred
                echo "Error: " . mysqli_error($connection);
            }
        } else {
            echo "Leave application not found.";
        }
    }
}
?>
