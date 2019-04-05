<?php
$servername = "sql301.epizy.com";
$username = "epiz_22452260";
$password = "SbkL4G5eRDSiv";
$dbname = "epiz_22452260_enc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
?>