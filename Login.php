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

        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password)
                {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: Cars.php");
                    die;
                }
            }
        }
        
        echo "wrong username or password!";
    }else
    {
        echo "wrong username or password!";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Login</title>
    <style>
        * { margin:0px; padding:0px;}

        body { margin: 0 auto; text-align: center;}

        .Login {
            font-family: Verdana, sans-serif;
            margin:0 auto;
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

        .visited{
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

        input{ padding:10px; }

    </style>
</head>

<body>

<div class="Login">
    
    <form method="post">
    <h2> Login </h2>
        <input id="text" type="text" name="user_name" autocomplete="username"><br><br>
        <input id="password" type="password" name="password" autocomplete="current-password"><br><br>

        <input id="button" type="submit" value="Login"><br><br>

        <a href="Signup.php">Create an account</a><br><br>

    </form>
</div>
</body>
</html>
