<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //* something was posted

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric(($user_name))) {

        //* save to database

        // 20 maximum length of the number
        $user_id = random_num(20);
        $query = "INSERT INTO users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style/login.css">
</head>


<div id="box">
    <form method="POST">
        <div id="login">Signup</div><br>

        <input id="text" type="text" name="user_name" placeholder="Username"><br><br>
        <input id="text" type="password" name="password" placeholder="Password"><br><br>

        <input id="text" type="submit" value="Signup"><br><br>

        <a href="login.php">Click to Login</a>

    </form>

</div>

<body>

</body>

</html>