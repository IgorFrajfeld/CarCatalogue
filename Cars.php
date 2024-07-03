<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Car Catalogue</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .Menu a:link, a:visited {
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
        @media screen and (max-width: 600px) {
            .Menu, .Menu a {
                font-size: 18px;
                padding: 10px;
            }
            h1 {
                font-size: 28px;
            }
        }
        #map {
            height: 400px;
            width: calc(100% - 40px);
            margin: 20px;
        }
        .SearchBar {
            text-align: center;
            width: 100%;
            margin-bottom: 5px;
        }
        .search-container {
            margin-bottom: 20px; /* Added margin between search bar and table */
        }
        h6 {
            font-family: Verdana, sans-serif;
            font-size: 12px;
            color: #b51010;
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body>
<h1>Car Catalogue</h1>
<div class="Menu">
    <a href="Cars.php" class="active">All Cars</a>
    <a href="Insert.html">Insert Data</a>
</div>
<h3>~ All cars listed below are available to be PURCHASED or FINANCED ~</h3>
<h3>~ All cars below have been run through a 255 POINT CHECK to ensure the vehicle has no faults ~</h3>
<h3>~ Warranty up to 6 MONTHS is given on all listed vehicles ~</h3>

<!-- Leaflet Map -->
<div id="map"></div>

<!-- Original Content -->
<div class="SearchBar search-container">    
    <form action="Cars.php" method="post">
        <input type="text" placeholder="Find your car..." name="searchName">
        <input type="submit" value="Search">
    </form>
</div>

<?php
// Connect to server/database
$mysqli = mysqli_connect("localhost","root","","carcatalogue");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit(); 
}

// Check if the searchName POST variable is set
$searchName = isset($_POST['searchName']) ? $_POST['searchName'] : '';

$sql = "SELECT * FROM CarCatalogue WHERE car_id LIKE '%$searchName%'
    OR manufacturer LIKE '%$searchName%'
    OR model LIKE '%$searchName%'
    OR engine LIKE '%$searchName%'
    OR fuel_type LIKE '%$searchName%'
    OR car_year LIKE '%$searchName%'";

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

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var map = L.map('map').setView([52.6766, -2.4493], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        var marker = L.marker([52.6766, -2.4493]).addTo(map);
    });
</script>
</body>
</html>
