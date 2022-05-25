<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $file = $_FILES['fileToUpload'];
    $directory = "uploads/";
    $fileName = $directory . $file["name"];
    $fileType = $file["type"];
    $fileSize = $file["size"];

    if (file_exists($fileName)) {
        echo "<h2>File already esists!</h2>";
    } else if ($fileType != "image/jpeg" && $fileType != "image/jpg" && $fileType != "image/png" && $fileType != "image/gif") {
        echo "<h2>Only images are allowed!</h2>";
    } else if ($fileSize > 512000) {
        echo "<h2>File is too large!</h2>";
    } else {
        move_uploaded_file($file["tmp_name"], $fileName);
        echo "<h2>File uploaded successfully</h2>";
        echo "<h2><br>Filepath: " . $fileName . "</h2>";
    }
    ?>
</body>

</html>