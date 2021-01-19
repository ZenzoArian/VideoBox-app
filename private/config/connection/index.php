<?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/logHandel/error.php'); ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "videobox-exam";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die(logError("SQL connection", $conn->connect_error));
}
?>