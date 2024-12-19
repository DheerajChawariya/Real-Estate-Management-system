<?php
include "config.php";
$pid = $_GET['pid'];

// Fetch property data from database
$query = "SELECT * FROM property WHERE pid = $pid";
$result = mysqli_query($con, $query);

// If the result is found, fetch the row
if (mysqli_num_rows($result) > 0) {
    $property = mysqli_fetch_assoc($result);
} else {
    echo "No property found with the given ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Property Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 900px;
            margin-top: 50px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            font-size: 28px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 30px;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-control {
            border-radius: 8px;
        }

        .custom-file-label {
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.25);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
        }

        .form-text {
            color: #6c757d;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Update Data</h2>
        <form action="updateOperation.php" method="POST">
            
        <div class="form-group">
                <label for="type" class="form-label">Pid</label>
                <input type="number" class="form-control" id="pid" name="pid" value="<?php echo $property['pid']; ?>" readonly>
            </div>

        <div class="form-group">
                <label for="type" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $property['title']; ?>" required>
            </div>

            <div class="form-group">
                <label for="type" class="form-label">Property Containt</label>
                <input type="text" class="form-control" id="pcontaint" name="pcontaint" value="<?php echo $property['pcontent']; ?>" required>
            </div>

            <div class="form-group">
                <label for="type" class="form-label">Property Type</label>
                <input type="text" class="form-control" id="ptype" name="ptype" value="<?php echo $property['type']; ?>" required>
            </div>

            <div class="form-group">
                <label for="bhk" class="form-label">BHK</label>
                <input type="number" class="form-control" id="bhk" name="bhk" value="<?php echo $property['bhk']; ?>" required>
            </div>

            <div class="form-group">
                <label for="stype" class="form-label">SType</label>
                <input type="text" class="form-control" id="stype" name="stype" value="<?php echo $property['stype']; ?>" required>
            </div>

            <div class="form-group">
                <label for="bedroom" class="form-label">Number of Bedrooms</label>
                <input type="number" class="form-control" id="bedroom" name="bedroom" value="<?php echo $property['bedroom']; ?>" required>
            </div>

            <div class="form-group">
                <label for="bathrooms" class="form-label">Number of Bathrooms</label>
                <input type="number" class="form-control" id="bathrooms" name="bathroom" value="<?php echo $property['bathroom']; ?>" required>
            </div>

            <div class="form-group">
                <label for="balcony" class="form-label">Number of Balcony</label>
                <input type="number" class="form-control" id="balcony" name="balcony" value="<?php echo $property['balcony']; ?>" required>
            </div>

            <div class="form-group">
                <label for="kitchen" class="form-label">Number of Kitchen</label>
                <input type="number" class="form-control" id="kitchen" name="kitchen" value="<?php echo $property['kitchen']; ?>" required>
            </div>

            <div class="form-group">
                <label for="hall" class="form-label">Number of Halls</label>
                <input type="number" class="form-control" id="hall" name="hall" value="<?php echo $property['hall']; ?>" required>
            </div>

            <div class="form-group">
                <label for="floors" class="form-label">Number of Floors</label>
                <input type="number" class="form-control" id="floors" name="floors" value="<?php echo $property['floor']; ?>" required>
            </div>

            <div class="form-group">
                <label for="size" class="form-label">Size</label>
                <input type="number" class="form-control" id="size" name="size" value="<?php echo $property['size']; ?>" required>
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Price (in INR)</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $property['price']; ?>" required>
            </div>

            <div class="form-group">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo $property['location']; ?>" required>
            </div>

            <div class="form-group">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo $property['city']; ?>" required>
            </div>

            <div class="form-group">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" value="<?php echo $property['state']; ?>" required>
            </div>

            <div class="form-group">
                <label for="features" class="form-label">Features</label>
                <input type="text" class="form-control" id="features" name="features" value="<?php echo $property['feature']; ?>" required>
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="available" <?php echo ($property['status'] == 'available') ? 'selected' : ''; ?>>Available</option>
                    <option value="not_available" <?php echo ($property['status'] == 'not_available') ? 'selected' : ''; ?>>Not Available</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit Property</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
