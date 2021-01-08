<?php
include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');


$sql = "UPDATE users SET username='hoe' WHERE id=2";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>