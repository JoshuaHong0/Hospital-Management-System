<?php
$servername = "localhost";
$username = "zhong7";
$password = "Hzz258079";
$dbname = "zhong7_1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

?>


