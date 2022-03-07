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
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
        }

        fieldset{
            margin-top: 3em;
            padding: 1.2em 2em;
            width: max-content;
            border-radius: 8px;
            background-color: #f5f5f5;
            box-shadow: 8px 8px 0 0 #ccc;
        }

        legend{
            padding: 0.4em 0.8em;
            background-color: darkcyan;
            color: #fff;
            border-radius: 8px;
        }

        span{
            font-weight: 600;
        }

        li{
            margin-top: 0.5em;
            margin-bottom: 1.5em;
        }

        ul li {
            margin-bottom: 0.5em;
        }
    </style>
</head>
<body>
<?php

$fullname = $_POST['fullname'];
$guardian = $_POST['guardian'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$course = $_POST['course'];

echo "<fieldset>";
echo "<legend>Student Details</legend>";

echo "<ol>";
echo "<li>Your Name: <span>" . $fullname . "</span></li>";
echo "<li>Your Guardian's Name: <span>" . $guardian . "</span></li>";
echo "<li>Your Address: <span>" . $address . "</span></li>";
echo "<li>Your Gender: <span>" . $gender . "</span></li>";
echo "<li>Your Contact Number: <span>" . $contact . "</span></li>";
echo "<li>Courses applied:</li>";
echo "<ul>";
for ($i = 0; $i < count($course); $i++)  {
    echo "<li><span>" . $course[$i] ."</span></li>";
}
echo "</ul>";

echo"</ol>";
echo "</fieldset>";

?>
</body>
</html>