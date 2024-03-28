<?php
// Start the session
session_start();

// Destroy all session data
session_destroy();

// Redirect to index.php
header("Location: index.php");
exit; 

?>