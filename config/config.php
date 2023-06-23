<?php
$host = 'localhost';
$port = 3307;
$database = 'basic-curd-php';
$username = 'root';
$password = '123456789';

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_errno) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}

echo '<script>console.log("Connected to the database.");</script>';
