<?php
// Include the database configuration
include "config.php";

// Retrieve form data
$title = $_POST['title'];
$pcontaint = $_POST['pcontaint'];
$ptype = $_POST['ptype'];
$bhk = $_POST['bhk'];
$stype = $_POST['stype'];
$bedroom = $_POST['bedroom'];
$bathrooms = $_POST['bathrooms'];
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
$isfree = $_POST['isfree'];
$totalfloors = $_POST['tfloors'];

// Function to handle file uploads and convert to base64
function convertToBase64($file) {
    if (isset($file['tmp_name']) && !empty($file['tmp_name'])) {
        $imageData = file_get_contents($file['tmp_name']);
        return base64_encode($imageData);
    }
    return null;
}

// Handling file uploads and converting to base64
$image1 = convertToBase64($_FILES['image1']);
$image2 = convertToBase64($_FILES['image2']);
$image3 = convertToBase64($_FILES['image3']);
$image4 = convertToBase64($_FILES['image4']);
$image5 = convertToBase64($_FILES['image5']);
$map = convertToBase64($_FILES['map']);
$topimage = convertToBase64($_FILES['topimage']);
$groundimage = convertToBase64($_FILES['groundimage']);

// Get current date and time
$currentDateTime = date('Y-m-d H:i:s');

// SQL query to insert data into the database
$query = "INSERT INTO property 
            (title, pcontent, type, bhk, stype, bedroom, bathroom, balcony, kitchen, hall, floor, size, price, location, city, state, feature, status, isFeatured, pimage, pimage1, pimage2, pimage3, pimage4, mapimage, topmapimage, groundmapimage, totalfloor, date)
          VALUES 
            ('$title', '$pcontaint', '$ptype', $bhk, '$stype', $bedroom, $bathrooms, $balcony, $kitchen, $hall, $floors, $size, $price, '$location', '$city', '$state', '$features', '$status', '$isfree', '$image1', '$image2', '$image3', '$image4', '$image5', '$map', '$topimage', '$groundimage', $totalfloors, '$currentDateTime')";

// Execute the query
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
   header("location: admindashboard.php");
} else {
    echo "Error: " . mysqli_error($con);
}
?>
