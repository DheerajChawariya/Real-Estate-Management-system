<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate PHP">
    <meta name="keywords" content="">
    <meta name="author" content="Unicoder">
    <link rel="shortcut icon" href="images/favicon.ico">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/propdetail.css">
    
    <title>Real Estate PHP</title>
</head>

<body>

<div id="page-wrapper">
    <div class="row"> 
        <!-- Header start -->
        <?php include("include/header.php"); ?>
        <!-- Header end -->

        <div class="full-row">
            <div class="container">
                <div class="row">
                
                    <?php
                        $id = $_REQUEST['pid']; // Directly fetching from the request parameter
                        $query = mysqli_query($con, "SELECT * FROM property WHERE pid='$id'"); // No prevention against SQL injection
                        if (mysqli_num_rows($query) > 0) {
                            $row = mysqli_fetch_array($query);
                    ?>
                    
                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col-md-12">
                                <div id="single-property" style="text-align:center;"> 

                                    <!-- Loop through each image if it exists in the database -->
                                    <?php 
                                    $images = ['pimage', 'pimage1', 'pimage2', 'pimage3', 'pimage4'];
                                    foreach ($images as $image) {
                                        if (!empty($row[$image])) { 
                                            // Check if the image is base64 or file path
                                            if (strpos($row[$image], 'data:image/jpeg;base64') !== false) {
                                                // If it's base64 encoded
                                                echo "<div class='ls-slide' style='display:inline-block;'>";
                                                echo "<img width='250' height='250' src='" . $row[$image] . "' class='ls-bg' alt='Property Image' onerror='this.style.display=\"none\"' />";
                                                echo "</div>";
                                            } else {
                                                // If it's a file path, convert it to base64
                                                $imageData = base64_encode($row[$image]); // Ensure to read the file before base64 encoding
                                                echo "<div class='ls-slide' style='display:inline-block;'>";
                                                echo "<img width='250' height='250' src='data:image/jpeg;base64,{$imageData}' class='ls-bg' alt='Property Image' onerror='this.style.display=\"none\"' />";
                                                echo "</div>";
                                            }
                                        }
                                    }
                                    ?>
                                  
                                    <!-- Display map images if they exist -->
                                    <?php if (!empty($row['mapimage'])) { ?>
                                    <div class="ls-slide" style="display:inline-block;">
                                        <?php 
                                            // Convert map image to base64
                                            $mapImageData = base64_encode($row['mapimage']);
                                            echo "<img width='250' height='250' src='data:image/jpeg;base64,{$mapImageData}' class='ls-bg' alt='' onerror='this.style.display=\"none\"' />";
                                        ?>
                                    </div>
                                    <?php } ?>

                                    <?php if (!empty($row['topmapimage'])) { ?>
                                    <div class="ls-slide" style="display:inline-block;">
                                        <?php 
                                            // Convert top map image to base64
                                            $topMapImageData = base64_encode($row['topmapimage']);
                                            echo "<img width='250' height='250' src='data:image/jpeg;base64,{$topMapImageData}' class='ls-bg' alt='' onerror='this.style.display=\"none\"' />";
                                        ?>
                                    </div>
                                    <?php } ?>

                                    <?php if (!empty($row['groundmapimage'])) { ?>
                                    <div class="ls-slide" style="display:inline-block;">
                                        <?php 
                                            // Convert ground map image to base64
                                            $groundMapImageData = base64_encode($row['groundmapimage']);
                                            echo "<img src='data:image/jpeg;base64,{$groundMapImageData}' alt='Ground Map Image' width='250' height='250' class='ls-bg' onerror='this.style.display=\"none\"' />";
                                        ?>
                                    </div>
                                    <?php } ?>


                                </div>
                            </div>
                        </div>

                        <div class="row mb-4" style="text-align:center;">
                            <div class="col-md-6">
                                <div class="bg-success d-table px-3 py-2 rounded text-white text-capitalize">For <?php echo htmlspecialchars($row['stype']); ?></div>
                                <h5 class="mt-2 text-secondary text-capitalize"><?php echo htmlspecialchars($row['title']); ?></h5>
                                <span class="mb-sm-20 d-block text-capitalize"><i class="fas fa-map-marker-alt text-success font-12"></i> &nbsp;<?php echo htmlspecialchars($row['location']); ?></span>
                            </div>
                            <div class="col-md-6">
                                <div class="text-success text-left h5 my-2 text-md-right">₹<?php echo number_format($row['price']); ?></div>
                                <div class="text-left text-md-right">Price</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-success text-left h5 my-2 text-md-right"><?php echo htmlspecialchars($row['pid']); ?></div>
                                <div class="text-left text-md-right">Property Id</div>
                                <p style="color:red">Note: Property Id is required at the time of property inquiry from the company</p>
                            </div>
                        </div>

                        <div class="property-details">
                            <div class="bg-gray property-quantity px-4 pt-4 w-100">
                                <ul>
                                    <li><span class="text-secondary"><?php echo htmlspecialchars($row['size']); ?></span> Sqft</li>
                                    <li><span class="text-secondary"><?php echo htmlspecialchars($row['bedroom']); ?></span> Bedroom</li>
                                    <li><span class="text-secondary"><?php echo htmlspecialchars($row['bathroom']); ?></span> Bathroom</li>
                                    <li><span class="text-secondary"><?php echo htmlspecialchars($row['balcony']); ?></span> Balcony</li>
                                    <li><span class="text-secondary"><?php echo htmlspecialchars($row['hall']); ?></span> Hall</li>
                                    <li><span class="text-secondary"><?php echo htmlspecialchars($row['kitchen']); ?></span> Kitchen</li>
                                </ul>
                            </div>
                            <h4 class="text-secondary my-4">Description</h4>
                            <p><?php echo nl2br(htmlspecialchars($row['pcontent'])); ?></p>
                            

                            <h5 class="mt-5 mb-4 text-secondary">Property Summary</h5>
                            <div class="table-striped font-14 pb-2">
                                <table class="w-100">
                                    <tbody>
                                        <tr>
                                            <td>BHK :</td>
                                            <td class="text-capitalize"><?php echo htmlspecialchars($row['bhk']); ?></td>
                                            <td>Property Type :</td>
                                            <td class="text-capitalize"><?php echo htmlspecialchars($row['type']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Floor :</td>
                                            <td class="text-capitalize"><?php echo htmlspecialchars($row['floor']); ?></td>
                                            <td>Total Floor :</td>
                                            <td class="text-capitalize"><?php echo htmlspecialchars($row['totalfloor']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>City :</td>
                                            <td class="text-capitalize"><?php echo htmlspecialchars($row['city']); ?></td>
                                            <td>State :</td>
                                            <td class="text-capitalize"><?php echo htmlspecialchars($row['state']); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h5 class="mt-5 mb-4 text-secondary">Features</h5>
                            <div class="row" style="padding-left:20px;">
                                <?php echo nl2br(htmlspecialchars($row['feature'])); ?>
                            </div>
                        </div>
                    </div>

                    <?php 
                        } else {
                            echo "<p>No property details found.</p>";
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- Footer start -->
        <?php include("include/footer.php"); ?>
        <!-- Footer end -->
    </div>
</div>

</body>
</html>
