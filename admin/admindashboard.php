<?php 
include "config.php"; 
$a = 1;
// Make sure the database connection file is correct
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<a href="add.php" class="btn btn-primary m-5">Add Property</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Type</th>
      <th scope="col">BHK</th>
      <th scope="col">Bedroom</th>
      <th scope="col">Hall</th>
      <th scope="col">Price</th>
      <th scope="col">Location</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    // Ensure the query is correct and fetch the data
    $query = "SELECT * FROM property";
    $result = mysqli_query($con, $query);

    if ($result) {
      // Loop through the result and display data
      while ($row = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $a; $a++; ?></td>
        <td>
    <?php
    // Assuming 'pimage' contains the binary image data for the property image
    $imageData = base64_encode($row['pimage']); // Adjust 'pimage' to the actual column name
    echo "<img src='data:image/jpeg;base64,{$imageData}' alt='Property Image' width='250px' height='250px' />";
    ?>
        </td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row['bhk']; ?></td>
        <td><?php echo $row['bedroom']; ?></td>
        <td><?php echo $row['hall']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['location']; ?></td>
        <td>
            <!-- Update and Delete buttons -->
            <a href="update.php?pid=<?php echo $row['pid']; ?>" class="btn btn-primary">Update</a>
            <a href="delete.php?pid=<?php echo $row['pid']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this property?')">Delete</a>
        </td>
      </tr>
    <?php 
      }
    } else {
      echo "<tr><td colspan='8'>No properties found</td></tr>";
    }
    ?>
  </tbody>
</table>
</body>
</html>
