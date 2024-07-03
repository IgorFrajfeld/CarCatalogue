<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Car Specialist Showroom</title>
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
        .Menu {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 10px 0;
            margin: 0;
            background-color: #444;
        }
        .Menu a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
        }
        .Menu a:hover {
            background-color: #575757;
            color: #fff;
        }
        .Menu a.active {
            background-color: #000;
            color: #fff;
        }
		.logout {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .form-container {
            max-width: 600px;
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
        .form-container label {
            width: 100%;
            text-align: center;
            margin-bottom: 5px;
        }
        .form-container input[type="text"], .form-container input[type="number"] {
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
<nav>
    <ul class="Menu">
        <li><a href="Cars.php">All Cars</a></li>
        <li><a href="Insert.php" class="active">Insert Data</a></li>
		<li><a href="Edit.php">Edit Data</a></li>
        <li><a href="Logout.php" class="logout">Logout</a></li>
    </ul>
</nav>
<div class="container">
    <div class="form-container">
        <h2>Please Add the Car Details Below</h2>
        <form action="Add.php" method="post">
            <label for="car_id">Car ID:</label>
            <input type="text" id="car_id" name="car_id" autocomplete="on"><br/>
            <label for="manufacturer">Manufacturer:</label>
            <input type="text" id="manufacturer" name="manufacturer" autocomplete="on"><br/>
            <label for="model">Model:</label>
            <input type="text" id="model" name="model" autocomplete="on"><br/>
            <label for="engine">Engine:</label>
            <input type="text" id="engine" name="engine" autocomplete="on"><br/>
            <label for="fuel_type">Fuel Type:</label>
            <input type="text" id="fuel_type" name="fuel_type" autocomplete="on"><br/>
            <label for="car_year">Car Year:</label>
            <input type="text" id="car_year" name="car_year" autocomplete="on"><br/>
            <input type="submit" value="Add">
        </form>
    </div>
</div>
<footer>
    <p>Car Specialist Showroom &copy; 2024</p>
</footer>
</body>
</html>
