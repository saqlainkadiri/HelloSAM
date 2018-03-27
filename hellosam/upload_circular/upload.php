<?php
@session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$newfilename = "logo.jpg";//end($temp);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo("../uploaded_circulars/$newfilename",PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
}
if ( 0 < $_FILES['file']['error'] ) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    $uploadOk = 0;
}
if($uploadOk){
    if(file_exists("../uploaded_circulars/$newfilename")) unlink("../uploaded_circulars/$newfilename");
    move_uploaded_file($_FILES['file']['tmp_name'], '../uploaded_circulars/' . $newfilename);
}
else{
    if(file_exists("../uploaded_circulars/$newfilename")) unlink("../uploaded_circulars/$newfilename");
}
?>
