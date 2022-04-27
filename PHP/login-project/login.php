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
        header("Location: http://localhost/login-project?msg=Something went wrong, try again!&status=fail");
        die();
    }

    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $query = "select * from users where email = '$email'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        header("Location: http://localhost/login-project?msg=Email or password wrong, try again!&status=fail");
        die();
    }

    $firstRow = mysqli_fetch_assoc($result);
    if (!$firstRow || strval($firstRow["password"]) != $pass) {
        header("Location: http://localhost/login-project?msg=Email or password wrong, try again!&status=fail");
        die();
    }

    echo "<h2>Welcome, " . $firstRow["name"] . "</h2>";
    echo "<a href='/login-project'>Logout</a>";
    ?>
</body>

</html>