<?php
$servername = "localhost"; 
$username = "root"; 
$password = "Admin2025"; 
$dbname = "queens_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>