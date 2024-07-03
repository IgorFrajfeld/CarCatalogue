<?php 
session_start();
include("Connection.php");
include("Functions.php");

// Initialize variables
$car_id = '';
$manufacturer = '';
$model = '';
$engine = '';
$fuel_type = '';
$car_year = '';
$update_status = '';

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['find_car'])) {
    $car_id = $_POST['car_id'];

    // Fetch car details from the database
    $query = "SELECT * FROM CarCatalogue WHERE car_id = '$car_id' LIMIT 1";
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $car_data = mysqli_fetch_assoc($result);
        $manufacturer = $car_data['manufacturer'];
        $model = $car_data['model'];
        $engine = $car_data['engine'];
        $fuel_type = $car_data['fuel_type'];
        $car_year = $car_data['car_year'];
    } else {
        $update_status = "Car ID not found!";
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_car'])) {
    $car_id = $_POST['car_id'];
    $manufacturer = $_POST['manufacturer'];
    $model = $_POST['model'];
    $engine = $_POST['engine'];
    $fuel_type = $_POST['fuel_type'];
    $car_year = $_POST['car_year'];

    // Update car details in the database
    $query = "UPDATE CarCatalogue SET manufacturer = '$manufacturer', model = '$model', engine = '$engine', fuel_type = '$fuel_type', car_year = '$car_year' WHERE car_id = '$car_id'";
    if(mysqli_query($con, $query)) {
        $update_status = "Car details updated successfully!";
    } else {
        $update_status = "Failed to update car details!";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Edit Car Data</title>
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
        .status {
            margin-top: 10px;
            font-size: 14px;
            color: red;
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
        <li><a href="Insert.php">Insert Data</a></li>
        <li><a href="Edit.php" class="active">Edit Data</a></li>
        <li><a href="Logout.php" class="logout">Logout</a></li>
    </ul>
</nav>
<div class="container">
    <div class="form-container">
        <h2>Find Car to Edit</h2>
        <form method="post">
            <label for="car_id">Car ID:</label>
            <input type="text" id="car_id" name="car_id" value="<?php echo $car_id; ?>" autocomplete="on"><br/>
            <input type="submit" name="find_car" value="Find Car">
        </form>
        <h2>Edit Car Details</h2>
        <form method="post">
            <input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
            <label for="manufacturer">Manufacturer:</label>
            <input type="text" id="manufacturer" name="manufacturer" value="<?php echo $manufacturer; ?>" autocomplete="on"><br/>
            <label for="model">Model:</label>
            <input type="text" id="model" name="model" value="<?php echo $model; ?>" autocomplete="on"><br/>
            <label for="engine">Engine:</label>
            <input type="text" id="engine" name="engine" value="<?php echo $engine; ?>" autocomplete="on"><br/>
            <label for="fuel_type">Fuel Type:</label>
            <input type="text" id="fuel_type" name="fuel_type" value="<?php echo $fuel_type; ?>" autocomplete="on"><br/>
            <label for="car_year">Car Year:</label>
            <input type="text" id="car_year" name="car_year" value="<?php echo $car_year; ?>" autocomplete="on"><br/>
            <input type="submit" name="update_car" value="Update Car">
        </form>
        <div class="status"><?php echo $update_status; ?></div>
    </div>
</div>
<footer>
    <p>Car Specialist Showroom &copy; 2024</p>
</footer>
</body>
</html>
