<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "videobox-exam";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  
  die("Connection failed: " . $conn->connect_error);
  logError("Connection", $conn->connect_error);
}
?>