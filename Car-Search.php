<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Car Catalogue</title>
    <style>

        .SearchBar {
            text-align: center;
            width: 100%;
            margin-bottom: 5px;
        }

        .Menu {
            overflow: hidden;
            background-color: transparent;
            font-family: Verdana, sans-serif;
            margin: 0;
        }

        .Menu {
            border: 1px solid #dddddd;
            font-size: 20px;
            text-align: center;
            width: 100%;
            padding: 12px 10px;
            margin-bottom: 15px;
        }

        .Menu a:link , a:visited {
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
        h6 {
            font-family: Verdana, sans-serif;
            font-size: 12px;
            color:#b51010;
            text-align: center;
        }
        table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<h1>Car Showcase</h1>
<div class="Menu">
    <a href="Cars.php">All Cars</a>
    <a href="Insert.html">Insert Data</a>
</div>
<h3>~ All cars listed below are available to be PURCHASED or FINANCED ~</h3>
<h3>~ All cars below have been run through a 255 POINT CHECK to ensure the vehicle has no faults ~</h3>
<h3>~ Warranty up to 6 MONTHS is given on all listed vehicles ~</h3>
<div class="SearchBar">    
    <form action="Car-Search.php" method="post">
        <input type="text" placeholder="Find your car..." name="searchName">
        <input type="submit" value="Search">
    </form>
</div>

<?php

// Connect to server/database
$mysqli = mysqli_connect("localhost","root","","carcatalogue");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit(); 
}

$sql = "SELECT * FROM CarCatalogue WHERE car_id LIKE '%".$_POST['searchName']."%'
    OR manufacturer LIKE '%".$_POST['searchName']."%'
    OR model LIKE '%".$_POST['searchName']."%'
    OR engine LIKE '%".$_POST['searchName']."%'
    OR fuel_type LIKE '%".$_POST['searchName']."%'
    OR car_year LIKE '%".$_POST['searchName']."%'";

$result = mysqli_query($mysqli, $sql);
if(mysqli_num_rows($result)>0){
    echo "<table><tr><th>ID</th><th>Manufacturer</th><th>Model</th><th>Engine</th><th>Fuel Type</th><th>Year</th></tr>";
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<tr><td>"
        . $row['car_id'] . "</td><td>"
        . $row['manufacturer'] . "</td><td>"
        . $row['model'] . "</td><td>"
        . $row['engine'] . "</td><td>"
        . $row['fuel_type'] . "</td><td>"
        . $row['car_year'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h6 class='text-danger'>No Data Found</h6>";
}
?>
</body>
</html>
