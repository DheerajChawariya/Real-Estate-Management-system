<?php
include "config.php"; // Make sure the database connection is correct

// Check if 'pid' is set in the query string
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    // Execute DELETE query to remove the property from the database
    $query = "DELETE FROM property WHERE pid = $pid";
    $result = mysqli_query($con, $query);

    if ($result) {
        // After deletion, redirect to the property list page
        header("Location: admindashboard.php");
    } else {
        // If the deletion fails, show an error message
        echo "Error deleting property: " . mysqli_error($con);
    }
} else {
    // If no 'pid' is passed, display an error message
    echo "No property ID provided.";
}
?>
