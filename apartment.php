<?php
include("config.php");								
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>
<body>
<?php include("include/header.php");?>
<section class="featured-and-recommended">
        <!--Heading-->
        <h1 class="fe-re-heading">APPARTMENT</h1>
        <!--Contaner Contain All Box-->
        <div class="fe-re-box">
        <?php $query=mysqli_query($con,"SELECT* FROM property WHERE type = 'apartment' ORDER BY date DESC LIMIT 4");
		while($row=mysqli_fetch_array($query))
			{ ?>
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
    <?php include("include/footer.php");?>
</body>
</html>