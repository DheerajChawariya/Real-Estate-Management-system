<?php
include "config.php";

// Get the data from the form
$pid = $_POST['pid'];
$title = $_POST['title'];
$pcontaint = $_POST['pcontaint'];
$ptype = $_POST['ptype'];
$bhk = $_POST['bhk'];
$stype = $_POST['stype'];
$bedroom = $_POST['bedroom'];
$bathroom = $_POST['bathroom'];
$balcony = $_POST['balcony'];
$kitchen = $_POST['kitchen'];
$hall = $_POST['hall'];
$floors = $_POST['floors'];
$size = $_POST['size'];
$price = $_POST['price'];
$location = $_POST['location'];
$city = $_POST['city'];
$state = $_POST['state'];
$features = $_POST['features'];
$status = $_POST['status'];
$currentDateTime = date('Y-m-d H:i:s');

// Prepare an update query
$query = "UPDATE property SET
          title = '$title', 
          pcontent = '$pcontaint', 
          type = '$ptype', 
          bhk = '$bhk', 
          stype = '$stype', 
          bedroom = '$bedroom', 
          bathroom = '$bathroom', 
          balcony = '$balcony', 
          kitchen = '$kitchen', 
          hall = '$hall', 
          floor = '$floors', 
          size = '$size', 
          price = '$price', 
          location = '$location', 
          city = '$city', 
          state = '$state', 
          feature = '$features', 
          status = '$status',
          date = '$currentDateTime' 
          WHERE pid = '$pid'";

// Prepare the statement
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    echo "<h1>Property updated successfully</h1>";
} else {
    echo "Error: " . mysqli_error($con);
}
?>
