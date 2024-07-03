<?php
	// Connect to server/database
 	$mysqli = mysqli_connect("localhost","root","","carcatalogue");
 	if ($mysqli->connect_errno) {
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
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Car Catalogue</title>
	<meta charset="utf-8">
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
			text-align: center;
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
		.info-box {
			background: #fff;
			border: 1px solid #ddd;
			padding: 20px;
			margin: 20px auto;
			max-width: 600px;
			box-shadow: 0 2px 4px rgba(0,0,0,0.1);
			border-radius: 10px;
		}
		.info-box h3 {
			font-size: 16px;
			color: #555;
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
	<h1>Car Catalogue</h1>
</header>
<nav>
	<ul class="Menu">
		<li><a href="Cars.php">All Cars</a></li>
		<li><a href="Insert.php">Insert Data</a></li>
	</ul>
</nav>
<div class="container">
	<div class="info-box">
		<h3>~ Your data was successfully added. ~</h3>
		<h3>~ Please return to one of the pages above. ~</h3>
	</div>
</div>
<footer>
	<p>Car Catalogue &copy; 2024</p>
</footer>
</body>
</html>
