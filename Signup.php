<?php 
session_start();

include("Connection.php");
include("Functions.php");

$error_message = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        $user_id = random_num(20);
        $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

        mysqli_query($con, $query);

        header("Location: Cars.php");
        die;
    } else {
        $error_message = "Please enter some valid information!";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Create an Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            border-bottom: #77AADD 3px solid;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        header h1 {
            margin: 0;
            font-size: 40px;
            font-weight: bold;
            text-shadow: 2px 2px #777;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            flex: 1;
        }
        .form-container {
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 10px;
            text-align: center;
        }
        .form-container h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-container input[type="text"], .form-container input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        .form-container input[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #333;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            width: calc(100% - 22px);
        }
        .form-container input[type="submit"]:hover {
            background-color: #575757;
        }
        .form-container a {
            display: inline-block;
            margin-top: 15px;
            color: #333;
            text-decoration: none;
        }
        .form-container a:hover {
            color: #575757;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }
    </style>
</head>
<body>
<header>
    <h1>Car Specialist Showroom</h1>
</header>
<div class="container">
    <div class="form-container">
        <form method="post">
            <h2>Sign up</h2>
            <input id="text" type="text" name="user_name" placeholder="Username" autocomplete="username"><br>
            <input id="password" type="password" name="password" placeholder="Password" autocomplete="new-password"><br>
            <input id="button" type="submit" value="Signup"><br>
            <a href="Login.php">Return to login</a>
        </form>
        <?php if(!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </div>
</div>
<footer>
    <p>Car Specialist Showroom &copy; 2024</p>
</footer>
</body>
</html>
