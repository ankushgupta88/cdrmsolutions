<?php
error_reporting(E_ERROR | E_PARSE);
error_reporting(0);
// connecting mysqli;
$server     = 'localhost';
$username   = 'care2020_cdrmsolutions';
$password   = '27[X^#;RQFTn';
$database   = 'care2020_cdrmsolutions';
$dsn        = "mysql:host=$server;dbname=$database";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>