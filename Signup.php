<?php 
session_start();

include("Connection.php");
include("Functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        //save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

        mysqli_query($con, $query);

        header("Location: Cars.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Create an Account</title>
    <meta charset="utf-8">
    <style>
        * { margin:0px; padding:0px; }
        body { margin: 0 auto; text-align: center; }
        .Signup {
            font-family: Verdana, sans-serif;
            margin: 0 auto;
            margin-top: 40px;
            border: 2px solid #000000;
            width: 200px; padding: 15px;
        }
        .link {
            font-family: Verdana, sans-serif;
            color: Black;
            background-color: transparent;
            text-decoration: none;
            border: 1px solid #dddddd;
            padding: 14px 16px;
        }
        .visited {
            font-family: Verdana, sans-serif;
            color: Black;
            background-color: transparent;
            text-decoration: none;
            border: 1px solid #dddddd;
            padding: 14px 16px;
        }
        h2 {
            font-family: Verdana, sans-serif;
            margin: 10px;
            text-align: center;
        }
        input { padding: 10px; }
    </style>
</head>
<body>
    <div class="Signup">
        <form method="post">
            <h2> Sign up </h2>
            <input id="text" type="text" name="user_name"><br><br>
            <input id="password" type="password" name="password"><br><br>
            <input id="button" type="submit" value="Signup"><br><br>
            <a href="Cars.php">Click to Login</a><br><br>
            <a href="Login.php">Return to login</a><br><br>
        </form>
    </div>
</body>
</html>
