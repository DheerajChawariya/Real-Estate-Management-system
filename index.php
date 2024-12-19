<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");								 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Properties</title>
</head>
<body>
    <?php include("include/header.php");?>

    <!-- Search Section -->
    <section class="search-form">
        <div class="property-search">
            <h1 class="mb-4"><span class="text-success">SEARCH PROPERTY</span><br>
            <div class="form-group">
                <a href="search.php" class="btn btn-success w-100">Search Property</a>
            </div>
        </div>
    </section>

    <!-- New Added Properties Section -->
    <section class="featured-and-recommended">
        <h1 class="fe-re-heading">NEW ADDED</h1>
        <a class="fe-re-a-tag" href="property.php">View All</a>
        <div class="fe-re-box">
        <?php 
        $query = mysqli_query($con, "SELECT * FROM property ORDER BY date DESC LIMIT 4");
        while($row = mysqli_fetch_array($query)) { ?>
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

    <!-- House Properties Section -->
    <section class="featured-and-recommended">
        <h1 class="fe-re-heading">HOUSE</h1>
        <a class="fe-re-a-tag" href="house.php">View All</a>
        <div class="fe-re-box">
        <?php 
        $query = mysqli_query($con, "SELECT * FROM property WHERE type = 'house' ORDER BY date DESC LIMIT 4");
        while($row = mysqli_fetch_array($query)) { ?>
            <div class="fe-re-bo-container">
            <?php
                // Assuming 'pimage' contains the binary image data for the property image
                if ($row['pimage']) {
                    $imageData = base64_encode($row['pimage']); 
                    echo "<img src='data:image/jpeg;base64,{$imageData}' alt='Property Image' />";
                } else {
                    echo "<img src='admin/property/{$row['image_filename']}' alt='Property Image' />"; // Fallback to file-based image
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

    <!-- Apartment Properties Section -->
    <section class="featured-and-recommended">
        <h1 class="fe-re-heading">APARTMENT</h1>
        <a class="fe-re-a-tag" href="apartment.php">View All</a>
        <div class="fe-re-box">
        <?php 
        $query = mysqli_query($con, "SELECT * FROM property WHERE type = 'apartment' ORDER BY date DESC LIMIT 4");
        while($row = mysqli_fetch_array($query)) { ?>
            <div class="fe-re-bo-container">
            <?php
                // Assuming 'pimage' contains the binary image data for the property image
                if ($row['pimage']) {
                    $imageData = base64_encode($row['pimage']); 
                    echo "<img src='data:image/jpeg;base64,{$imageData}' alt='Property Image' />";
                } else {
                    echo "<img src='admin/property/{$row['image_filename']}' alt='Property Image' />"; // Fallback to file-based image
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

    <?php include("include/footer.php"); ?>
</body>
</html>
