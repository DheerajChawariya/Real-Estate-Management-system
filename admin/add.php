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
        <h2>Add Property Details</h2>
        <form action="insertOperation.php" method="POST" enctype="multipart/form-data" onsubmit="return validateFiles()">
            <div class="form-group">
                <label for="type" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="type" class="form-label">Property Containt</label>
                <input type="text" class="form-control" id="pcontaint" name="pcontaint" required>
            </div>

            <div class="form-group">
                <label for="type" class="form-label">Property Type</label>
                <input type="text" class="form-control" id="ptype" name="ptype" required>
            </div>

            <div class="form-group">
                <label for="bhk" class="form-label">BHK</label>
                <input type="number" class="form-control" id="bhk" name="bhk" required>
            </div>

            <div class="form-group">
                <label for="type" class="form-label">SType</label>
                <input type="text" class="form-control" id="stype" name="stype" required>
            </div>

            <div class="form-group">
                <label for="bedroom" class="form-label">Number of Bedrooms</label>
                <input type="number" class="form-control" id="bedroom" name="bedroom" required>
            </div>

            <div class="form-group">
                <label for="bedroom" class="form-label">Number of Bathrooms</label>
                <input type="number" class="form-control" id="bathrooms" name="bathrooms" required>
            </div>

            <div class="form-group">
                <label for="bedroom" class="form-label">Number of Balcony</label>
                <input type="number" class="form-control" id="balcony" name="balcony" required>
            </div>

            <div class="form-group">
                <label for="bedroom" class="form-label">Number of Kitchen</label>
                <input type="number" class="form-control" id="kitchen" name="kitchen" required>
            </div>

            <div class="form-group">
                <label for="hall" class="form-label">Number of Halls</label>
                <input type="number" class="form-control" id="hall" name="hall" required>
            </div>

            <div class="form-group">
                <label for="hall" class="form-label">Number of Floors</label>
                <input type="number" class="form-control" id="floors" name="floors" required>
            </div>

            <div class="form-group">
                <label for="hall" class="form-label">Size</label>
                <input type="number" class="form-control" id="size" name="size" required>
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Price (in INR)</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <div class="form-group">
                <label for="location" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>

            <div class="form-group">
                <label for="location" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>

            <div class="form-group">
                <label for="location" class="form-label">Features</label>
                <input type="text" class="form-control" id="features" name="features" required>
            </div>

            <div class="form-group">
                <label for="image1" class="form-label">Property Image 1</label>
                <input type="file" class="form-control" id="image1" name="image1" accept="image/*" required>
                <div class="form-text">Accepted file formats: JPG, PNG, JPEG. Max file size: 5MB.</div>
            </div>

            <div class="form-group">
                <label for="image2" class="form-label">Property Image 2</label>
                <input type="file" class="form-control" id="image2" name="image2" accept="image/*" required>
                <div class="form-text">Accepted file formats: JPG, PNG, JPEG. Max file size: 5MB.</div>
            </div>

            <div class="form-group">
                <label for="image3" class="form-label">Property Image 3</label>
                <input type="file" class="form-control" id="image3" name="image3" accept="image/*" required>
                <div class="form-text">Accepted file formats: JPG, PNG, JPEG. Max file size: 5MB.</div>
            </div>

            <div class="form-group">
                <label for="image4" class="form-label">Property Image 4</label>
                <input type="file" class="form-control" id="image4" name="image4" accept="image/*" required>
                <div class="form-text">Accepted file formats: JPG, PNG, JPEG. Max file size: 5MB.</div>
            </div>

            <div class="form-group">
                <label for="image5" class="form-label">Property Image 5</label>
                <input type="file" class="form-control" id="image5" name="image5" accept="image/*" required>
                <div class="form-text">Accepted file formats: JPG, PNG, JPEG. Max file size: 5MB.</div>
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                <option value="available">Available</option>
                <option value="not_available">Not Available</option>
                </select>
            </div>

            <div class="form-group">
                <label for="map" class="form-label">BluePrint/Map</label>
                <input type="file" class="form-control" id="map" name="map" accept="image/*" required>
                <div class="form-text">Accepted file formats: JPG, PNG, JPEG. Max file size: 5MB.</div>
            </div>

            <div class="form-group">
                <label for="topimage" class="form-label">Top Image</label>
                <input type="file" class="form-control" id="topimage" name="topimage" accept="image/*" required>
                <div class="form-text">Accepted file formats: JPG, PNG, JPEG. Max file size: 5MB.</div>
            </div>

            <div class="form-group">
                <label for="groundimage" class="form-label">Ground Image</label>
                <input type="file" class="form-control" id="groundimage" name="groundimage" accept="image/*" required>
                <div class="form-text">Accepted file formats: JPG, PNG, JPEG. Max file size: 5MB.</div>
            </div>

            <div class="form-group">
                <label for="hall" class="form-label">Total of Floors</label>
                <input type="number" class="form-control" id="tfloors" name="tfloors" required>
            </div>

            <div class="form-group">
                <label for="featured" class="form-label">isFreatured</label>
                <input type="number" class="form-control" id="isfree" name="isfree" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit Property</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    function validateFiles() {
        const allowedExtensions = ['jpg', 'jpeg', 'png'];
        const maxSize = 5 * 1024 * 1024; // 5MB in bytes

        const fileInputs = document.querySelectorAll('input[type="file"]');
        for (let i = 0; i < fileInputs.length; i++) {
            const file = fileInputs[i].files[0];
            if (file) {
                const fileExtension = file.name.split('.').pop().toLowerCase();
                if (!allowedExtensions.includes(fileExtension)) {
                    alert('Please upload an image file (JPG, JPEG, or PNG) for ' + fileInputs[i].id);
                    return false;
                }
                if (file.size > maxSize) {
                    alert('The file size for ' + fileInputs[i].id + ' exceeds the 5MB limit.');
                    return false;
                }
            }
        }
        return true;
    }
</script>
</body>
</html>
