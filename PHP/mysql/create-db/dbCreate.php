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

$host = "localhost";
$uname = "root";
$pass = "";

$con = mysqli_connect($host, $uname, $pass);
if($con) {echo "MySQL Connected";}
else {echo "MySQL Connection failed";}

$dbname = $_GET['db'];
$sql1 = "CREATE DATABASE $dbname";
$result = mysqli_query($con, $sql1);
if($result){
    echo "$dbname created";
} else {
    echo "$dbname cannot be created";
}

?>
</body>
</html>