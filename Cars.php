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
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 90%;
            margin: 0 auto;
            overflow: hidden;
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
        h3 {
            font-family: Verdana, sans-serif;
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
            color: #777;
        }
        #map {
            height: 400px;
            width: 100%;
            margin: 20px 0;
        }
        .SearchBar {
            text-align: center;
            margin-bottom: 20px;
        }
        .SearchBar input[type="text"] {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 5px;
        }
        .SearchBar input[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #333;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        h6 {
            font-family: Verdana, sans-serif;
            font-size: 12px;
            color: #b51010;
            text-align: center;
            margin-top: 20px;
        }
        table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 10px;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: 30px;
        }
        .location-info {
            text-align: center;
            margin: 20px 0;
        }
        .map-description {
            text-align: center;
            margin: 20px 0;
            font-size: 16px;
            color: #555;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body>
<header>
    <h1>Car Specialist Showroom</h1>
</header>
<nav>
    <ul class="Menu">
        <li><a href="Cars.php" class="active">All Cars</a></li>
        <li><a href="Insert.php">Insert Data</a></li>
        <li><a href="Edit.php">Edit Data</a></li>
        <li><a href="Logout.php" class="logout">Logout</a></li>
    </ul>
</nav>
<div class="container">
    <h3>Enjoy unparalleled peace of mind with our comprehensive warranty coverage of up to 6 months on all vehicles, guaranteeing a worry-free driving experience.</h3>
    <h3>Every vehicle in our inventory has passed a meticulous 255-point inspection, ensuring the highest standards of quality, safety, and performance.</h3>
    <h3>Enjoy unparalleled peace of mind with our comprehensive warranty coverage of up to 6 months on all vehicles, guaranteeing a worry-free driving experience.</h3>

    <!-- Leaflet Map -->
    <div id="map"></div>
    <div class="location-info">
        <h2>Our Location</h2>
        <p>Car Specialist Showroom</p>
        <p>Malinsgate, Telford, TF1 1ZZ</p>
    </div>
    <div class="map-description">
        <p>We are proud to present a diverse selection of high-quality cars available for sale and finance. Visit us at our convenient location to explore our range of meticulously inspected vehicles. Our expert team is here to assist you with any questions and provide a seamless car buying experience.</p>
    </div>

    <!-- Original Content -->
    <div class="SearchBar search-container">    
        <form action="Cars.php" method="post">
            <input type="text" placeholder="Find your car..." name="searchName" autocomplete="on">
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
</div>

<footer>
    <p>Car Specialist Showroom &copy; 2024</p>
</footer>

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
