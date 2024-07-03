<?php
    // Connect to server/database
    $mysqli = mysqli_connect("localhost","root","","carcatalogue");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit(); 
    }

    // Retrieve values from form
    $car_id = $_POST['car_id'];  
    $manufacturer = $_POST['manufacturer'];
    $model = $_POST['model'];
    $engine = $_POST['engine'];
    $fuel_type = $_POST['fuel_type'];
    $car_year = $_POST['car_year'];

    // Build SQL statement
    $sql = "INSERT INTO CarCatalogue 
                (car_id, manufacturer, model, engine, fuel_type,
                car_year)
                VALUES
                ('$car_id', '$manufacturer', '$model', '$engine',
                '$fuel_type', '$car_year')";
                
    // Run SQL statement
    mysqli_query($mysqli, $sql);
?>
<head>
    <title>Car Catalogue</title>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Verdana, sans-serif;
            margin: 0;
        }
        .Menu {
            overflow: hidden;
            background-color: transparent;
        }

        .Menu {
            border: 1px solid #dddddd;
            font-size: 20px;
            text-align: center;
            padding: 10px 10px;
            margin-bottom: 15px;
        }

        .Menu a:link , a:visited{
            color: Black;
            background-color: transparent;
            text-decoration: none;
            border: 1px solid #dddddd;
            padding: 14px 16px;
        }

        .Menu a:hover {
            background-color: #bdbdbd;
            color: black;
            text-decoration: none;
            border: 1px solid #dddddd;
            padding: 14px 16px;
        }

        .Menu a.active {
            background-color: black;
            color: white;
            text-decoration: none;
            border: 1px solid #dddddd;
            padding: 14px 16px;
        }

        h1 {
            font-family: Verdana, sans-serif;
            font-size: 35px;
            text-align: center;
        }

        h3 {
            font-family: Verdana, sans-serif;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Success</h1>
<div class="Menu">
    <a href="Cars.php">All Cars</a>
    <a href="Insert.html">Insert Data</a>
</div>
<h3>~ Your data was successfully added. ~</h3>
<h3>~ Please return to one of the pages above. ~</h3>

</body>
</html>
