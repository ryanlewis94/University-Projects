<?php
$servername = "localhost";
$username = "user_14568811";
$password = "champyrolo123";
$dbname = "db_14568811";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
?>