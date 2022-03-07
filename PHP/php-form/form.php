<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <style>
        *{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        body{
            margin: 3em 6em;

        }

        p{
            margin: 0 0 1em 0;
        }
    </style>
</head>
<body>
<?php
$fullname = $_POST['fullname'];
$age = $_POST['age'];
$dob = $_POST['date'];
$dept = $_POST['dept'];
$pass_year = $_POST['pass_year'];

echo "<p>Your name is " . $fullname . ".</p><br>";
echo "<p>Your age is " . $age . ".</p><br>";
if(isset($_POST['adult'])){
    echo "<p>You are an adult.</p><br>";
} else {
    echo "<p>You are not an adult.</p><br>";
}
echo "<p>Your date of birth is " . date_format(date_create($dob),"d/m/Y") . ".</p><br>";
echo "<p>Your department is " . $dept . ".</p><br>";
echo "<p>Your passing year is " . $pass_year . ".</p><br>"
?>
</body>
</html>