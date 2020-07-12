<?php

$servername = "localhost";
$username = "admin_gis";
$password = "1sampaigis";
$dbname = "admin_gis";

// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "propertiku";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>