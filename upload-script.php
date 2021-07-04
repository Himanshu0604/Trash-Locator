<?php
include "db.php";

if (isset($_POST['uploadImageBtn'])) {
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($con,$name); 
    $longitude = stripslashes($_REQUEST['longitude']);
    $longitude = mysqli_real_escape_string($con,$longitude);
    $latitude = stripslashes($_REQUEST['latitude']);
    $latitude = mysqli_real_escape_string($con,$latitude);
    $complaint = stripslashes($_REQUEST['complaint']);
    $complaint = mysqli_real_escape_string($con,$complaint);
            $query = "INSERT into `location` (name, longitude, latitude, complaint)
VALUES ('$name', '$longitude', '$latitude', '$complaint' )";
        $result = mysqli_query($con,$query);
    $uploadFolder = 'uploads/';
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
        $imageName = $_FILES['imageFile']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        // save to database
        $query = "INSERT INTO images SET file_name='$imageName' " ;
        $run = $con->query($query) or die("Error in saving image".$con->error);
    }
    if ($result) {
        echo '<script>alert("Images uploaded successfully !")</script>';
        echo '<script>window.location.href="upload_images.php";</script>';
    }
}