<?php

require_once "vendor/autoload.php";

use Colorization\ColorizationModel;

// Load the colorization model.
$model = new ColorizationModel();

// Get the uploaded file.
$file = $_FILES["photo"];

// Check if the file was uploaded successfully.
if ($file["error"] !== UPLOAD_ERR_OK) {
  die("Error uploading file: " . $file["error"]);
}

// Create a new image from the uploaded file.
$image = imagecreatefromstring(file_get_contents($file["tmp_name"]));

// Colorize the image.
$coloredImage = $model->colorize($image);

// Save the colored image to a file.
imagepng($coloredImage, "colored-image.png");

// Display the colored image on the page.
echo "<img src='colored-image.png'>";

?>
