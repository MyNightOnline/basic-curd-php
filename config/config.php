<?php
// Database configuration
$host = 'localhost';
$port = 3307;
$database = 'basic-curd-php';
$username = 'root';
$password = '123456789';

// Create a connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check for connection errors
if ($conn->connect_errno) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}

// Connection successful
// echo "Connected to the database.";
echo '<script>console.log("Connected to the database.");</script>';

// Perform database operations here...

// Close the connection when done
// $conn->close();
