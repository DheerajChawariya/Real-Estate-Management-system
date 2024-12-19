<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
error_reporting(0);


// Check if the form is submitted
if(isset($_POST['search'])) {
    // Retrieve the property id from the form
    $propertyId = $_POST['property_id'];

    // Perform your logic to view, edit, or delete the property with the given id
    // You may want to query your database or perform other operations here

    // Example query to retrieve property details
    //$sql = "SELECT * FROM property WHERE city = '$propertyId'";
    //$result = mysqli_query($con, $sql);

    //if($result) {
        // Fetch the property details
    //    $property = mysqli_fetch_assoc($result);
    //} else {
    //    echo "Error: " . mysqli_error($con);
    //}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Document</title>
</head>
<body style="text-align:center; padding-top:50px">
<?php include("include/header.php");?>
    <form style="margin-top:20px;" method="post" enctype="multipart/form-data">
        <h3>Search Property</h3>
        <div class="form-group">
			<label class="col-lg-2 col-form-label">Search: </label>
			<input type="text" class="form-control" name="property_id" required placeholder="Enter City or BHK or Residential Property Type or Bedroom ">
            <input type="submit" value="Submit Property" class="btn btn-info"name="search" style="margin-left:200px;">
		</div>
    </form>

    <section class="featured-and-recommended">
        <!--Heading-->
        <h1 class="fe-re-heading">SEARH PROPERTY</h1>
        <!--Contaner Contain All Box-->
        <div class="fe-re-box">
        <?php
            // Display property details if available

        $query=mysqli_query($con,"SELECT * FROM property WHERE city = '$propertyId' or type = '$propertyId' or bhk = '$propertyId' or bedroom = '$propertyId'");
		while($row=mysqli_fetch_array($query))
			{ ?>
            <div class="fe-re-bo-container">
            <?php
                // Assuming 'pimage' contains the binary image data for the property image
                if ($row['pimage']) {
                    $imageData = base64_encode($row['pimage']); 
                    echo "<img src='data:image/jpeg;base64,{$imageData}' alt='Property Image' />";
                } else {
                    echo "<img src='admin/property/{$row['pimage']}' alt='Property Image' />"; // Fallback to file-based image
                }
                ?>
                <div class="fe-re-bo-co-description">
                <span style="text-transform: uppercase; padding:15px"><?php echo $row['3']; ?></span><br>
                    <span>₹<?php echo number_format($row['price'], 0, ',', ','); ?></span><br>
                    <span style="text-transform: uppercase; padding:15px"><?php echo $row['location']; ?></span><br>
                    <span style="text-transform: uppercase; padding:15px"><?php echo $row['size']; ?></span><br>
                    <span style="text-transform: uppercase; padding:15px"><?php echo $row['bedroom']; ?></span>
                    <a href="propertydetails.php?pid=<?php echo $row['pid']; ?>">View Property</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
</body>
</html>