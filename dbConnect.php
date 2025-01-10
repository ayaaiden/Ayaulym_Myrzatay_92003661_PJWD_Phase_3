<?php
$host = "localhost";  // Server
$user = "root";       // Default MySQL user
$pass = "";           // No password by default
$db = "voting";   // Your database name

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully to the database.";
}
?>
