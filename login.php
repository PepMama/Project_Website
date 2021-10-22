<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //* something was posted

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric(($user_name))) {

        //* read from database
        $query = "SELECT * FROM users WHERE user_name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result and mysqli_num_rows($result) > 0) { //* at least one result

                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] ==  $password) {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "wrong username or password!";
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
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css">
</head>


<div id="box">
    <form method="POST">
        <div id="login">Login</div><br>

        <input id="text" type="text" name="user_name" placeholder="Username"><br><br>
        <input id="text" type="password" name="password" placeholder="Password"><br><br>

        <input id="text" type="submit" value="Login"><br><br>


        <a href="signup.php">Click to Signup</a>

    </form>

</div>

<body>

</body>

</html>