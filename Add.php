<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Edit Successful</title>
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
        .logout {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .success-message {
            background: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 10px;
            text-align: center;
        }
        .success-message h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .success-message p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }
        .success-message a {
            color: #fff;
            text-decoration: none;
            background-color: #444;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin: 5px 0;
        }
        .success-message a:hover {
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
        <li><a href="Insert.php">Insert Data</a></li>
        <li><a href="Edit.php">Edit Data</a></li>
        <li><a href="Logout.php" class="logout">Logout</a></li>
    </ul>
</nav>
<div class="container">
    <div class="success-message">
        <h2>Edit Successful</h2>
        <p>Your changes have been saved successfully.</p>
        <p><a href="Cars.php">Return to All Cars</a></p>
        <p><a href="Insert.php">Add Another Car</a></p>
    </div>
</div>
<footer>
    <p>Car Specialist Showroom &c
