<?php

$con = mysqli_connect("localhost", "root", "Dheeraj", "realestate");

$email = $_POST['email'];
$password = $_POST['password'];

// Fixing the query to properly use the email and password
$query = "SELECT * FROM admin WHERE aemail = '$email' AND apass = '$password'";

$result = mysqli_query($con, $query);

// Fetch the result
$row = mysqli_fetch_assoc($result); // Using mysqli_fetch_assoc() for associative array

// Check if a row exists and the email and password match
if ($row['aemail'] == $email && $row['apass'] == $password) {
    header("Location: admindashboard.php");
    exit();
} else {
    echo "Invalid email or password!";
}

// Close the connection
mysqli_close($con);
?>
