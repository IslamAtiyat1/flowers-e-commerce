<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "brief4";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	echo "Database connection field";
}


?>