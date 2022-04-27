<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600&display=swap');

        body {
            font-family: 'Noto Sans', sans-serif;
            padding: 2em 8em;
        }
    </style>
</head>

<body>
    <?php
    $db = "user_management";
    $conn = mysqli_connect("localhost", "root", "", $db);
    if (!$conn) {
        header("Location: http://localhost/login-project/register.html?msg=Something went wrong, try again!&status=fail");
        die();
    }

    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    if ($pass1 != $pass2) {
        header("Location: http://localhost/login-project/register.html?msg=Passwords don't match, try again!&status=fail");
        die();
    }

    $query = "select * from users where email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_fetch_assoc($result)) {
        header("Location: http://localhost/login-project/register.html?msg=Email is already in use, please login if you already have an account <a href='/login-project'>here</a>&status=fail");
        die();
    }

    $query = "insert into users values('$email', '$pass1', '$name')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        header("Location: http://localhost/login-project/register.html?msg=Something went wrong!, try again&status=fail");
        die();
    } else {
        header("Location: http://localhost/login-project?msg=Registration successfull, please login now!&status=success");
        die();
    }
    ?>
</body>

</html>