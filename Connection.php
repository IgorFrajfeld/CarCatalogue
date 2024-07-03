<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connections.php</title>
</head>
<body>
<?php
$dbhost = "localhost";
$dbuser = "root"; 
$dbpass = "";    
$dbname = "carcatalogue"; 

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$con) {
    die("Failed to connect: " . mysqli_connect_error());
}
?>
</body>
</html>
