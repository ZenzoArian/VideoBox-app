<?php
include($_SERVER['DOCUMENT_ROOT'].'/video-box/private/config/connection/index.php');


$sql = "SELECT id, username, permission FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["permission"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>